@extends('layouts.base')

@section('title', 'Frip')

@section('content')

<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
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

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filtrer
                </div>

               
            </div>
            
            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>  
            </div>

            <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">

                   

                 <!-- Filter for Mobile -->
                <div class="filter-mobile d-lg-none">
                    <!-- Mobile Filter Toggle -->

                    <div class="filter-mobile-content dis-none panel-filter w-full p-t-10">
                        <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                            <!-- Category Section -->
                            <div class="filter-col1 p-r-15 p-b-27">
                                <div class="mtext-102 cl2 p-b-15">Category</div>
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
                                <div class="mtext-102 cl2 p-b-15">Reference</div>
                                <ul class="reference-filter-list flex-row">
                                    @foreach(['sac', 'chaussure', 'casquette'] as $reference)
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

                    <!-- Apply Filters Button -->
                    <div class="apply-filter-btn-wrapper text-center p-t-20">
                            <button class="filter-button apply-filters" id="apply-filters-btn">Apply Filters</button>
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
        <div class="row isotope-grid">
            @foreach ($products as $product)
                <div class="col-4 col-md-3 p-b-30 isotope-item {{ strtolower($product->Référence) }} {{ strtolower($product->Catégorie) }}" >
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <a href="{{ route('detail', $product->id) }}">
                                <img src="{{ asset('/' . $product->image1) }}" alt="IMG-PRODUCT" loading="lazy">
                            </a>


                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{ route('detail', $product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $product->name }}
                                </a>
                                <span class="stext-105 cl3">
                                    {{ number_format($product->prix, 2) }}DT
                                </span>
                            </div>
                            <div class="block2-txt-child2 flex-r p-t-3">
                                <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="js-addwish-form">
                                    @csrf
                                    <button type="submit" class="btn-addwish-b2 dis-block pos-relative">
                                                            <img class="icon-heart1 dis-block trans-04" src="images/icons/heart.svg" alt="ICON" loading="lazy">
                                                            
                                                        </button>
                                </form>
                            </div>
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
<style>
 /* Product Grid */
.isotope-grid {
    display: flex !important;
    flex-wrap: wrap !important;
    gap: 30px !important;
    justify-content: center !important;
}

.isotope-item {
    flex: 1 1 calc(25% - 30px) !important;
    max-width: calc(25% - 30px) !important;
    box-sizing: border-box !important;

}

/* Product Card */
.block2 {
    background-color: #fff !important;
    border: 1px solid #ddd !important;
    border-radius: 10px !important;
    overflow: hidden !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important;
    transition: transform 0.3s, box-shadow 0.3s !important;
}

.block2:hover {
    transform: translateY(-5px) !important;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2) !important;
}

/* Product Image */
.block2-pic {
    position: relative !important;
    overflow: hidden !important;
}

.block2-pic img {
    width: 100% !important;
    height: auto !important;
    transition: transform 0.3s !important;
}

.block2-pic:hover img {
    transform: scale(1.05) !important;
}

.block2-btn {
    position: absolute !important;
    bottom: 10px !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    background-color: yellow !important;
    color: black !important;
    padding: 10px 20px !important;
    border-radius: 5px !important;
    text-transform: uppercase !important;
    text-decoration: none !important;
    transition: background-color 0.3s, color 0.3s !important;
}

.block2-btn:hover {
    background-color: black !important;
    color: white !important;
}

/* Product Text */
.block2-txt {
    padding: 15px !important;
    text-align: center !important;
}

.block2-txt-child1 a {
    font-size: 16px !important;
    color: #333 !important;
    text-decoration: none !important;
    transition: color 0.3s !important;
}

.block2-txt-child1 a:hover {
    color: yellow !important;
}

.block2-txt-child1 .stext-105 {
    font-size: 14px !important;
    color: #dc3545 !important;
    margin-top: 5px !important;
    display: block !important;
}

/* Wishlist Button */
.btn-addwish-b2 {
    background: none !important;
    border: none !important;
    cursor: pointer !important;
    position: relative !important;
}

.btn-addwish-b2 .icon-heart1 {
    opacity: 0.3;
    padding-top: 2em;
    width: 25px !important;
    height: auto;
    transition: opacity 0.3s;
}



.btn-addwish-b2:hover .icon-heart1 {
    opacity: 1;
}




/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    .isotope-item {
        flex: 1 1 calc(50% - 30px) !important;
        max-width: calc(50% - 30px) !important;
    }
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
