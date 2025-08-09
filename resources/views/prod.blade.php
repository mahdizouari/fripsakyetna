@extends('layouts.base')

@section('title', 'Frip')

@section('content')

<!-- Product -->
<script src="js/main.js"></script>

<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52 p-4">
            <!-- Desktop Only Filter Buttons -->
            <div class="desktop-filter d-none d-md-flex flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tous les produits
                </button>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 filter-category" data-filter=".femme">
                    Femmes
                </button>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 filter-category" data-filter=".homme">
                    Hommes
                </button>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 filter-category" data-filter=".enfant">
                    Enfants
                </button>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 filter-category" data-filter=".accessoire">
                    Accessoires
                </button> 
            </div>
           <!-- Mobile Filter (stacked card style) -->
        <div class="mobile-filter filter-tope-group block md:hidden  m-tb-5  card">
            <div class="p-lr-15 p-tb-10 bg-light bor3 text-center  "> 
                <button class="block w-full  stext-106 cl6 hov1 bor3 trans-04 p-2 m-b-5 text-center how-active1" data-filter="*">
                    Tous les produits
                </button>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-8 m-tb-5 filter-category" data-filter=".femme">
                    Femmes
                </button>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-8 m-tb-5 filter-category" data-filter=".homme">
                    Hommes
                </button>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-8 m-tb-5 filter-category" data-filter=".enfant">
                    Enfants
                </button>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-8 m-tb-5 filter-category" data-filter=".accessoire">
                    Accessoires
                </button>
            </div>
        </div>



            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filtrer
                </div>

               
            </div>
            
            <style>
                .bg0 {
                    background-color:rgba(247, 247, 247, 0.83); /* or any color */
                    }

                    .m-t-23 {
                    margin-top: 23px;
                    }

                    .p-b-140 {
                    padding-bottom: 140px;
                    }

                
            </style>

            <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10" style="    display: none; height: 0px; opacity: 0;">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-lr-15-sm">

                   

                        <!-- Filter for Mobile -->
                        <div class="filter-mobile d-lg-none">
                            <!-- Mobile Filter Toggle -->

                            <div class="filter-mobile-content dis-none panel-filter w-full p-t-10">
                                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                                    <!-- Category Section -->
                                    <div class="filter-col1 p-r-15 p-b-27">
                                        <div class="mtext-102 cl2 p-b-15">Catégorie</div>
                                        <ul class="category-filter-list flex-row">
                                            @foreach(['homme', 'femme', 'enfant'] as $category)
                                                <li class="p-b-6">
                                                    <a href="#" class="filter-link stext-106 trans-04 category-filter {{ request('category') == $category ? 'active' : '' }}" data-category="{{ $category }}">
                                                        {{ ucfirst($category) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <!-- Reference Section -->
                                    <div class="filter-col2 p-r-15 p-b-27">
                                        <div class="mtext-102 cl2 p-b-15">Référence</div>
                                        <ul class="reference-filter-list flex-row">
                                            @foreach(['nba', 'foot', 'sport'] as $reference)
                                                <li class="p-b-6">
                                                    <a href="#" class="filter-link stext-106 trans-04 reference-filter {{ request('reference') == $reference ? 'active' : '' }}" data-reference="{{ $reference }}">
                                                        {{ ucfirst($reference) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <!-- Taille Section -->
                                    <div class="filter-col3 p-r-15 p-b-27">
                                        <div class="mtext-102 cl2 p-b-15"> Taille </div>
                                        <ul class="taille-filter-list flex-row">
                                            @foreach($taillesDisponibles as $taille)
                                                <li class="p-b-6">
                                                    <a href="#" class="filter-link stext-106 trans-04 taille-filter {{ request('taille') == $taille ? 'active' : '' }}" data-taille="{{ $taille }}">
                                                        {{ $taille }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                <script src="js/main.js"></script>

                            <!-- Apply Filters Button -->
                                <div class="apply-filter-btn-wrapper text-center p-t-20">
                                    <button class="filter-button apply-filters" id="apply-filters-btn">Filtrer</button>
                                    <button class="filter-button apply-filters  " id="clear-filters-btn">Réinitialiser</button>

                                </div>


                            </div>
                            
                        </div>

                    </div>
                </div>
             <!-- JavaScript to Handle Filtering -->
        <script>
            let selectedCategory = '';
            let selectedReference = '';
            let selectedTaille = '';
            // Selectors
            const filterToggleBtn = document.querySelector('.js-show-filter');
            const filterPanel = document.querySelector('.panel-filter');
            const iconFilter = document.querySelector('.icon-filter');
            const iconClose = document.querySelector('.icon-close-filter');

            // Click event
            
// Clear filter button click event
document.getElementById('clear-filters-btn').addEventListener('click', function () {
    // Reset variables
    selectedCategory = '';
    selectedReference = '';
    selectedTaille = '';

    // Remove active classes
    document.querySelectorAll('.category-filter, .reference-filter, .taille-filter').forEach(function (el) {
        el.classList.remove('active');
    });

    // Redirect to the page without query params
    window.location.href = '/prod';
});





            // Category filter click event with toggle functionality
            document.querySelectorAll('.category-filter').forEach(function (el) {
                el.addEventListener('click', function (e) {
                    e.preventDefault();
                    const isActive = this.classList.contains('active');

                    // Toggle active class
                    document.querySelectorAll('.category-filter').forEach(function (el) {
                        el.classList.remove('active');
                    });

                    if (!isActive) {
                        selectedCategory = this.dataset.category;
                        this.classList.add('active');
                    } else {
                        selectedCategory = ''; // Reset the selection if unpressed
                    }
                });
            });

            // Reference filter click event with toggle functionality
            document.querySelectorAll('.reference-filter').forEach(function (el) {
                el.addEventListener('click', function (e) {
                    e.preventDefault();
                    const isActive = this.classList.contains('active');

                    // Toggle active class
                    document.querySelectorAll('.reference-filter').forEach(function (el) {
                        el.classList.remove('active');
                    });

                    if (!isActive) {
                        selectedReference = this.dataset.reference;
                        this.classList.add('active');
                    } else {
                        selectedReference = ''; // Reset the selection if unpressed
                    }
                });
            });

            // Taille filter click event with toggle functionality
            document.querySelectorAll('.taille-filter').forEach(function (el) {
                el.addEventListener('click', function (e) {
                    e.preventDefault();
                    const isActive = this.classList.contains('active');

                    // Toggle active class
                    document.querySelectorAll('.taille-filter').forEach(function (el) {
                        el.classList.remove('active');
                    });

                    if (!isActive) {
                        selectedTaille = this.dataset.taille;
                        this.classList.add('active');
                    } else {
                        selectedTaille = ''; // Reset the selection if unpressed
                    }
                });
            });


            // Apply filter button click event
            document.getElementById('apply-filters-btn').addEventListener('click', function () {
                let queryString = '?category=' + selectedCategory + '&reference=' + selectedReference + '&taille=' + selectedTaille;
                window.location.href = '/prod' + queryString;
            });
                

        </script>
        
       <style>  
                    /* Styling for active filter links */
            .filter-link.active {
                color: white;
                background-color: #ffcc00;
                padding: 5px 10px;
                border-radius: 5px;
            }

            /* Yellow button for filter application */
            .filter-button {
                background-color: #ffcc00;
                color: black;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s ease;
            }

            .filter-button:hover {
                background-color: #ffb700;
            }

            /* Horizontal layout of sections */
            .wrap-filter {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            /* Ensuring filters appear side by side */
            .filter-col1, 
            .filter-col2, 
            .filter-col3, 
            .filter-col4 {
                flex-basis: 20%; /* Adjust this value to fit your layout */
                text-align: center;
            }

            /* Adjustments for mobile view */


                /* Stack filter sections vertically on mobile */
                .filter-col1, 
                .filter-col2, 
                .filter-col3, 
                .filter-col4 {
                    flex-basis: 100%;
                    text-align: left;
                    margin-bottom: 20px;
                    padding: 10px;
                    background-color: #f9f9f9; /* Optional background to make sections stand out */
                    border-radius: 10px; /* Optional rounding for a polished look */
                }


            /* Optional: To improve spacing on all screen sizes */
            .wrap-filter ul {
                list-style-type: none;
                padding-left: 0; /* Ensures no padding on the left */
                margin-bottom: 0; /* Removes bottom margin for cleaner look */
            }

            .wrap-filter li {
                margin-bottom: 15px; /* Increased spacing between items */
                font-size: 16px; /* Slightly larger font for better readability */
            }

       </style>



        </div>

        <!-- Product Listings -->
        <div class="row isotope-grid justify-center">
            @foreach ($products as $product)
                <div class="col-6 col-md-3 p-b-30 isotope-item {{ strtolower($product->Référence) }} {{ strtolower($product->Catégorie) }}" >
                                        <div class="block2 flex flex-col rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300" style="align-items: stretch;">
                                            <div class="block2-pic hov-img0 overflow-hidden rounded-t-lg flex justify-center items-center bg-white">
                                                <a href="{{ route('detail', $product->id) }}">
                                                    <img 
                                                    src="{{ asset('/' . $product->image1) }}" 
                                                    alt="IMG-PRODUCT" 
                                                    loading="lazy" 
                                                    class="object-cover transition-transform duration-500 hover:scale-105"
                                                    >
                                                </a>
                                            </div>

                                            <div class="block2-txt m-2 mt-1 flex flex-col p-2 gap-3">
                                               <a href="{{ route('detail', $product->id) }}"
                                                class="sstext-104 cl4 hover:text-yellow-600 transition-colors duration-300 font-semibold text-lg capitalize block overflow-hidden"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; height: 3rem; line-height: 1.5rem; text-overflow: ellipsis;">
                                                {{ $product->name }}
                                                </a>


                                                <span class="glow-price  font-extrabold p-1">
                                                    {{ number_format($product->prix, 2) }} DT
                                                </span>

                                                    <button class="js-btn-ajouter-panier bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded transition duration-300" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-price="{{ $product->prix }}">
                                                        <i class="fa fa-shopping-cart"></i> Ajouter au panier
                                                    </button>

                                            </div>
                    </div>
                </div>
            @endforeach

            <!-- Pagination Links -->
            
        </div>
    </div>
            <div class="flex-c-m flex-w w-full p-t-45 pagination-container">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>

</div>

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
 /* Product Grid */
.isotope-grid {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: center !important;
}

.isotope-item {
    flex: 0 0 calc(25% - 30px) !important;
    max-width: calc(25% - 30px) !important;
    box-sizing: border-box !important;
    display: flex;
    justify-content: center; /* Center item content */
}

    @media (max-width: 600px) {
        .isotope-item {
            flex: 1 1 calc(50% - 10px) !important;  /* Two items per row with spacing */
            max-width: calc(50% - 10px) !important;
            box-sizing: border-box !important;
        }

        .isotope-grid {
            gap: 20px !important;  /* Controls space between items */
            justify-content: center !important;
        }
        
    }


.btn-ajouter-panier {
                            width: 100%;
                            cursor: pointer;
                            box-shadow: 0 4px 6px rgba(212, 175, 55, 0.4);
                        }
                        .btn-ajouter-panier:hover {
                            box-shadow: 0 6px 10px rgba(212, 175, 55, 0.6);
                        }
                        /* price design*/   
                        .glow-price {
                            background: linear-gradient(270deg, #ff0080, #7928ca,rgb(36, 24, 208),rgb(39, 89, 73), #ffae00,rgb(221, 4, 4));
                            background-size: 600% 600%;
                            -webkit-background-clip: text;
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

/* Product Card */
.block2 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    margin: 5px 5px;
    padding-top: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    background-color: #fff;
    position: relative;
    width: 100%;
    max-width:200px;
    text-align: center;
}



.block2 img {
    max-width: 170px;
    height: 200px;
}

.block2 h4,
.block2 span {
    margin: 5px 0;
    font-size: 14px;
    word-wrap: break-word;
}

/* Grid responsiveness */
.isotope-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.isotope-item {
    flex: 1 1 calc(50% - 20px);
    max-width: calc(50% - 20px);
    box-sizing: border-box;
}

@media (min-width: 768px) {
    .isotope-item {
        flex: 1 1 calc(25% - 20px);
        max-width: calc(25% - 20px);
    }
}.block2-txt-child1 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    text-align: center;
    height: 90px; /* Fixed height for uniformity */
    padding: 2px;
    overflow: hidden;
}












</style>
<style>
    /* General Mobile Filter Section Styling */
.filter-mobile {
    flex-direction: none !important;
    align-items: none !important;
  width: 100% !important;
  display: block !important;
}

.filter-mobile-content {
  padding: 10px 15px !important;
}

.wrap-filter {
  display: flex !important;
  flex-wrap: wrap !important;
  justify-content: space-between !important;
}

/* Filter Columns (Category, Reference, Taille) */
.filter-col1, .filter-col2, .filter-col3 {
  flex: 1 !important;
  margin-right: 15px !important;
  margin-bottom: 20px !important;
}

.mtext-102 {
  font-size: 18px !important;
  font-weight: bold !important;
  margin-bottom: 10px !important;
}

.filter-link {
  font-size: 16px !important;
  display: inline-block !important;
  color: #333 !important;
  padding: 5px 10px !important;
  transition: color 0.3s ease !important;
  background-color:0.3s ease !important;
}


/* Filter List Styling */
.category-filter-list, .reference-filter-list, .taille-filter-list {
  list-style-type: none !important;
  padding: 0 !important;
  display: flex !important;
  flex-wrap: wrap !important;
}

.category-filter-list li, .reference-filter-list li, .taille-filter-list li {
  margin-right: 10px !important;
  margin-bottom: 10px !important;
}

/* Flex Settings for Full Window Display */
.flex-row {
  display: flex !important;
  flex-wrap: wrap !important;
}

/* Button Styling */
.apply-filter-btn-wrapper {
  text-align: center !important;
}

#apply-filters-btn {
  background-color: #ffcc00 !important;
  color: white !important;
  padding: 10px 20px !important;
  font-size: 16px !important;
  border: none !important;
  cursor: pointer !important;
  transition: background-color 0.3s ease !important;
}

#apply-filters-btn:hover {
  background-color: #333 !important;
}

/* Responsive Design */








</style>



@endsection
