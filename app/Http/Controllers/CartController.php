<?php

// CartController.php

namespace App\Http\Controllers;

use App\Models\produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\commande;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon; // Ensure Carbon is imported for date handling
use Illuminate\Support\Str;




class CartController extends Controller
{
    

    // Show panier contents
    public function showPanier()
    {
        $cartCount = $this->getCartCount(); // Calculate the cart count

        return view('panier'); // Ensure this matches the Blade view name for the panier
    }
    public function getCartCount()
    {
        $panier = Session::get('productItems', []);
        return array_sum(array_column($panier, 'quantity'));
    }
     public function deleteItems()
        {
            session()->forget('productItems');
            return redirect()->back()->with('success', 'Tous les articles ont été supprimés du panier.');
        }

    // Add product to the panier
    public function addToCart(Request $request, $productId)
    {
        $product = produits::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }

        $panier = Session::get('productItems', []);

        // Check if the product already exists in the panier
        if (isset($panier[$productId])) {
            // Increase quantity if already in panier
            $panier[$productId]['quantity']++;
        } else {
            $panier[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'image1' => $product->image1,
                'prix' => $product->prix,
                'taille' => $product->taille,
                'Catégorie' => $product->Catégorie,
                'quantity' => 1
            ];
        }

        Session::put('productItems', $panier);

        return response()->json([
            'success' => true,
            'cart' => $panier // ✅ Debug: return the cart directly
        ]);   
    }

    // Remove product from the panier
    public function removeFromCart($productId)
    {
        $panier = Session::get('productItems', []);

        if (isset($panier[$productId])) {
            unset($panier[$productId]);
            Session::put('productItems', $panier);
        }

        return redirect()->back()->with('message', 'Produit retiré du panier.');   
    }


    
public function commande(){
    return view('commande');
}

// Checkout process

public function checkout(Request $request)
{
    $panier = Session::get('productItems', []);
    if (empty($panier)) {
        // handle empty cart
    }

    // Validate request fields...

    $clientAddress = $request->input('address') . ', ' . $request->input('city');

    $orderGroupId = (string) Str::uuid();  // or Str::random(32)

    $lastOrder = null;
    foreach ($panier as $item) {
        $lastOrder = Commande::create([
            'nom_de_produit' => $item['name'],
            'nom_de_client' => $request->input('full_name'),
            'numero_de_client' => $request->input('phone_number'),
            'adresse' => $clientAddress,
            'prix' => $item['prix'],
            'date' => now(),
            'order_group_id' => $orderGroupId,
        ]);
    }

    Session::forget('productItems');

    if ($request->ajax()) {
        return response()->json([
            'redirect_to' => route('order-confirmation', ['orderGroupId' => $orderGroupId])
        ]);
    } else {
        return redirect()->route('order-confirmation', ['orderGroupId' => $orderGroupId]);
    }
}






//order-confirmation

public function confirmOrder($orderGroupId)
{
    Session::forget('productItems');

    $commandes = Commande::where('order_group_id', $orderGroupId)->get();

    if ($commandes->isEmpty()) {
        abort(404, 'Commande introuvable');
    }

    return view('order-confirmation', compact('commandes', 'orderGroupId'));
}





    






//commandes :
public function showCommandes()
{
    // Fetch all commandes from the database
    $commandes = commande::all();

    // Pass the data to the view
    return view('commande', compact('commandes'));
}
public function destroy($id)
    {
        $commandes = commande::findOrFail($id);
        $commandes->delete();

        return redirect()->back()->with('success', 'Commande supprimée avec succès.');
    }


    //wishlist : 
    public function wishlist()
    {
        $wishlistItems = Session::get('wishlistItems', []);
        return view('wishlist', compact('wishlistItems'));
    }

    public function add(Request $request, $productId)
    {
        $product = produits::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }

        $wishlist = Session::get('wishlistItems', []);
        $wishlist[$productId] = $product;
        Session::put('wishlistItems', $wishlist);

        return redirect()->back()->with('message', 'Produit ajouté à la liste de souhaits.');
    }

    public function remove($productId)
    {
        $wishlist = Session::get('wishlistItems', []);
        if (isset($wishlist[$productId])) {
            unset($wishlist[$productId]);
            Session::put('wishlistItems', $wishlist);
        }

        return redirect()->back()->with('message', 'Produit retiré de la liste de souhaits.');
    } 
    
  
   


}