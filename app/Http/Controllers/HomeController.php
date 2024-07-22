<?php

namespace App\Http\Controllers;
use App\Models\produits;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function welcome ()
    {  
        $products = produits::all();
        return view ('welcome', compact('products'));
    }
        
    public function product ()
    {
        return view ('product');
    }
    public function about ()
    {
        return view ('about');
    }
    public function cart ()
    {
        return view ('cart');
    }
    public function productdetail ()
    {
        return view ('product-detail');
    }
    public function contact ()
    {
        return view ('contact');
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
        'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // 2MB limit for image uploads
        'Catégorie' => 'required|string|in:homme,femme,enfant',
        'Référence' => 'required|max:255|string',
        'is_active' => 'sometimes',
        'prix' => 'required|numeric',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('images', $filename, 'public'); // Store in public/images

        // Save the image path in the database
        $imagePath = 'images/' . $filename;
    } else {
        $imagePath = null;
    }

    // Create the product
    produits::create([
        'name' => $request->name,
        'taille' => $request->taille,
        'image' => $imagePath,
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
        'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // 2MB limit for image uploads
        'Catégorie' => 'required|string|in:homme,femme,enfant',
        'Référence' => 'required|max:255|string',
        'is_active' => 'sometimes',
        'prix' => 'required|numeric',
    ]);

    // Find the product by ID
    $produit = produits::findOrFail($id);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($produit->image && Storage::disk('public')->exists($produit->image)) {
            Storage::disk('public')->delete($produit->image);
        }

        // Upload new image
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('images', $filename, 'public'); // Store in public/images

        // Update image path in database
        $produit->image = 'images/' . $filename;
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

    // Delete the image if it exists
    if ($produit->image && Storage::disk('public')->exists($produit->image)) {
        Storage::disk('public')->delete($produit->image);
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



}