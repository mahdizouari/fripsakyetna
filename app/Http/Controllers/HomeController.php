<?php

namespace App\Http\Controllers;
use App\Models\produits;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;


class HomeController extends Controller
{
    public function showProductDetail($id)
    {
        $product = produits::findOrFail($id); // Fetch the product by ID

        return view('detail', compact('product'));
    }
    public function welcome()
    {
        $slider = Slider::orderBy('id', 'desc')->first(); // Fetch the most recent slider
        $products = produits::where('is_active', true)->get();

        return view('welcome', compact('slider', 'products'));
    }

        
    public function product()
{
    $products = produits::where('is_active', true)->paginate(8); // Limit to 30 products per page

    return view('prod', compact('products'));
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
        'taille' => 'required|in:2XS,XS,S,M,L,XL,2XL,3XL,4XL,5XL',
        'image1' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048', // Required image
        'image2' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // Optional image
        'image3' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // Optional image
        'Catégorie' => 'required|string|in:homme,femme,enfant,accessoire',
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
        'taille' => 'required|in:2XS,XS,S,M,L,XL,2XL,3XL,4XL,5XL',
        'image1' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // Optional image
        'image2' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // Optional image
        'image3' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048', // Optional image
        'Catégorie' => 'required|string|in:homme,femme,enfant,accessoire',
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
    

 
// ProductController.php

public function index(Request $request)
{
    $query = produits::query();

    // Handle price filtering
    if ($request->has('price_min') && $request->has('price_max')) {
        $price_min = $request->input('price_min');
        $price_max = $request->input('price_max');
        if ($price_min > 0 || $price_max > 0) {
            $query->whereBetween('prix', [$price_min, $price_max]);
        }
    }

    // Handle sorting
    if ($request->has('sort')) {
        $sort = $request->input('sort');
        if ($sort == 'price_asc') {
            $query->orderBy('prix', 'asc');
        } elseif ($sort == 'price_desc') {
            $query->orderBy('prix', 'desc');
        }
    }

    $products = $query->paginate(10); // Adjust pagination as needed

    if ($request->ajax()) {
        return view('partials.product-list', compact('products'));
    }

    return view('prod', compact('products'));
}





public function recherche(Request $request)
{
    $query = $request->input('search');

    // Search logic for active products only
    $products = Produits::where('is_active', 1)
                        ->where(function($q) use ($query) {
                            $q->where('name', 'LIKE', "%$query%")
                              ->orWhere('taille', 'LIKE', "%$query%")
                              ->orWhere('Référence', 'LIKE', "%$query%")
                              ->orWhere('Catégorie', 'LIKE', "%$query%");

                        })
                        ->get();

    return view('recherche', compact('products', 'query'));
}


  // app/Http/Controllers/HomeController.php

public function quiSommeNous() {
    return view('pages.qui-somme-nous');
}

public function livraisonEchange() {
    return view('pages.livraison-echange');
}

public function politiqueEchange() {
    return view('pages.politique-echange');
}

public function termsConditions() {
    return view('pages.terms-conditions');
}
  
    

}

    
    
    
   












    
