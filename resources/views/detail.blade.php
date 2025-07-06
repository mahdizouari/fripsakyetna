@extends('layouts.order-detail')

@section('title', 'Fripsakyetna')

@section('content')







    <!-- Your main content here -->





    <title>{{ $product->name }} - Détails du produit</title>



    <main class="container">

        <div class="left-column">
            <!-- Product Slider -->
            <div class="slider_wrap">
                <div class="owl-carousel owl-theme"> <!-- Ensure .slider is the main class for Slick -->
                    @if($product->image1)
                        <div class="item"><img src="{{ asset('/' . $product->image1) }}" alt="Image 1"></div>
                    @endif
                    @if($product->image2)
                        <div class="item"><img src="{{ asset('/' . $product->image2) }}" alt="Image 2"></div>
                    @endif
                    @if($product->image3)
                        <div class="item"><img src="{{ asset('/' . $product->image3) }}" alt="Image 3"></div>
                    @endif
                </div>
                <!-- Navigation Buttons -->

            </div>
        </div>

        <!-- Right Column -->
        <div class="right-column">
            <!-- Product Description -->
            <div class="product-description">
                <div class="np">
                    <h1>{{ $product->name }}</h1>
                </div>
                <p>{{ $product->description ?? 'No description available.' }}</p>
                <div class="review-stars">
                    <img src="/images/icons/star.svg" class="star" alt="Star">
                    <img src="/images/icons/star.svg" class="star" alt="Star">
                    <img src="/images/icons/star.svg" class="star" alt="Star">
                    <img src="/images/icons/star.svg" class="star" alt="Star">
                    <img src="/images/icons/star.svg" class="star-filled" alt="Star">
                    <span class="rating-text">4.0</span>
                </div>

                <p class="available">Disponible</p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration">
                <!-- Product Size -->
                <div class="product-size">
                    <span>Taille : </span>
                    <h4>{{ $product->taille }}</h4>
                </div>

                <!-- Product Category -->
                <div class="product-category">
                    <span>Catégorie : </span>
                    <div class="category-choose">
                        {{ $product->Catégorie }}
                    </div>
                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <div class="price-container">
                    <span class="price">{{ number_format($product->prix, 2) }} DT</span>
                    <span class="price-legdim">{{ number_format($product->prix * 1.2, 2) }} DT</span>
                </div>
                <div class="button-container">
                    <!-- <form action="{{ route('addToCart', $product->id) }}" method="POST" class="add-to-cart-form"
                            data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->prix }}">
                            @csrf
                            <button type="submit" class="cart-btn">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>
                        -->
                    <script src="js/main.js"></script>
                    <button class="cart-btn js-add-to-cart" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                        data-price="{{ $product->prix }}">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            document.querySelectorAll('.js-add-to-cart').forEach(button => {
                                button.addEventListener('click', function () {
                                    const productId = this.dataset.id;
                                    const productName = this.dataset.name;
                                    const productPrice = this.dataset.price;

                                    // Send AJAX POST request to Laravel
                                    fetch(`/panier/add/${productId}`, {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({})
                                    })
                                        .then(response => {
                                            if (!response.ok) throw new Error('Request failed');
                                            return response.json();
                                        })
                                        .then(data => {
                                            // Facebook Pixel: AddToCart
                                            fbq('track', 'AddToCart', {
                                                content_ids: [productId],
                                                content_name: productName,
                                                value: productPrice,
                                                currency: 'TND',
                                                content_type: 'product'
                                            });

                                            // Refresh the page
                                            window.location.reload();
                                        })
                                        .catch(err => {
                                            console.error(err);
                                            // Optional: You can log or handle the error differently if needed
                                        });
                                });
                            });
                        });
                    </script>






                   {{--  WISHLIST BUTTON  --}}
                    <button type="button"
                            class="cart-btn js-add-to-wishlist"   {{-- <-- remove the dot before js-add-to-wishlist --}}
                            data-id="{{ $product->id }}"
                            data-name="{{ e($product->name) }}"
                            data-price="{{ $product->prix }}">
                        <i class="fa fa-heart"></i> Add to Wishlist
                    </button>


                   
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {

                            document.querySelectorAll('.js-add-to-wishlist').forEach(btn => {
                                btn.addEventListener('click', () => {

                                    const productId    = btn.dataset.id;
                                    const productName  = btn.dataset.name;
                                    const productPrice = btn.dataset.price;

                                    fetch(`/wishlist/add/${productId}`, {
                                        method : 'POST',
                                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                                        // No body needed, no JSON to parse
                                    })
                                    .then(res => {
                                        if (!res.ok) throw new Error('Request failed');
                                        
                                        /* Facebook Pixel */
                                        fbq('track', 'AddToWishlist', {
                                            content_ids : [productId],
                                            content_name: productName,      // now filled in
                                            value       : parseFloat(productPrice),
                                            currency    : 'TND',
                                            content_type: 'product'
                                        });

                                        /* Give the pixel ~300 ms to transmit, then reload */
                                            window.location.reload();
                                    })
                                    .catch(console.error);
                                });
                            });

                        });
                    </script>


                    


                </div>
                <div class="return-links">
                    <a href="/" class="return-btn">
                        <img src="/images/icons/home-icon.svg" alt="Home" class="return-logo">
                    </a>
                </div>
            </div>
        </div>


    </main>
    <!-- Additional Information Boxes -->
    <div class="info-boxes">
  <div class="card">
    <div class="info-content">
      <h3>Livraison</h3>
      <p>Livraison dans 1/3 jours hors Dimanche</p>
    </div>
  </div>

  <div class="card">
    <div class="info-content">
      <h3>Échange Possible</h3>
      <p>Le client doit signaler tout problème dans les 3 jours suivant la réception de la commande.</p>
    </div>
  </div>

  <div class="card">
    <div class="info-content">
      <h3>Garantie</h3>
      <p>Nous vous garantissons que chacun de nos produits est minutieusement sélectionné, alliant qualité et renommée de marque.</p>
    </div>
  </div>

  <div class="card">
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
                        <div
                            class="col-6 col-md-3 p-b-30 isotope-item {{ strtolower($similarProduct->Référence) }} {{ strtolower($similarProduct->Catégorie) }}">
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <a href="{{ route('detail', $similarProduct->id) }}">
                                        <img src="{{ asset('/' . $similarProduct->image1) }}" alt="{{ $similarProduct->name }}">
                                    </a>

                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{ route('detail', $similarProduct->id) }}"
                                            class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $similarProduct->name }}
                                        </a>
                                        <span class="stext-105 cl3">
                                            {{ number_format($similarProduct->prix, 2) }} DT
                                        </span>
                                    </div>
                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <form action="{{ route('wishlist.add', $similarProduct->id) }}" method="POST"
                                            class="js-addwish-form">
                                            @csrf
                                            <button type="submit" class="btn-addwish-b2 dis-block pos-relative">
                                                <div class="icon-heart1 dis-block trans-04">
                                                    <svg class="heart-icon" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                                            fill="red" />
                                                    </svg>
                                                </div>

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