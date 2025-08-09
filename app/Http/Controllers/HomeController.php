<?php

namespace App\Http\Controllers;
use App\Models\produits;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;
  use Illuminate\Support\Facades\DB;




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
    $products = produits::where('is_active', true)
    ->orderByRaw("CASE 
        WHEN Référence LIKE '%#%' THEN 1 
        ELSE 2 
    END")
    ->orderByRaw("CAST(SUBSTRING_INDEX(Référence, '#', -1) AS UNSIGNED) ASC")
    ->inRandomOrder() // random fallback for others
    ->get();


    return view('welcome', compact('slider', 'products'));
}


        
    public function product(Request $request)
{
    // Get filter parameters
    $category = $request->input('category');
    $reference = $request->input('reference');
    $taille = $request->input('taille');

    // Start query for active products
    $query = produits::where('is_active', true);

    // Apply filters
    if ($category) {
        $query->where('Catégorie', $category);
    }

    if ($reference) {
        $query->where('Référence', $reference);
    }

    if ($taille) {
        $query->where('taille', $taille);
    }

    // Apply custom sorting by numeric part after "#"
    $query->orderByRaw("
        CASE 
            WHEN `Référence` LIKE '%#%' 
            THEN CAST(SUBSTRING_INDEX(`Référence`, '#', -1) AS UNSIGNED) 
            ELSE 99999 
        END
    ");

    // Paginate results
    $products = $query->paginate(30);

    // Get available tailles (not sorted by Référence here, only distinct)
    $taillesDisponibles = produits::where('is_active', true)
                                  ->whereNotNull('taille')
                                  ->distinct()
                                  ->pluck('taille');

    return view('prod', compact('products', 'taillesDisponibles'));
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
public function lg()
    {
        return view('auth.lg');
    }

public function showClientProfile($clientId)
{
    $client = user::find($clientId);

    return view('client.profile', ['client' => $client]);
}
public function mspace()
{
    $products = produits::get();

    $sorted = $products->filter(function ($product) {
        return preg_match('/#\d+$/', $product->Référence);
    })->sortBy(function ($product) {
        preg_match('/#(\d+)$/', $product->Référence, $m);
        return (int) $m[1];
    })  ;
    

    $others = $products->reject(function ($product) {
        return preg_match('/#\d+$/', $product->Référence);
    });
    

    $final = $sorted->concat($others)->values();

    return view('mspace', ['product' => $final]);
}



public function create()
{  

    return view('crud.create'); 
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255|string',
        'taille' => 'required|max:255|string',
        'image1' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        'image2' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        'image3' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
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

    $newRef = $request->Référence;

    // Check if Référence ends with #number
    if (preg_match('/#(\d+)$/', $newRef, $matches)) {
        $number = $matches[1];

        // Check if another product has this #number
        $existingProduct = produits::where('Référence', 'LIKE', '%#' . $number)->first();

        if ($existingProduct) {
            // Change existing product's Référence to something else
            // For example, remove the #number suffix
            $existingProduct->Référence = preg_replace('/#\d+$/', '', $existingProduct->Référence);
            $existingProduct->save();
        }
    }

    // Create the new product with the given Référence
    produits::create([
        'name' => $request->name,
        'taille' => $request->taille,
        'image1' => $images['image1'],
        'image2' => $images['image2'],
        'image3' => $images['image3'],
        'Catégorie' => $request->Catégorie,
        'Référence' => $newRef,
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
        'taille' => 'required|max:255|string',
        'image1' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        'image2' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        'image3' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        'Catégorie' => 'required|string|in:homme,femme,enfant,accessoire',
        'Référence' => 'required|max:255|string',
        'is_active' => 'sometimes',
        'prix' => 'required|numeric',
    ]);

    // Find the product by ID
    $produit = produits::findOrFail($id);

    $newRef = $request->Référence;


// ... inside your update method ...

// It's best practice to wrap this logic in a transaction.
// If saving one product fails, the other change is rolled back.
DB::transaction(function () use ($produit, $newRef) {

    // Step 1: Check if the new reference has the 'prefix#number' format.
    if (preg_match('/^(.*?)#(\d+)$/', $newRef, $newMatches)) {
        $newNumber = $newMatches[2];

        // Step 2: Check if another product is already using this number.
        $otherProduct = produits::where('Référence', 'LIKE', '%#' . $newNumber)
                                            ->where('id', '!=', $produit->id)
                                            ->first();

        // Step 3: If a conflict exists, perform a swap.
        if ($otherProduct) {
            // Get the prefix of the conflicting product.
            preg_match('/^(.*?)#/', $otherProduct->Référence, $otherMatches);
            $otherPrefix = $otherMatches[1] ?? $otherProduct->Référence; // Fallback to full ref if regex fails

            // SCENARIO A: The product we are editing ALREADY has a number.
            if (preg_match('/#(\d+)$/', $produit->Référence, $currentMatches)) {
                $currentNumber = $currentMatches[1];
                // The other product gets the current product's old number.
                $otherProduct->Référence = $otherPrefix . '#' . $currentNumber;
            } 
            // SCENARIO B: The product we are editing DOES NOT have a number (Your new request!).
            else {
                // The other product loses its number entirely, reverting to its prefix.
                $otherProduct->Référence = $otherPrefix;
            }

            $otherProduct->save();
        }

        // In all cases where the new ref has a format, we assign it to the current product.
        $produit->Référence = $newRef;

    } else {
        // The new reference doesn't have a #number, so just assign it directly.
        // No possibility of a swap here.
        $produit->Référence = $newRef;
    }

    // Finally, save the main product that was being updated.
    $produit->save();
});


$produit->save();




    // Handle image uploads
    foreach (['image1', 'image2', 'image3'] as $imageField) {
        if ($request->hasFile($imageField)) {
            if ($produit->{$imageField} && Storage::disk('public')->exists($produit->{$imageField})) {
                Storage::disk('public')->delete($produit->{$imageField});
            }

            $file = $request->file($imageField);
            $filename = time() . '_' . $imageField . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images', $filename, 'public');
            $produit->{$imageField} = $path;
        }
    }

    // Update other details
    $produit->name = $request->name;
    $produit->taille = $request->taille;
    $produit->Catégorie = $request->Catégorie;
    $produit->is_active = $request->has('is_active') ? 1 : 0;
    $produit->prix = $request->prix;

    // Save updated product
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



    // Search by reference, name, or size
    $products = produits::where('Référence', 'like', '%' . $query . '%')
        ->orWhere('name', 'like', '%' . $query . '%')
        ->orWhere('taille', 'like', '%' . $query . '%')
        ->where('is_active', true) // Ensuring we only fetch active products
        ->paginate(16);

    $message = "3asba";
    file_put_contents('php://stdout', $message . PHP_EOL);

    return view('crud.search', compact('products'));
}

    

 
// ProductController.php






public function recherche(Request $request)
{
    $query = $request->input('query');

    // Search logic for active products only
    $products = produits::where('is_active', 1)
                        ->where(function($q) use ($query) {
                            $q->where('name', 'LIKE', "%$query%")
                              ->orWhere('Référence', 'LIKE', "%$query%")
                              ->orWhere('Catégorie', 'LIKE', "%$query%")
                              ->orWhere('taille', '=', $query);  // Exact match for 'taille'

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
public function FAQs() {
    return view('pages.Aide_&_FAQs');
}
  
public function index(Request $request)
{
    $products = produits::query();

    // Filter by category if provided
    if ($request->has('category') && !empty($request->category)) {
        $products->where('Catégorie', $request->category);
    }

    // Filter by reference if provided
    if ($request->has('reference') && !empty($request->reference)) {
        $products->where('Référence', $request->reference);
    }

    // Filter by taille if provided
    if ($request->has('taille') && !empty($request->taille)) {
        $products->where('taille', $request->taille);
    }

    $filteredProducts = $products->get();


    return view('products.index', compact('filteredProducts'));
}

    

}

    
    
    
   












    
