<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
public function blog(Request $request)
{
    $query = \App\Models\Blog::with(['shop.user', 'category'])
        ->where('is_published', 1)
        ->where('deleted', 0);

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('category')) {
        $query->whereHas('category', fn($q) =>
            $q->where('uuid', $request->category)
        );
    }

    $blogs      = $query->latest('publication_date')->paginate(10);
    $categories = \App\Models\Category::where('deleted', 0)
                                       ->where('status', 1)
                                       ->orderBy('name')->get();

    return view('blog.blog', compact('blogs', 'categories'));
}

public function blogSingle(string $uuid)
{
    $blog = \App\Models\Blog::with([
            'shop.user',
            'category',
            'blogCategories',
            'images',
        ])
        ->where('uuid', $uuid)          // ← uuid et non slug_url
        ->where('is_published', 1)
        ->where('deleted', 0)
        ->firstOrFail();

    $blog->increment('views_count');

    $relatedBlogs = \App\Models\Blog::with(['category'])
        ->where('id', '!=', $blog->id)
        ->where('is_published', 1)
        ->where('deleted', 0)
        ->where('category_id', $blog->category_id)
        ->latest('publication_date')
        ->take(3)
        ->get();

    return view('blog.blog-single', compact('blog', 'relatedBlogs'));
}

   public function adminBlogSetting(Request $request)
{
    $query = \App\Models\Blog::with(['shop', 'category'])
        ->whereHas('shop', fn($q) => $q->where('user_id', FacadesAuth::id()))
        ->where('deleted', 0);

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('status')) {
        $query->where('is_published', $request->status);
    }

    $blogs = $query->latest()->paginate(10);

    return view('admin.setting-blog', compact('blogs'));
}

public function adminToggleBlog(string $uuid)
{
    $blog = \App\Models\Blog::whereHas('shop', fn($q) =>
        $q->where('user_id', FacadesAuth::id())
    )->where('uuid', $uuid)->firstOrFail();
$blog->update([
    'is_published'     => !$blog->is_published,
    'publication_date' => !$blog->is_published ? now()->format('Y-m-d') : $blog->publication_date,
]);

    return back()->with('success', $blog->is_published ? 'Blog publié.' : 'Blog dépublié.');
}

public function adminDeleteBlog(string $uuid)
{
    $blog = \App\Models\Blog::whereHas('shop', fn($q) =>
        $q->where('user_id', FacadesAuth::id())
    )->where('uuid', $uuid)->firstOrFail();

    $blog->update(['deleted' => 1]);

    return back()->with('success', 'Blog supprimé.');
}

    public function adminAddBlog()
    {
        return view('admin/add-blog');
    }


    
    public function adminCreateBlog()
{
    $shops = \App\Models\Shop::where('user_id', FacadesAuth::id())
                              ->where('deleted', 0)->get();

    $categories    = \App\Models\Category::where('deleted', 0)->where('status', 1)
                                          ->orderBy('section')->orderBy('name')
                                          ->get()->groupBy('section');

    $allCategories = \App\Models\Category::where('deleted', 0)->where('status', 1)
                                          ->orderBy('name')->get();

    return view('admin.add-blog', compact('shops', 'categories', 'allCategories'));
}

public function adminStoreBlog(Request $request)
{
    $request->validate([
        'title'            => 'required|string|max:255',
        'shop_id'          => 'required|exists:shops,id',
        'content'          => 'required|string',
        'cover'            => 'nullable|image|max:5120',
        'image_left'       => 'nullable|image|max:2048',
        'image_right'      => 'nullable|image|max:2048',
    ]);

    $slug = $request->slug_url
        ?: Str::slug($request->title) . '-' . time();

    // ── Couverture : 1060×508 ────────────────────────────────
    $coverPath = null;
    if ($request->hasFile('cover')) {
        $coverPath = 'blogs/covers/' . Str::uuid() . '.jpg';
        $image = \Intervention\Image\ImageManager::gd()
            ->read($request->file('cover'))
            ->cover(1060, 508)
            ->toJpeg(85);
        Storage::disk('public')->put($coverPath, $image);
    }

    $blog = \App\Models\Blog::create([
        'uuid'             => Str::uuid(),
        'shop_id'          => $request->shop_id,
        'category_id'      => $request->category_id,
        'slug_url'         => $slug,
        'title'            => $request->title,
        'description'      => $request->description,
        'content'          => $request->content,
        'cover_url'        => $coverPath,
        'publication_date' => now()->format('Y-m-d'),
        'reading_time'     => $request->reading_time,
        'is_published'     => $request->boolean('is_published'),
        'quote'            => $request->quote,
        'quote_author'     => $request->quote_author,
        'product_features' => $request->product_features,
        'product_status'   => $request->product_status,
        'content_left'     => $request->content_left,
        'content_right'    => $request->content_right,
        'deleted'          => 0,
    ]);

    // ── Images gauche / droite : 150×150 ────────────────────
    foreach (['left' => 'image_left', 'right' => 'image_right'] as $role => $field) {
        if ($request->hasFile($field)) {
            $imgPath = 'blogs/images/' . Str::uuid() . '.jpg';
            $image = \Intervention\Image\ImageManager::gd()
                ->read($request->file($field))
                ->cover(150, 150)
                ->toJpeg(85);
            Storage::disk('public')->put($imgPath, $image);

            \App\Models\BlogImage::create([
                'uuid'    => Str::uuid(),
                'blog_id' => $blog->id,
                'url'     => $imgPath,
                'role'    => $role,
            ]);
        }
    }

    // ── Tags ─────────────────────────────────────────────────
    if ($request->filled('tags')) {
        $blog->blogCategories()->sync($request->tags);
    }

    return redirect()->route('admin.blog-setting')
                     ->with('success', 'Blog créé avec succès.');
}

