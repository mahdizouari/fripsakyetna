<?php

namespace App\Http\Controllers;
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
}
