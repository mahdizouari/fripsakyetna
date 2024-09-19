@extends('layouts.base')

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
   <!-- Scripts -->

   <script>
       $(document).ready(function(){
           // Initialize the Slick carousel
           $('.slider').slick({
               slidesToShow: 1,
               slidesToScroll: 1,
               arrows: true,
               fade: true
           });
       });
   </script>
   <style>
       .cart-btn {
           background-color: #007bff;
           color: #fff;
           border: none;
           padding: 10px 20px;
           text-align: center;
           text-decoration: none;
           display: inline-block;
           font-size: 16px;
           border-radius: 5px;
           cursor: pointer;
       }

       .cart-btn i {
           margin-right: 5px;
       }

       .cart-btn:hover {
           background-color: #0056b3;
       }

       .wishlist-btn {
           background-color: #e83e8c;
           color: #fff;
           border: none;
           padding: 10px 20px;
           text-align: center;
           text-decoration: none;
           display: inline-block;
           font-size: 16px;
           border-radius: 5px;
           cursor: pointer;
           margin-left: 10px;
       }

       .wishlist-btn i {
           margin-right: 5px;
       }

       .wishlist-btn:hover {
           background-color: #c82333;
       }

       .slider_wrap {
           margin-bottom: 20px;
       }

       .slider img {
           width: 100%;
           height: auto;
           border-radius: 8px;
       }

       .product-description h1 {
           font-size: 2rem;
           margin-bottom: 10px;
       }

       .product-description p {
           font-size: 1rem;
           margin-bottom: 20px;
       }

       .product-price .price-container {
           display: flex;
           align-items: center;
           margin-bottom: 20px;
       }

       .price {
           font-size: 1.5rem;
           font-weight: bold;
           margin-right: 20px;
       }

       .return-btn {
           display: inline-block;
           margin-right: 10px;
           color: #007bff;
           text-decoration: none;
           font-size: 16px;
       }

       .return-btn:hover {
           text-decoration: underline;
       }

       .free-shipping {
           display: flex;
           align-items: center;
           margin-top: 20px;
       }

       .free-shipping .icon {
           font-size: 24px;
           color: #007bff;
           margin-right: 10px;
       }

       .shipping-text {
           font-size: 1rem;
           font-weight: bold;
       }

       .delivery-info {
           font-size: 0.875rem;
           color: #6c757d;
       }
   </style>
<style>
   .info-boxes {
       display: flex;
       justify-content: space-between;
       margin-top: 30px;
       padding: 0 15px; /* Add padding to prevent touching edges */
       box-sizing: border-box; /* Ensure padding is included in width calculations */
   }

   .info-box {
       background-color: #f8f9fa;
       border: 1px solid #e9ecef;
       border-radius: 8px;
       padding: 15px;
       width: 24%;
       box-shadow: 0 2px 4px rgba(0,0,0,0.1);
       display: flex;
       align-items: center;
       box-sizing: border-box; /* Ensure padding is included in width calculations */
   }

   .info-box .icon {
       font-size: 24px;
       color: #007bff;
       margin-right: 15px;
   }

   .info-box .info-content h3 {
       font-size: 1.2rem;
       margin-bottom: 10px;
       font-weight: bold;
   }

   .info-box .info-content p {
       font-size: 0.9rem;
       color: #495057;
   }

   @media (max-width: 768px) {
       .info-boxes {
           flex-direction: column;
           align-items: center; /* Center boxes vertically */
           padding: 0; /* Remove padding for small screens */
       }

       .info-box {
           width: 90%; /* Adjust width for smaller screens */
           margin-bottom: 15px;
       }

       .info-box:last-child {
           margin-bottom: 0;
       }
   }
</style>
<style>
    .detailed-description {
    border: 1px solid #ddd;
    padding: 20px;
    margin-top: 20px;
    border-radius: 10px;
}

.section-title {
    text-align: center;
    font-weight: bold;
    font-size: 1.5rem;
    color: #0056b3;
    position: relative;
}

.section-title:after {
    content: '';
    display: block;
    width: 50px;
    height: 2px;
    background-color: #000;
    margin: 5px auto 10px;
}

.detailed-description ul {
    list-style: none;
    padding: 0;
}

.detailed-description ul li {
    margin-bottom: 10px;
    font-size: 1rem;
}

</style>
<style>
    .block2-pic img {
    width: 90%;
    height: auto;
}

.block2 {
    border: 1px solid #e6e6e6;
    padding: 10px;
}

.block2-btn {
    margin-top: 10px;
}

.block2-txt {
    text-align: left;
}

/* Mobile and Tablet adjustments */
@media (max-width: 768px) {
    .block2 {
        padding: 8px;
    }

    .block2-pic img {
        height: auto;
    }
}

@media (max-width: 576px) {
    .col-6 {
        max-width: 40%;
        flex: 0 0 50%; /* 2 items per row for smaller devices */
    }
}

</style>