public function adminEditBlog(string $uuid)
{
    $blog = \App\Models\Blog::with(['images', 'blogCategories'])
        ->whereHas('shop', fn($q) => $q->where('user_id', FacadesAuth::id()))
        ->where('uuid', $uuid)
        ->firstOrFail();

    $shops = \App\Models\Shop::where('user_id', FacadesAuth::id())
                              ->where('deleted', 0)->get();

    $categories = \App\Models\Category::where('deleted', 0)->where('status', 1)
                                       ->orderBy('section')->orderBy('name')
                                       ->get()->groupBy('section');

    $allCategories = \App\Models\Category::where('deleted', 0)->where('status', 1)
                                          ->orderBy('name')->get();

    return view('admin.add-blog', compact('blog', 'shops', 'categories', 'allCategories'));
}

public function adminUpdateBlog(Request $request, string $uuid)
{
    $blog = \App\Models\Blog::whereHas('shop', fn($q) =>
        $q->where('user_id', FacadesAuth::id())
    )->where('uuid', $uuid)->firstOrFail();

    $request->validate([
        'title'            => 'required|string|max:255',
        'shop_id'          => 'required|exists:shops,id',
        'content'          => 'required|string',
        'cover'            => 'nullable|image|max:5120',
        'image_left'       => 'nullable|image|max:2048',
        'image_right'      => 'nullable|image|max:2048',
    ]);

$slug = $blog->slug_url; // on garde l'existant

    $blog->update([
        'shop_id'          => $request->shop_id,
        'category_id'      => $request->category_id,
        'slug_url'         => $slug,
        'title'            => $request->title,
        'description'      => $request->description,
        'content'          => $request->content,
        'publication_date' => $request->publication_date,
        'reading_time'     => $request->reading_time,
        'publication_date' => now()->format('Y-m-d'),
        'is_published'     => $request->boolean('is_published'),
        'quote'            => $request->quote,
        'quote_author'     => $request->quote_author,
        'product_features' => $request->product_features,
        'product_status'   => $request->product_status,
        'content_left'     => $request->content_left,
        'content_right'    => $request->content_right,
    ]);

    // ── Suppression couverture ───────────────────────────────
    if ($request->boolean('remove_cover') && $blog->cover_url) {
        Storage::disk('public')->delete($blog->cover_url);
        $blog->update(['cover_url' => null]);
    }

    // ── Nouvelle couverture : 1060×508 ───────────────────────
    if ($request->hasFile('cover')) {
        // Supprimer l'ancienne
        if ($blog->cover_url) {
            Storage::disk('public')->delete($blog->cover_url);
        }

        $coverPath = 'blogs/covers/' . Str::uuid() . '.jpg';
        $image = \Intervention\Image\ImageManager::gd()->read($request->file('cover'))
    ->cover(1060, 508)
    ->toJpeg(85);

        Storage::disk('public')->put($coverPath, $image);
        $blog->update(['cover_url' => $coverPath]);
    }

    // ── Suppression images additionnelles cochées ────────────
    if ($request->filled('remove_images')) {
        $toDelete = \App\Models\BlogImage::whereIn('id', $request->remove_images)
            ->where('blog_id', $blog->id)->get();

        foreach ($toDelete as $img) {
            Storage::disk('public')->delete($img->url);
            $img->delete();
        }
    }

    // ── Nouvelles images gauche/droite : 150×150 ────────────
    foreach (['left' => 'image_left', 'right' => 'image_right'] as $role => $field) {
        if ($request->hasFile($field)) {
            // Supprimer l'ancienne image du même rôle
            $old = \App\Models\BlogImage::where('blog_id', $blog->id)
                                         ->where('role', $role)->first();
            if ($old) {
                Storage::disk('public')->delete($old->url);
                $old->delete();
            }

            $imgPath = 'blogs/images/' . Str::uuid() . '.jpg';
            $image = \Intervention\Image\ImageManager::gd()->read($request->file($field))
                ->cover(150, 150)
                ->toJpeg(85);

            Storage::disk('public')->put($imgPath, $image);

            \App\Models\BlogImage::create([
                'uuid'    => Str::uuid(),
                'blog_id' => $blog->id,
                'url'     => $imgPath,
                'role'    => $role,
            ]);
        }
    }

    // ── Tags ─────────────────────────────────────────────────
    $blog->blogCategories()->sync($request->input('tags', []));

    return redirect()->route('admin.blog-setting')
                     ->with('success', 'Blog mis à jour avec succès.');
}

}