<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\ReviewVoteOrSignalment;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    // ── Helper privé ─────────────────────────────────────
private function getShopData(string $uuid): array
{
    $shop = Shop::with('mainCategory')
        ->where('uuid', $uuid)
        ->where('shops.deleted', 0)        // ← qualifié
        ->where('is_active', 1)
        ->firstOrFail();

    $shopCategories = Category::whereHas('products', function ($q) use ($shop) {
            $q->where('products.shop_id', $shop->id)    // ← qualifié
              ->where('products.deleted', 0)             // ← qualifié
              ->where('products.status', 1);             // ← qualifié
        })
        ->where('categories.deleted', 0)   // ← qualifié
        ->where('categories.status', 1)    // ← qualifié
        ->get();

    return compact('shop', 'shopCategories');
}

    // ── Liste des boutiques ───────────────────────────────
    public function store(Request $request)
{
    $query = Shop::with(['mainCategory', 'user'])
        ->where('shops.deleted', 0)
        ->where('is_active', 1);

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $shops = $query->latest()->paginate(9)->appends(request()->query());

    return view('store/store', compact('shops'));
}
    public function storeGrid()
    {
        return view('store/store-grid');
    }

    // ── Boutique : produits ───────────────────────────────
    public function storeSingle(Request $request, string $uuid)
    {
        $data = $this->getShopData($uuid);
        $shop = $data['shop'];

        // Dans storeSingle() — remplacer le with(['images', 'categories']) par :
$productsQuery = Product::with(['images', 'type', 'categories'])
    ->withAvg(['reviews' => fn($q) => $q->where('deleted', 0)], 'rating')
    ->withCount(['reviews' => fn($q) => $q->where('deleted', 0)])
    ->where('products.shop_id', $shop->id)
    ->where('products.deleted', 0)
    ->where('products.status', 1);

        if ($request->filled('category')) {
            $productsQuery->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }

        if ($request->filled('search')) {
            $productsQuery->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $productsQuery->paginate(12)->appends(request()->query());

        return view('store/store-single', array_merge($data, compact('products')));
    }

    // ── Boutique : avis ───────────────────────────────────
    public function storeReviews(Request $request, string $uuid)
    {
        $data = $this->getShopData($uuid);
        $shop = $data['shop'];

        $sortParam    = $request->get('sort', 'top');
        $reviewsQuery = Review::with(['user', 'images'])
            ->whereHas('product', fn($q) => $q->where('shop_id', $shop->id))
            ->where('deleted', 0);

        switch ($sortParam) {
            case 'recent':   $reviewsQuery->latest(); break;
            case 'oldest':   $reviewsQuery->oldest(); break;
            case 'best':     $reviewsQuery->orderBy('rating', 'desc'); break;
            case 'worst':    $reviewsQuery->orderBy('rating', 'asc'); break;
            case 'helpful':  $reviewsQuery->orderBy('likes_count', 'desc'); break;
            default:
                $reviewsQuery->orderBy('rating', 'desc')->orderBy('likes_count', 'desc');
        }

        $reviews      = $reviewsQuery->paginate(10)->appends(request()->query());
        $reviewsCount = $shop->reviews_count;
        $averageRating = $shop->average_rating;

        // Distribution par étoiles
        $ratingDistribution = [];
        $total = $reviewsQuery->count();
        for ($i = 5; $i >= 1; $i--) {
            $count = Review::whereHas('product', fn($q) => $q->where('shop_id', $shop->id))
                ->where('deleted', 0)->where('rating', $i)->count();
            $ratingDistribution[$i] = [
                'count'      => $count,
                'percentage' => $total > 0 ? round(($count / $total) * 100) : 0,
            ];
        }

        $userVotes = [];
        if (Auth::check()) {
            $userVotes = ReviewVoteOrSignalment::where('user_id', Auth::id())
                ->where('type', 'LIKE')->where('deleted', 0)
                ->pluck('review_id')->toArray();
        }

        return view('store/reviews', array_merge($data, compact(
            'reviews', 'reviewsCount', 'averageRating', 'ratingDistribution', 'userVotes', 'sortParam'
        )));
    }

    // ── Boutique : contact ────────────────────────────────
    public function storeContact(string $uuid)
    {
        $data = $this->getShopData($uuid);
        return view('store/contact', $data);
    }

    // ── Ajouter un avis (sur un produit) ─────────────────
public function storeReviewsAdd(Request $request, $uuid = null)
{
    $product = null;
    $shop    = null;

    // ── Contexte produit ──────────────────────────────
    if ($uuid) {
        $product = Product::where('uuid', $uuid)->firstOrFail();

        $existingReview = Review::where('product_id', $product->id)
            ->where('user_id', Auth::id())
            ->where('deleted', 0)->first();

        if ($existingReview) {
            return back()->with('error', 'Vous avez déjà laissé un avis sur ce produit.');
        }
    }

    // ── Contexte boutique (sans produit) ──────────────
    if ($request->filled('shop_uuid')) {
        $shop = Shop::where('uuid', $request->shop_uuid)
            ->where('deleted', 0)
            ->firstOrFail();

        $existingReview = Review::where('shop_id', $shop->id)
            ->whereNull('product_id')
            ->where('user_id', Auth::id())
            ->where('deleted', 0)->first();

        if ($existingReview) {
            return back()->with('error', 'Vous avez déjà laissé un avis sur cette boutique.');
        }
    }

    // ── Validation ────────────────────────────────────
    $validated = $request->validate([
        'rating'          => 'required|integer|min:1|max:5',
        'title'           => 'required|string|max:255',
        'comment'         => 'required|string|max:2000',
        'exchange_status' => 'nullable|in:Echange avec succes,Echange échoué',
        'images.*'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // ── Création du review ────────────────────────────
    $review = Review::create([
        'uuid'            => \Illuminate\Support\Str::uuid(),
        'product_id'      => $product?->id,        // null si boutique
        'shop_id'         => $shop?->id,           // null si produit
        'user_id'         => Auth::id(),
        'rating'          => $validated['rating'],
        'title'           => $validated['title'],
        'comment'         => $validated['comment'],
        'exchange_status' => $validated['exchange_status'] ?? null,
        'deleted'         => 0,
    ]);

    // ── Upload images ─────────────────────────────────
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/reviews/images'), $imageName);
            ReviewImage::create([
                'review_id' => $review->id,
                'url'       => 'uploads/reviews/images/' . $imageName,
                'deleted'   => 0,
            ]);
        }
    }

    // ── Mise à jour des stats ─────────────────────────
    // if ($product) {
    //     $product->update([
    //         'reviews_count'  => Review::where('product_id', $product->id)->where('deleted', 0)->count(),
    //         'average_rating' => Review::where('product_id', $product->id)->where('deleted', 0)->avg('rating') ?? 0,
    //     ]);
    // }

    if ($shop) {
        $shop->update([
            'reviews_count'  => Review::where('shop_id', $shop->id)->whereNull('product_id')->where('deleted', 0)->count(),
            'average_rating' => Review::where('shop_id', $shop->id)->whereNull('product_id')->where('deleted', 0)->avg('rating') ?? 0,
        ]);
    }

    return redirect(url()->previous() . '#reviews-tab-pane')
        ->with('success', 'Votre avis a été publié avec succès !');
}

    // ── Helpful ───────────────────────────────────────────
    public function helpful($uuid)
    {
        $review   = Review::where('uuid', $uuid)->firstOrFail();
        $existing = ReviewVoteOrSignalment::where('review_id', $review->id)
            ->where('user_id', Auth::id())->where('type', 'LIKE')->first();

        if ($existing) {
            $existing->delete();
            $review->decrement('likes_count');
        } else {
            ReviewVoteOrSignalment::create([
                'review_id' => $review->id,
                'user_id'   => Auth::id(),
                'type'      => 'LIKE',
                'status'    => 'APPROVED',
                'deleted'   => 0,
            ]);
            $review->increment('likes_count');
        }

        return redirect(url()->previous() . '#reviews-tab-pane')
            ->with('success', 'Votre vote a été pris en compte !');
    }

    // ── Report ────────────────────────────────────────────
    public function report(Request $request, $uuid)
    {
        $request->validate([
            'reason'        => 'required|string',
            'reason_detail' => 'nullable|string|max:500',
        ]);

        $review   = Review::where('uuid', $uuid)->firstOrFail();
        $existing = ReviewVoteOrSignalment::where('review_id', $review->id)
            ->where('user_id', Auth::id())->where('type', 'REPORT')->first();

        if ($existing) {
            return back()->with('error', 'Vous avez déjà signalé cet avis.');
        }

        $fullReason = $request->reason;
        if ($request->filled('reason_detail')) {
            $fullReason .= ' — ' . $request->reason_detail;
        }

        ReviewVoteOrSignalment::create([
            'review_id' => $review->id,
            'user_id'   => Auth::id(),
            'type'      => 'REPORT',
            'status'    => 'PENDING',
            'reason'    => $fullReason,
            'deleted'   => 0,
        ]);

        return redirect(url()->previous() . '#reviews-tab-pane')
            ->with('success', 'Signalement envoyé. Notre équipe va examiner cet avis !');
    }
}