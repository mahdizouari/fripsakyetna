@extends('layouts.order-detail')

@section('title', 'Détails du produit')

@section('content')







    <!-- Your main content here -->





    <title>{{ $product->name }} - Détails du produit</title>



    <main class="container w-full max-w-5xl mx-auto p-t-30 flex-grow reveal">

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
        <div class="right-column p-t-50 ">
            <!-- Product Description -->
            <div class="product-description p-l-20 "> 
                <div class="np w-full overflow-hidden">
                    <h1 class="truncate capitalize ">
                        {{ $product->name }}
                    </h1>

                </div>


                @php
                    // Generate a consistent pseudo-random float based on product ID
                    $hash = crc32($product->id);

                    // Map hash to a number between 40 and 50 => (4.0 to 5.0)
                    $normalized = ($hash % 11 + 40) / 10;
                    $rating = round($normalized, 1);

                    $fullStars = floor($rating);
                    $halfStar = ($rating - $fullStars) >= 0.5;
                    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                @endphp


                <div class="review-stars text-yellow-500">
                    @for ($i = 0; $i < $fullStars; $i++)
                        <i class="fas fa-star"></i>
                    @endfor

                    @if ($halfStar)
                        <i class="fas fa-star-half-alt"></i>
                    @endif

                    @for ($i = 0; $i < $emptyStars; $i++)
                        <i class="far fa-star"></i>
                    @endfor

                    <span class="ml-2 text-sm text-gray-600">{{ number_format($rating, 1) }}</span>
                </div>




                <p class=" p-t-20 glow-price font-extrabold ">Disponible</p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration p-l-20 p-b-20 ">
                <!-- Product Size -->
                <div class="product-size">
                    <span>Taille : </span>
                    <h4>{{ $product->taille }}</h4>
                </div>

                <!-- Product Category -->
                <div class="product-category">
                    <span>Catégorie : </span>
                    <div class="category-choose">
                        {{ \Illuminate\Support\Str::title($product->Catégorie) }}
                    </div>

                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price  ">
                <div class="price-container mt-2">
                    <span class="price text-yellow-500 font-semibold md:text-3xl"> 
                        {{ number_format($product->prix, 2) }} DT
                    </span>
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
                    <button class="cart-btn js-add-to-cart flex items-center gap-2 bg-yellow-400 hover:bg-yellow-600 hover:text-white text-black font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out"
                        data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->prix }}">
                        <i class="fa fa-shopping-cart text-lg"></i>
                        <span>Ajouter au panier</span>
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
                            class="cart-btn js-add-to-wishlist cart-btn js-add-to-cart flex items-center gap-2 bg-yellow-400 hover:bg-yellow-600 hover:text-white text-black font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out "   {{-- <-- remove the dot before js-add-to-wishlist --}}
                            data-id="{{ $product->id }}"
                            data-name="{{ e($product->name) }}"
                            data-price="{{ $product->prix }}">
                        <i class="fa fa-heart"></i> Ajouter au souhaits
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
                <div class="return-links mr-3  ">
                    <a href="/" class="return-btn  ">
                        <img src={{asset('/images/icons/home-icon.svg')}} alt="Home" class="return-logo  ">
                    </a>
                </div>
            </div>
        </div>


    </main>
    <!-- Additional Information Boxes -->
    <div class="info-boxes">
  <div class="card">
    <div class="info-content">
      <h3><span class="text-lg mr-2 text-3xl md:text-4xl font-extrabold">🚚</span> Livraison</h3>
      <p style="color: black;" > Livraison rapide sous 1 à 3 jours ouvrables, hors dimanche et jours fériés.</p>
    </div>
  </div>

  <div class="card">
    <div class="info-content">
      <h3><span class="text-lg mr-2 text-3xl md:text-4xl font-extrabold">🔁</span> Échange Possible</h3>
        <p class="flex items-center" style="color: black;" >
           Le client doit signaler tout problème dans les 3 jours suivant la réception de la commande.
        </p>
    </div>
  </div>

  <div class="card">
    <div class="info-content">
      <h3>    <span class="text-lg mr-2  text-3xl md:text-4xl font-extrabold">🛡️</span> Garantie</h3>
        <p class="text-black flex items-center " style="color: black;">
             Nous vous garantissons que chacun de nos produits est minutieusement sélectionné, alliant qualité et renommée de marque.
        </p>
    </div>
  </div>

  <div class="card">
    <div class="info-content">
      <h3><span class="text-lg mr-2 text-3xl md:text-4xl font-extrabold">📸</span>Les photos sont réelles</h3>
        <p class="text-black flex items-center" style="color: black;">
            Nous garantissons que toutes les photos sont réelles et récentes.
        </p>
    </div>
  </div>
