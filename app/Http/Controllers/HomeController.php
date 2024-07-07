<?php

namespace App\Http\Controllers;
use App\Models\produits;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function welcome ()
    {
        return view ('welcome');
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
        'description' => 'required|max:255|string',
        'Catégorie' => 'required|string|in:homme,femme,enfant',
        'Référence' => 'required|max:255|string',
        'is_active' => 'sometimes',
        'prix' => 'required|numeric', // Add validation for prix

    ]);

   
   
    // Create the product
    produits::create([
        'name' => $request->name,
        'description' => $request->description,
        'Catégorie' => $request->Catégorie,
        'Référence' => $request->Référence,
        'is_active' => $request->is_active == true ? 1 : 0,
        'prix' => $request->prix,

    ]);

    return redirect('create')->with('status', 'Product created successfully!');
}



public function edit(int $id)
{
    $produit = produits::find($id);
    return view('crud.edit', compact('produit'));
}
public function update(Request $request, int $id)
{
    // Validate the request
    $request->validate([
        'name' => 'required|max:255|string',
        'description' => 'required|max:255|string',
        'Catégorie' => 'required|string|in:homme,femme,enfant',
        'Référence' => 'required|max:255|string',
        'is_active' => 'sometimes',
        'prix' => 'required|numeric', // Add validation for prix
    ]);

    // Find the product by ID
    $produit = produits::findOrFail($id);

    // Handle the image upload if a new image is provided
   

    // Update other product details
    $produit->name = $request->name;
    $produit->description = $request->description;
    $produit->Catégorie = $request->Catégorie;
    $produit->Référence = $request->Référence;
    $produit->is_active = $request->is_active == true ? 1 : 0;
    $produit->prix = $request->prix;
    

    // Save the updated product details
    $produit->save();

    return redirect()->back()->with('status', 'Product updated successfully!');
}

public function destroy(int $id)
{   
    $produits= produits::findOrFail($id);
    $produits->delete();
    return redirect()->back()->with('status', 'Product deleted successfully!');

}

}