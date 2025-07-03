@extends('layouts.order-detail')

@section('title', 'Fripsakyetna')

@section('content')



    <style>
        /* Product Configuration */
        .product-configuration {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Product Size */
        .product-size,
        .product-category {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .product-size span,
        .product-category span {
            font-weight: bold;
            color: #333;
        }

        .product-size h4,
        .category-choose {
            font-size: 16px;
            color: #555;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .product-configuration {
                padding: 15px;
            }

            .product-size span,
            .product-category span {
                font-size: 14px;
            }

            .product-size h4,
            .category-choose {
                font-size: 14px;
            }
        }

        /* General Container */
        .container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        /* Slider Wrapper */

        .slider_wrap {
            max-width: 350px;
            margin: 50px auto;
            padding: 0 10px;
        }

        .product-slider .item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Thumbnails */
        .product-thumbs {
            margin-top: 15px;
        }

        .product-thumbs .thumb-item img {
            width: 100px;
            height: auto;
            cursor: pointer;
            border-radius: 6px;
            border: 2px solid transparent;
            transition: border-color 0.3s ease;
        }

        .product-thumbs .owl-item.current img {
            border-color: #ff6600;
        }

        /* Global Owl image styling */
        .owl-carousel .item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .owl-carousel img {
            width: 100%;
            height: auto;
            display: flex;
        }





        /* Custom Navigation */
        .custom-nav {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .custom-nav button {
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            background-color: #333;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .custom-nav button:hover {
            background-color: #555;
        }

        /* Product Description */
        .product-description h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-description p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .review-stars {
            display: flex;
            align-items: center;
        }

        .review-stars .star {
            color: #FFD700;
            /* Gold color for filled stars */
            margin-right: 5px;
        }

        .review-stars .star.filled {
            color: #FFD700;
        }

        .review-stars .rating-text {
            font-size: 16px;
            margin-left: 10px;
        }

        .available {
            color: green;
            font-weight: bold;
        }

        /* Product Configuration */
        .product-configuration {
            display: flex;
            flex-direction: column;
        }

        .product-color,
        .cable-config {
            margin-bottom: 10px;
        }

        .product-color span,
        .cable-config span {
            font-weight: bold;
        }

        .product-color h4,
        .cable-choose {
            font-size: 16px;
            margin-top: 5px;
        }

        /* Product Pricing */
        .product-price {
            background-color: #fff;
            padding: 2rem;
            margin: 2rem auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            max-width: 600px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .price-container {
            margin-bottom: 1rem;
        }

        .price {
            font-size: 1.5rem;
            color: #dc3545;
            margin-right: 1rem;
        }

        .price-legdim {
            font-size: 1.2rem;
            color: #888;
            text-decoration: line-through;
        }

        /* Button Container */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        /* Wishlist and Cart Buttons */
        .wishlist-btn,
        .cart-btn {
            padding: 0.6em 2em;
            border: none;
            outline: none;
            color: rgb(255, 255, 255);
            background: #111;
            cursor: pointer;
            position: relative;
            z-index: 1;
            border-radius: 10px;
            user-select: none;
            touch-action: manipulation;
            transition: background 0.3s, transform 0.3s;
        }

        .wishlist-btn:hover,
        .cart-btn:hover {
            background: #333;
            transform: scale(1.05);
        }

        .wishlist-btn:before,
        .cart-btn:before {
            content: "";
            background: linear-gradient(45deg,
                    #ff0000,
                    #ff7300,
                    #fffb00,
                    #48ff00,
                    #00ffd5,
                    #002bff,
                    #7a00ff,
                    #ff00c8,
                    #ff0000);
            position: absolute;
            top: -2px;
            left: -2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowing-button 20s linear infinite;
            transition: opacity 0.3s ease-in-out;
            border-radius: 10px;
        }

        @keyframes glowing-button {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 400% 0;
            }

            100% {
                background-position: 0 0;
            }
        }

        .wishlist-btn:after,
        .cart-btn:after {
            z-index: -1;
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: #222;
            left: 0;
            top: 0;
            border-radius: 10px;
        }

        /* Return Links */
        .return-links {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .return-btn {
            display: inline-block;
            padding: 0.5rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .return-btn:hover {
            background-color: #555;
        }

        .return-logo {
            width: 24px;
            height: 24px;
        }

        /* Media Queries for Responsiveness */

        /* Info Boxes Container */
        .info-boxes {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            justify-content: center;
        }

        /* Individual Info Box */
        .info-box {
            flex: 1 1 calc(25% - 20px);
            /* Adjust the width as needed */
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .info-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Icon Styling */
        .info-box .icon {
            font-size: 24px;
            color: #007bff;
        }

        /* Info Content */
        .info-content h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .info-content p {
            font-size: 14px;
            color: #555;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .info-box {
                flex: 1 1 calc(50% - 20px);
                /* Adjust the width for smaller screens */
            }
        }

        @media (max-width: 480px) {
            .info-box {
                flex: 1 1 100%;
                /* Full width for very small screens */
            }
        }

        /* Detailed Product Description Section */
        .detailed-description {
            display: flex;
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex-wrap: nowrap;
            flex-direction: column;
            align-items: center;
            /* border: black; */
        }

        .detailed-description .section-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        .detailed-description ul {
            list-style-type: none;
            padding: 0;
        }

        .detailed-description ul li {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }

        .detailed-description ul li:before {
            content: "\2022";
            color: #007bff;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .detailed-description {
                padding: 15px;
            }

            .detailed-description .section-title {
                font-size: 20px;
            }

            .detailed-description ul li {
                font-size: 14px;
            }
        }

        /* Similar Products Wrapper */
        .similar-products-wrapper {
            margin-top: 40px;
        }

        .similar-products .section-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        /* Isotope Grid */
        .isotope-grid {
            display: flex;
            flex-wrap: wrap;
            /*gap: 20px;*/
            padding: 20px;
            justify-content: center;
        }

        /* Individual Product Block */
        .block2 {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .block2:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Product Image */
        .block2-pic {
            position: relative;
            overflow: hidden;
        }

        .block2-pic img {
            width: 100%;
            height: auto;
            transition: transform 0.3s;
        }

        .block2-pic:hover img {
            transform: scale(1.05);
        }

        .block2-btn {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .block2-pic:hover .block2-btn {
            opacity: 1;
        }

        /* Product Text */
        .block2-txt {
            padding: 15px;
            text-align: center;
        }

        .block2-txt-child1 a {
            font-size: 16px;
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        .block2-txt-child1 a:hover {
            color: #007bff;
        }

        .block2-txt-child1 .stext-105 {
            font-size: 14px;
            color: #dc3545;
            margin-top: 5px;
            display: block;
        }

        /* Wishlist Button */
        .btn-addwish-b2 {
            background: none;
            border: none;
            cursor: pointer;
            position: relative;
        }




        .btn-addwish-b2 .icon-heart1 {
            opacity: 0.3;
            padding-top: 2em;
            width: 25px;
            height: auto;
            transition: opacity 0.3s;
        }



        .btn-addwish-b2:hover .icon-heart1 {
            opacity: 1;
        }


        /* Media Queries for Responsiveness */

        /* Review Stars */
        .review-stars {
            display: flex;
            align-items: center;
        }

        .review-stars .star {
            width: 24px;
            height: 24px;
            margin-right: 5px;
        }

        .review-stars .star-filled {
            filter: brightness(1);
            /* Ensure filled stars are bright */
        }

        .review-stars .star {
            filter: grayscale(100%);
            /* Grey color for empty stars */
        }

        .review-stars .rating-text {
            font-size: 16px;
            margin-left: 10px;
        }
    </style>





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
                <p>Nous vous garantissons que chacun de nos produits est minutieusement sélectionné, alliant qualité et
                    renommée de marque.</p>
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