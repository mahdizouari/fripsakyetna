@extends('layouts.base')

@section('content')

<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        @if ($products->isEmpty())
            <p class="text-center stext-101 cl2 p-t-20">
                Aucun produit trouvé.
            </p>
        @else
            <div class="row isotope-grid">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ strtolower($product->Catégorie) }}">
                        <div class="block2">
                        <div class="block2-pic hov-img0">
                                                <a href="{{ route('detail', $product->id) }}">
                                                    <img src="{{ asset('/' . $product->image1) }}" alt="IMG-PRODUCT">
                                                </a>


                                            </div>
                                            <div class="block2-txt flex-w flex-t p-t-14">
                                                <div class="block2-txt-child1 flex-col-l">
                                                <a href="#" class="sstext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{ $product->name }}
                                                </a>

                                                    <span class="stext-105 cl3">
                                                        {{ number_format($product->prix, 2) }} DT
                                                    </span>
                                                </div>
                                                <div class="block2-txt-child2 flex-r p-t-3">
                                                    <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="js-addwish-form">
                                                        @csrf
                                                        <button type="submit" class="btn-addwish-b2 dis-block pos-relative">
                                                            <img class="icon-heart1 dis-block trans-04" src="images/icons/heart.svg" alt="ICON">
                                                            
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

<style>
.btn-addwish-b2 {
    background: none;
    border: none;
    cursor: pointer;
    position: relative;

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
.sec-product {
    background-color: #f9f9f9;
    padding-top: 0px !important;
    padding-bottom: 50px;
}

.sec-product .container {
    max-width: 1200px;
    margin: 0 auto;
}

.sec-product .ltext-105 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 32px;
}

/* Tab Navigation */
.tab01 .nav-tabs {
    display: flex;
    justify-content: center;
    border-bottom: none;
}

.tab01 .nav-tabs .nav-item {
    margin-bottom: 10px;
}

.tab01 .nav-tabs .nav-link {
    color: #333;
    font-size: 16px;
    padding: 10px 20px;
    border: none;
    background-color: transparent;
    transition: color 0.3s ease;
}

.tab01 .nav-tabs .nav-link.active {
    color: #007bff;
    font-weight: bold;
}

.tab01 .nav-tabs .nav-link:hover {
    color: #0056b3;
}

/* Tab Content */
.tab-content {
    padding-top: 50px;
}

/* Product Slider */
.wrap-slick2 {
    position: relative;
}
</style>

