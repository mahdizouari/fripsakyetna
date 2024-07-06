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

public function store(request $request){
    $request->validate([
        'name' => 'required|max:255|string',
        'description' => 'required|max:255|string',
        'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validates that 'Image' is a required image file with a maximum size of 4096 KB (4 MB)
        'Catégorie' => 'required|string|in:homme,femme,enfant',
        'Référence' => 'required|max:255|string',
        'is_active' => 'sometimes',
    ]); 
    if ($request->hasFile('Image')) {
        $imagePath = $request->file('Image')->store('images', 'public');
    
    produits::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'Image'=>$imagePath,
        'Catégorie'=>$request->Catégorie,
        'Référence'=>$request->Référence,
        'is_active'=>$request->is_active == true ?1:0,



    ]);
    return redirect('create')->with('status','Product created');


}

}
public function edit(int $id)
{
    $produit = produits::find($id);
    return view('crud.edit', compact('produit'));
}

}