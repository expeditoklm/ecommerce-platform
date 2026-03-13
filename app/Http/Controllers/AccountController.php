<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;



class AccountController extends Controller
{

    public function accountOrders(){
    return view('account/orders');
    }

    public function accountAdress(){
    return view('account/address');
    }

    public function accountSettings(){
    return view('account/settings');
    }

    public function accountNotification(){
    return view('account/notification');
    }





// Liste des articles personnels
public function myItems(Request $request)
{
    $items = Product::where('user_id', Auth::id())
                    ->whereNull('shop_id')
                    ->where('deleted', 0)
                    ->latest()
                    ->paginate(12);

    return view('account.my-items', compact('items'));
}

// Formulaire création
public function myItemsCreate()
{
    $categories = Category::where('deleted', 0)
                           ->where('status', 1)
                           ->orderBy('section')
                           ->orderBy('name')
                           ->get()
                           ->groupBy('section');

    return view('account.my-items-create', compact('categories'));
}

// Enregistrement
public function myItemsStore(Request $request)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'section'     => 'required|in:product,service,rental',
        'description' => 'nullable|string',
        'condition'   => 'nullable|string',
        'city'        => 'nullable|string|max:100',
        'type_id'     => 'nullable|exists:categories,id',
        'cover'       => 'nullable|image|max:3072',
        'price'       => 'nullable|numeric|min:0',
    ]);

    // Image principale
    $fileUrl = null;
    if ($request->hasFile('cover')) {
        $path    = 'products/personal/' . Str::uuid() . '.jpg';
        $manager = new ImageManager(new Driver());
        $image   = $manager->read($request->file('cover'))
                           ->cover(800, 600)
                           ->toJpeg(85);
        Storage::disk('public')->put($path, $image);
        $fileUrl = $path;
    }

    Product::create([
        'uuid'         => Str::uuid(),
        'user_id'      => Auth::id(),
        'shop_id'      => null,
        'section'      => $request->section,
        'name'         => $request->name,
        'slug'         => Str::slug($request->name) . '-' . time(),
        'description'  => $request->description,
        'condition'    => $request->condition,
        'city'         => $request->city,
        'type_id'      => $request->type_id,
        'file_url'     => $fileUrl,
        'price'        => $request->price ?? 0,
        'status'       => 'active',
        'exchange_status' => 'available',
        'deleted'      => 0,
    ]);

    return redirect()->route('account.my-items')
                     ->with('success', 'Article ajouté avec succès.');
}

// Édition
public function myItemsEdit(string $uuid)
{
    $item = Product::where('uuid', $uuid)
                   ->where('user_id', Auth::id())
                   ->whereNull('shop_id')
                   ->firstOrFail();

    $categories = Category::where('deleted', 0)
                           ->where('status', 1)
                           ->orderBy('section')->orderBy('name')
                           ->get()->groupBy('section');

    return view('account.my-items-create', compact('item', 'categories'));
}

// Mise à jour
public function myItemsUpdate(Request $request, string $uuid)
{
    $item = Product::where('uuid', $uuid)
                   ->where('user_id', Auth::id())
                   ->whereNull('shop_id')
                   ->firstOrFail();

    $request->validate([
        'name'        => 'required|string|max:255',
        'section'     => 'required|in:product,service,rental',
        'description' => 'nullable|string',
        'condition'   => 'nullable|string',
        'city'        => 'nullable|string|max:100',
        'type_id'     => 'nullable|exists:categories,id',
        'cover'       => 'nullable|image|max:3072',
        'price'       => 'nullable|numeric|min:0',
    ]);

    if ($request->hasFile('cover')) {
        if ($item->file_url) Storage::disk('public')->delete($item->file_url);
        $path    = 'products/personal/' . Str::uuid() . '.jpg';
        $manager = new ImageManager(new Driver());
        $image   = $manager->read($request->file('cover'))
                           ->cover(800, 600)->toJpeg(85);
        Storage::disk('public')->put($path, $image);
        $item->file_url = $path;
    }

    $item->update([
        'section'     => $request->section,
        'name'        => $request->name,
        'description' => $request->description,
        'condition'   => $request->condition,
        'city'        => $request->city,
        'type_id'     => $request->type_id,
        'price'       => $request->price ?? 0,
        'file_url'    => $item->file_url,
    ]);

    return redirect()->route('account.my-items')
                     ->with('success', 'Article mis à jour.');
}

// Suppression
public function myItemsDelete(string $uuid)
{
    $item = Product::where('uuid', $uuid)
                   ->where('user_id', Auth::id())
                   ->whereNull('shop_id')
                   ->firstOrFail();

    $item->update(['deleted' => 1]);

    return back()->with('success', 'Article supprimé.');
}




}