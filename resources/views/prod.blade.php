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
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 filter-reference" data-filter=".sac">
                    Sacs
                </button>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 filter-reference" data-filter=".casquette">
                    Casquettes
                </button>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 filter-reference" data-filter=".accessoire">
                    Accessoires
                </button> 

            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
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
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sort By
                        </div>
                        <ul>
                            <li class="p-b-6">
                                <a href="/prod?sort=price_asc" class="filter-link stext-106 trans-04">
                                    Price: Low to High
                                </a>
                            </li>
                            <li class="p-b-6">
                                <a href="/prod?sort=price_desc" class="filter-link stext-106 trans-04">
                                    Price: High to Low
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>
                        <ul>
                            <li class="p-b-6">
                                <a href="/prod" class="filter-link stext-106 trans-04" data-price-min="0" data-price-max="0">
                                    All
                                </a>
                            </li>
                            <li class="p-b-6">
                                <a href="/prod?price_min=0&price_max=50" class="filter-link stext-106 trans-04">
                                    0.00 DT - 50.00 DT
                                </a>
                            </li>
                            <li class="p-b-6">
                                <a href="/prod?price_min=50&price_max=100" class="filter-link stext-106 trans-04">
                                    50.00 DT - 100.00 DT
                                </a>
                            </li>
                            <li class="p-b-6">
                                <a href="/prod?price_min=100&price_max=999999" class="filter-link stext-106 trans-04">
                                    100.00 DT +
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- Product Listings -->
        <div class="row isotope-grid">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ strtolower($product->Référence) }} {{ strtolower($product->Catégorie) }}" >
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <a href="{{ route('detail', $product->id) }}">
                                <img src="{{ asset('/' . $product->image1) }}" alt="IMG-PRODUCT">
                            </a>

                            <a href="{{ route('detail', $product->id) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
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



@endsection
