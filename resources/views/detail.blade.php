@extends('layouts.order-detail')

@section('title', 'Fripsakyetna')

@section('content')

<title>{{ $product->name }} - Détails du produit</title>
   
    

   <main class="container">
       <div class="left-column">
           <!-- Product Slider -->
           <div class="slider_wrap">
               <div class="slider">
                   @if($product->image1)
                       <div><img src="{{ asset('/' . $product->image1) }}" alt="Image 1"></div>
                   @endif
                   @if($product->image2)
                       <div><img src="{{ asset('/' . $product->image2) }}" alt="Image 2"></div>
                   @endif
                   @if($product->image3)
                       <div><img src="{{ asset('/' . $product->image3) }}" alt="Image 3"></div>
                   @endif
               </div>
           </div>
       </div>

       <!-- Right Column -->
       <div class="right-column">
           <!-- Product Description -->
           <div class="product-description">
               <h1>{{ $product->name }}</h1>
               <p>{{ $product->description ?? 'No description available.' }}</p>
               <div class="review-stars">
                   <i class="fas fa-star star filled"></i>
                   <i class="fas fa-star star filled"></i>
                   <i class="fas fa-star star filled"></i>
                   <i class="fas fa-star star filled"></i>
                   <i class="fas fa-star star"></i>
                   <span class="rating-text">4.0</span>
               </div>
               <p class="available">Disponible</p>
           </div>

           <!-- Product Configuration -->
           <div class="product-configuration">
               <!-- Product Color -->
               <div class="product-color">
                   <span>Taille : </span>
                   <h4>{{ $product->taille }}</h4>
               </div>

               <!-- Cable Configuration -->
               <div class="cable-config">
                   <span>Catégorie : </span>
                   <div class="cable-choose">
                       {{ $product->Catégorie }}
                   </div>
               </div>
           </div>

           <!-- Product Pricing -->
           <div class="product-price">
               <div class="price-container">
                   <span class="price">{{ number_format($product->prix, 2) }} DT</span>
                   <form action="{{ route('addToCart', $product->id) }}" method="POST" class="d-inline">
                       @csrf
                       <button type="submit" class="cart-btn">
                           <i class="fa fa-shopping-cart"></i> Ajouter au panier
                       </button>
                   </form>
                   <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="d-inline">
                       @csrf
                       <button type="submit" class="wishlist-btn">
                           <i class="fa fa-heart"></i> Ajouter aux favoris
                       </button>
                   </form>
               </div>
               <div>
                   <a href="/" class="return-btn">Retourner à la page principale</a>
                   <a href="/panier" class="return-btn">Voir le panier</a>
               </div>
              
           </div>
       </div>
       
   </main>
   <!-- Additional Information Boxes -->
<div class="info-boxes">
   <div class="info-box">
       <i class="fas fa-truck icon"></i>
       <div class="info-content">
           <h3>Livraison</h3>
           <p>Livraison dans 1/3 jours hors Dimanche</p>
       </div>
   </div>
   <div class="info-box">
       <i class="fas fa-sync-alt icon"></i>
       <div class="info-content">
           <h3>Échange Possible</h3>
           <p>Le client doit signaler tout problème dans les 3 jours suivant la réception de la commande.</p>
       </div>
   </div>
   <div class="info-box">
       <i class="fas fa-shield-alt icon"></i>
       <div class="info-content">
           <h3>Garantie</h3>
           <p>Nous vous garantissons que chacun de nos produits est minutieusement sélectionné, alliant qualité et renommée de marque.</p>
       </div>
   </div>
   <div class="info-box">
       <i class="fas fa-camera icon"></i>
       <div class="info-content">
           <h3>Toutes les photos sont réelles</h3>
           <p>Nous garantissons que toutes les photos sont réelles et récentes.</p>
       </div>
   </div>
</div>
<!-- Right Column -->
<div class="right-column">
    <!-- Product Description -->
   

    <!-- Detailed Product Description Section -->
    <div class="detailed-description">
        <h2 class="section-title">DESCRIPTION</h2>
        <ul>
            <li>Marque: {{ $product->name ?? 'Non spécifié' }}</li>
            <li>Catégorie: {{ $product->Catégorie ?? 'Non spécifié' }}</li>
            <li>Taille: {{ $product->taille ?? 'Non spécifié' }}</li>
            <li>Référence: {{ $product->Référence ?? 'Non spécifié' }}</li>
        </ul>
    </div>

    <!-- Product Configuration -->
   <!-- Vous pouvez aussi aimer Section -->

  
<!-- Vous pouvez aussi aimer Section -->
<!-- Vous pouvez aussi aimer Section -->
<div class="similar-products-wrapper">
    <div class="similar-products">
        <h2 class="section-title">Vous pouvez aussi aimer</h2>

        @php
            // Fetching similar products in the Blade view
            $similarProducts = \App\Models\produits::where('Catégorie', $product->Catégorie)
                                ->where('id', '!=', $product->id)
                                ->where('is_active', true)
                                ->limit(4)
                                ->get();
        @endphp

        <div class="row isotope-grid">
            @foreach($similarProducts as $similarProduct)
                <div class="col-6 col-md-3 p-b-30 isotope-item {{ strtolower($similarProduct->Référence) }} {{ strtolower($similarProduct->Catégorie) }}">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <a href="{{ route('detail', $similarProduct->id) }}">
                                <img src="{{ asset('/' . $similarProduct->image1) }}" alt="{{ $similarProduct->name }}">
                            </a>
                            <a href="{{ route('detail', $similarProduct->id) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                Voir le produit
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{ route('detail', $similarProduct->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $similarProduct->name }}
                                </a>
                                <span class="stext-105 cl3">
                                    {{ number_format($similarProduct->prix, 2) }} DT
                                </span>
                            </div>
                            <div class="block2-txt-child2 flex-r p-t-3">
                                <form action="{{ route('wishlist.add', $similarProduct->id) }}" method="POST" class="js-addwish-form">
                                    @csrf
                                    <button type="submit" class="btn-addwish-b2 dis-block pos-relative">
                                        <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