</div>

    <!-- Right Column -->
    <div class="right-column">
        <!-- Product Description -->


        <!-- Detailed Product Description Section -->
        <div class="detailed-description p-b-20 text-black opacity-0" style="font-family: 'Poppins', sans-serif;">
            <h2 class="section-title text-3xl md:text-4xl font-extrabold text-center tracking-tight mb-6">
                DESCRIPTION
            </h2>
            <ul class="max-w-md mx-auto text-lg space-y-2 text-left list-disc list-inside">
               <li>
                    Marque:                         

                    <span class=" break-words max-w-2xs whitespace-normal">
                        {{ \Illuminate\Support\Str::ucfirst($product->name ?? 'Non spécifié') }}
                    </span>
                </li>

                <li>Catégorie: {{ \Illuminate\Support\Str::ucfirst($product->Catégorie ?? 'Non spécifié') }}</li>
                <li>Taille: {{ \Illuminate\Support\Str::ucfirst($product->taille ?? 'Non spécifié') }}</li>
                <li>Référence: {{ \Illuminate\Support\Str::ucfirst($product->Référence ?? 'Non spécifié') }}</li>
            </ul>
        </div>

      
        <!-- Vous pouvez aussi aimer Section -->
        <div class="similar-products-wrapper mx-auto">
            <div class="similar-products">
                    <h2 class="section-title text-3xl md:text-4xl font-extrabold text-center tracking-tight mb-6" style="font-family: 'Poppins', sans-serif;">
                        Vous pouvez aussi aimer
                    </h2>

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
                             <div class="block2 flex flex-col rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300" style="align-items: stretch;">
                                                    
                                                    <div class="block2-pic hov-img0 p-2 pb-0 overflow-hidden rounded-t-2xl">
                                                       <a href="{{ route('detail', $similarProduct->id) }}" class="w-full block">
                                                            <div class="swiper product-swiper relative">
                                                                <div class="swiper-wrapper">
                                                                    @if($similarProduct->image1)
                                                                        <div class="swiper-slide flex justify-center items-center">
                                                                            <img src="{{ asset('/' . $similarProduct->image1) }}" 
                                                                                alt="Image 1" 
                                                                                class="h-48 object-contain" 
                                                                                loading="lazy">
                                                                        </div>
                                                                    @endif
                                                                    @if($similarProduct->image2)
                                                                        <div class="swiper-slide flex justify-center items-center">
                                                                            <img src="{{ asset('/' . $similarProduct->image2) }}" 
                                                                                alt="Image 2" 
                                                                                class="h-48 object-contain" 
                                                                                loading="lazy">
                                                                        </div>
                                                                    @endif
                                                                    @if($similarProduct->image3)
                                                                        <div class="swiper-slide flex justify-center items-center">
                                                                            <img src="{{ asset('/' . $similarProduct->image3) }}" 
                                                                                alt="Image 3" 
                                                                                class="h-48 object-contain" 
                                                                                loading="lazy">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <!-- Navigation arrows -->
                                                                <div class="swiper-button-next"></div>
                                                                <div class="swiper-button-prev"></div>
                                                                <!-- Pagination dots -->
                                                                <div class="swiper-pagination "></div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="block2-txt px-2 py-3 flex flex-col gap-2 text-sm sm:text-base md:text-sm ">
                                                     <a href="{{ route('detail', $similarProduct->id) }}"
                                                class="sstext-104 cl4 hover:text-yellow-600 transition-colors duration-300 font-semibold text-lg capitalize block overflow-hidden"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; height: 3rem; line-height: 1.5rem; text-overflow: ellipsis;">
                                                {{ $similarProduct->name }}
                                                </a>

                                                        


                                                        <span class="glow-price  font-extrabold">
                                                            {{ number_format($similarProduct->prix, 2) }} DT
                                                        </span>

                                                            <button class="js-btn-ajouter-panier bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded transition duration-300" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                                data-price="{{ $similarProduct->prix }}">
                                                                <i class="fa fa-shopping-cart"></i> Ajouter au panier
                                                            </button>

                                                    </div>

                                                </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <script>
             document.addEventListener("DOMContentLoaded", function () {
    new Swiper('.product-swiper', {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
        </script>
<script>
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            document.querySelectorAll('.js-btn-ajouter-panier').forEach(button => {
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
                            <style>
                                /* Make arrows smaller and yellow */
                                .swiper-button-next,
                                .swiper-button-prev {
                                    color: #facc15; /* Tailwind yellow-400 */
                                    width: 24px;
                                    height: 24px;
                                }

                                /* Make arrows a bit thinner */
                                .swiper-button-next::after,
                                .swiper-button-prev::after {
                                    font-size: 24px;
                                    font-weight: bold;
                                }

                                /* Position arrows a bit closer to the slider */
                                .swiper-button-next {
                                    right: 8px;
                                }

                                .swiper-button-prev {
                                    left: 8px;
                                }

                                /* Yellow pagination bullets */
                                .swiper-pagination-bullet {
                                    background-color: #facc15; /* yellow-400 */
                                    opacity: 0.6;
                                    width: 10px;
                                    height: 10px;
                                }

                                /* Active bullet fully opaque and bigger */
                                .swiper-pagination-bullet-active {
                                    opacity: 1;
                                    width: 12px;
                                    height: 12px;
                                }   
                                  /* price design*/   
                                .glow-price {
                                    background: linear-gradient(270deg, #ff0080, #7928ca,rgb(36, 24, 208),rgb(39, 89, 73), #ffae00,rgb(221, 4, 4));
                                    background-size: 600% 600%;
                                    -webkit-background-clip: text;
                                    background-clip: text;
                                    -webkit-text-fill-color: transparent;
                                    animation: rainbowGlow 15s ease infinite;
                                    text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
                                    
                                }

                                @keyframes rainbowGlow {
                                    0% {
                                        background-position: 0% 50%;
                                    }
                                    50% {
                                        background-position: 100% 50%;
                                    }
                                    100% {
                                        background-position: 0% 50%;
                                    }
                                }
                            </style>
@endsection