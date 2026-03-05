<?php


namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\ReviewVoteOrSignalment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function store(){
        return view('store/store');
    }

    public function storeGrid(){
    return view('store/store-grid');
    }

    public function storeSingle(){
        return view('store/store-single');
    }

    public function storeReviews(){
        return view('store/reviews');
    }

    public function storeReviewsAdd(Request $request, $uuid)
    {
        
    $product = Product::where('uuid', $uuid)->firstOrFail();

        // Vérifier que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Vous devez être connecté pour laisser un avis.');
        }

        // Vérifier que l'utilisateur n'a pas déjà reviewé ce produit
        $existingReview = Review::where('product_id', $product->id)
            ->where('user_id', Auth::id())
            ->where('deleted', 0)
            ->first();

        if ($existingReview) {
            return back()->with('error', 'Vous avez déjà laissé un avis sur ce produit.');
        }

        // Validation
        $validated = $request->validate([
            'rating'          => 'required|integer|min:1|max:5',
            'title'           => 'required|string|max:255',
            'comment'         => 'required|string|max:2000',
            'exchange_status' => 'nullable|in:Echange avec succes,Echange échoué',
            'images.*'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'rating.required'  => 'Veuillez donner une note.',
            'rating.min'       => 'La note doit être au minimum 1.',
            'rating.max'       => 'La note doit être au maximum 5.',
            'title.required'   => 'Le titre est obligatoire.',
            'comment.required' => 'Le commentaire est obligatoire.',
        ]);

        // Créer la review
        $review = Review::create([
            'product_id'      => $product->id,
            'user_id'         => Auth::id(),
            'rating'          => $validated['rating'],
            'title'           => $validated['title'],
            'comment'         => $validated['comment'],
            'exchange_status' => $validated['exchange_status'],
            'deleted'         => 0,
        ]);
        // Upload des images si présentes
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

        // initialiser average_rating et reviews_count du produit
        $reviews_count = Review::where('product_id', $product->id)
            ->where('deleted', 0)->count();
        $average_rating = Review::where('product_id', $product->id)
            ->where('deleted', 0)->avg('rating') ?? 0;
        // $product->save();

       // Méthode universelle à mettre dans chaque return back()
return redirect(url()->previous() . '#reviews-tab-pane')
    ->with('success', 'Votre avis a été publié avec succès !');
    }

    
    public function storeContact(){
        return view('store/contact');
    }


    public function helpful( $uuid)
{
    $review = Review::where('uuid', $uuid)->firstOrFail();
    $existing = ReviewVoteOrSignalment::where('review_id', $review->id)
        ->where('user_id', Auth::id())
        ->where('type', 'LIKE')
        ->first();

    if ($existing) {
        // Toggle : retirer le like
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

// Méthode universelle à mettre dans chaque return back()
return redirect(url()->previous() . '#reviews-tab-pane')
    ->with('success', 'Votre vote a été pris en compte. Merci !');
}

public function report(Request $request, $uuid)
{
    $request->validate([
        'reason'        => 'required|string',
        'reason_detail' => 'nullable|string|max:500',
    ]);

    $review = Review::where('uuid', $uuid)->firstOrFail();

    $existing = ReviewVoteOrSignalment::where('review_id', $review->id)
        ->where('user_id', Auth::id())
        ->where('type', 'REPORT')
        ->first();

    if ($existing) {
        return back()->with('error', 'Vous avez déjà signalé cet avis.');
    }

    // Combiner raison + détail
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

    // Méthode universelle à mettre dans chaque return back()
return redirect(url()->previous() . '#reviews-tab-pane')
    ->with('success', 'Signalement envoyé, merci. Notre équipe va examiner cet avis. !');

}

}