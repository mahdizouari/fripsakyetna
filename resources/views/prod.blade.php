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
                    Filter
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

                      <!-- Category Section -->
<!-- Filter for Desktop -->
<div class="filter-desktop d-none d-lg-block">
    <!-- Category Section -->
    <div class="filter-col1 p-r-15 p-b-27">
        <div class="mtext-102 cl2 p-b-15">Category</div>
        <ul>
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
        <ul>
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
        <div class="mtext-102 cl2 p-b-15">Taille</div>
        <ul>
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

<!-- Filter for Mobile -->
<div class="filter-mobile d-lg-none">
    <!-- Mobile Filter Toggle -->
    <button class="btn-show-filter">Show Filters</button>

    <div class="filter-mobile-content dis-none panel-filter w-full p-t-10">
        <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
            <!-- Category Section -->
            <div class="filter-col1 p-r-15 p-b-27">
                <div class="mtext-102 cl2 p-b-15">Category</div>
                <ul>
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
                <ul>
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
                <div class="mtext-102 cl2 p-b-15">Taille</div>
                <ul>
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
    </div>
</div>



                    </div>
             </div>

        <!-- JavaScript to Handle Filtering -->
        <script>
          let selectedCategory = '';
let selectedReference = '';
let selectedTaille = '';

document.querySelectorAll('.category-filter').forEach(function (el) {
    el.addEventListener('click', function (e) {
        e.preventDefault();
        selectedCategory = this.dataset.category;
        applyFilters();
    });
});

document.querySelectorAll('.reference-filter').forEach(function (el) {
    el.addEventListener('click', function (e) {
        e.preventDefault();
        selectedReference = this.dataset.reference;
        applyFilters();
    });
});

document.querySelectorAll('.taille-filter').forEach(function (el) {
    el.addEventListener('click', function (e) {
        e.preventDefault();
        selectedTaille = this.dataset.taille;
        applyFilters();
    });
});

function applyFilters() {
    // Check that all 3 parameters have been selected before filtering
    if (selectedCategory && selectedReference && selectedTaille) {
        let queryString = '?category=' + selectedCategory + '&reference=' + selectedReference + '&taille=' + selectedTaille;
        window.location.href = '/prod' + queryString;
    }
}
document.querySelector('.btn-show-filter').addEventListener('click', function() {
    document.querySelector('.filter-mobile-content').classList.toggle('dis-none');
});


        </script>
        <style>
            .filter-link.active {
    color: #ffffff;
    background-color: #333333;
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
                                <img src="{{ asset('/' . $product->image1) }}" alt="IMG-PRODUCT">
                            </a>

                            <a href="{{ route('detail', $product->id) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" 
                            style="background-color: yellow; color: black; text-decoration: none;"
                            onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                            onmouseout="this.style.backgroundColor='yellow'; this.style.color='black';">
                            Voir le produit
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
                                        <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
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
    .block2-pic img {
    width: 100%;
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
        max-width: 50%;
        flex: 0 0 50%; /* 2 items per row for smaller devices */
    }
}

</style>



@endsection
