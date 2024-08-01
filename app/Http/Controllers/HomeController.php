<?php

namespace App\Http\Controllers;
use App\Models\produits;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function welcome ()
    {  
        $products = produits::all();
        return view ('welcome', compact('products'));
        
    }
        
    public function product ()
    {
        $products = produits::all();
        return view ('product', compact('products'));
    
    }
    public function about ()
    {
        return view ('about');
    }
    
    
    public function panier ()
    {
        return view ('panier');
    }
    public function checkout ()
    {
        return view ('checkout');
    }
    public function logout()
{
    Auth::logout();
    return redirect('/');
}
public function login()
    {
        return view('auth.login');
    }
   

public function showClientProfile($clientId)
{
    $client = user::find($clientId);

    return view('client.profile', ['client' => $client]);
}
public function dashboard()

{
    $product=produits::get();
    return view('dashboard',compact('product')); 
}
public function create()
{  

    return view('crud.create'); 
}

public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'name' => 'required|max:255|string',
        'taille' => 'required|in:S,M,L,XL,XXL',
        'image1' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048', // Required image
        'image2' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // Optional image
        'image3' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // Optional image
        'Catégorie' => 'required|string|in:homme,femme,enfant',
        'Référence' => 'required|max:255|string',
        'is_active' => 'sometimes',
        'prix' => 'required|numeric',
    ]);

    // Handle image uploads
    $images = [
        'image1' => null,
        'image2' => null,
        'image3' => null,
    ];

    if ($request->hasFile('image1')) {
        $file = $request->file('image1');
        $filename = time() . '_1.' . $file->getClientOriginalExtension();
        $images['image1'] = $file->storeAs('images', $filename, 'public');
    }

    if ($request->hasFile('image2')) {
        $file = $request->file('image2');
        $filename = time() . '_2.' . $file->getClientOriginalExtension();
        $images['image2'] = $file->storeAs('images', $filename, 'public');
    }

    if ($request->hasFile('image3')) {
        $file = $request->file('image3');
        $filename = time() . '_3.' . $file->getClientOriginalExtension();
        $images['image3'] = $file->storeAs('images', $filename, 'public');
    }

    // Create the product
    produits::create([
        'name' => $request->name,
        'taille' => $request->taille,
        'image1' => $images['image1'],
        'image2' => $images['image2'],
        'image3' => $images['image3'],
        'Catégorie' => $request->Catégorie,
        'Référence' => $request->Référence,
        'is_active' => $request->has('is_active') ? 1 : 0,
        'prix' => $request->prix,
    ]);

    return redirect('create')->with('status', 'Product created successfully!');
}






public function edit(int $id)
{
    $produit = produits::find($id);
    return view('crud.edit', compact('produit'));
}
public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'name' => 'required|max:255|string',
        'taille' => 'required|in:S,M,L,XL,XXL',
        'image1' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // Optional image
        'image2' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // Optional image
        'image3' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // Optional image
        'Catégorie' => 'required|string|in:homme,femme,enfant',
        'Référence' => 'required|max:255|string',
        'is_active' => 'sometimes',
        'prix' => 'required|numeric',
    ]);

    // Find the product by ID
    $produit = produits::findOrFail($id);

    // Handle image uploads
    foreach (['image1', 'image2', 'image3'] as $imageField) {
        if ($request->hasFile($imageField)) {
            // Delete old image if exists
            if ($produit->{$imageField} && Storage::disk('public')->exists($produit->{$imageField})) {
                Storage::disk('public')->delete($produit->{$imageField});
            }

            // Upload new image
            $file = $request->file($imageField);
            $filename = time() . '_' . $imageField . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images', $filename, 'public');
            $produit->{$imageField} = $path;
        }
    }

    // Update other product details
    $produit->name = $request->name;
    $produit->taille = $request->taille;
    $produit->Catégorie = $request->Catégorie;
    $produit->Référence = $request->Référence;
    $produit->is_active = $request->has('is_active') ? 1 : 0;
    $produit->prix = $request->prix;

    // Save the updated product
    $produit->save();

    return redirect()->back()->with('status', 'Product updated successfully!');
}




public function destroy($id)
{
    $produit = produits::findOrFail($id);

    // Delete images if they exist
    foreach (['image1', 'image2', 'image3'] as $imageField) {
        // Check if image exists and if its path is not empty
        if (!empty($produit->$imageField) && Storage::disk('public')->exists($produit->$imageField)) {
            // Delete the specific image file
            Storage::disk('public')->delete($produit->$imageField);
        }
    }

    // Delete the product
    $produit->delete();

    return redirect()->back()->with('status', 'Product deleted successfully!');
}


public function show($filename)
{
    $path = 'images/' . $filename;

    if (!Storage::disk('public')->exists($path)) {
        abort(404);
    }

    $file = Storage::disk('public')->get($path);
    $type = Storage::disk('public')->mimeType($path);

    return response($file, 200)->header('Content-Type', $type);
}


    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Sanitize and trim the query
        $query = trim($query);
    
        // Search for products where the size exactly matches the query
        $products = produits::where(function ($q) use ($query) {
            $q->where('name', 'like', "%$query%")
              ->orWhere('Référence', 'like', "%$query%")
              ->orWhere('taille', $query); // Match exact size
        })->get();
    
        return view('crud.search', compact('products'));
    }
    
    
    public function index()
    {
        return view('slider.index');
    }
 
    public function quickView($id)
    {
        $product = produits::findOrFail($id);
        return response()->json([
            'name' => $product->name,
            'prix' => $product->prix,
            'Catégorie' => $product->Catégorie,

            'taille' => $product->taille,
            'image1' => asset('/' . $product->image1),
            'image2' => $product->image2 ? asset('/' . $product->image2) : null,
            'image3' => $product->image3 ? asset('/' . $product->image3) : null,
        ]);
    }


    public function addItem(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'id' => 'required|integer',
        ]);
    
        // Retrieve product information from the database
        $product = produits::find($validated['id']);
    
        if ($product) {
            $productData = [
                'id' => $product->id,
                'name' => $product->name,
                'image1' => $product->image1,
                'prix' => $product->prix,
                'taille' => $product->taille,
                'Catégorie' => $product->Catégorie,
            ];
    
            $productItems = Session::get('productItems', []);
            $productItemIds = Session::get('productItemIds', []);
    
            if (!in_array($product->id, $productItemIds)) {
                $productItemIds[] = $product->id;
                $productItems[] = $productData;
            } else {
                foreach ($productItems as $key => $item) {
                    if ($item['id'] == $product->id) {
                        // If the product is already in the cart, update its data
                        $productItems[$key] = $productData;
                        break;
                    }
                }
            }
    
            Session::put('productItems', $productItems);
            Session::put('productItemIds', $productItemIds);
    
            return redirect('/')->with('message', 'Item Added! ' . $product->name);
        }
    
        return redirect('/')->with('error', 'No such product found!');
    }
    
    

}

    
    
    
   












    
