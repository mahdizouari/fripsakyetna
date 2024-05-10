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
    return view('dashboard'); // You need to create this view
}
public function create()
{
    return view('crud.create'); 
}

public function store(request $request){
    $request->validate([
        'name' => 'required|max:255|string',
        'description' => 'required|max:255|string',
        'Image' => 'required|image|max:4096', // Validates that 'Image' is a required image file with a maximum size of 4096 KB (4 MB)
        'Catégorie' => 'required|max:255|string',
        'Référence' => 'required|max:255|string',
        'is_active' => 'sometimes',
    ]); 
    
    produits::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'Image'=>$request->Image,
        'Catégorie'=>$request->Catégorie,
        'Référence'=>$request->Référence,
        'is_active'=>$request->is_active == true ?1:0,



    ]);
   // return redirect('create')->with('status','Product created');


}






}
