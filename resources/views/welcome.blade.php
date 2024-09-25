@extends('layouts.base')

@section('title', 'Fripsakyetna')

@section('content')

    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1 rs1-slick1">
            <div class="slick1">
                @if($slider)
                    @foreach (['image1', 'image2', 'image3', 'image4'] as $image)
                        @if (!empty($slider->$image))
                            <div class="item-slick1" style="background-image: url('{{ asset('/' . $slider->$image) }}');">
                                <div class="container h-full">
                                    <div class="flex-col-l-m h-full p-t-100 p-b-30">
                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                            <span class="ltext-202 cl2 respon2">
                                                {{ $slider->title ?? 'Default Title' }}
                                            </span>
                                        </div>
                                        
                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                            <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                                {{ $slider->subtitle ?? 'Default Subtitle' }}
                                            </h2>
                                        </div>
                                        
                                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                        <a href="prod" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" 
                                            style="background-color: yellow; color: black; text-decoration: none;"
                                            onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                            onmouseout="this.style.backgroundColor='yellow'; this.style.color='black';">
                                            Shop Now
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p>No slider available.</p>
                @endif
            </div>
        </div>
    </section>

    <!-- Banner -->
    <div class="sec-banner bg0">
        <div class="flex-w flex-c-m">
            <div class="size-202 m-lr-auto respon4">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w filter-tope-group">
                    <img src="2.svg" alt="IMG-BANNER">
                    <a href="prod?filter=women" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3" data-filter=".femme">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                
                            </span>
                            <span class="block1-info stext-102 trans-04"></span>
                        </div>
                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="size-202 m-lr-auto respon4">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="1.svg" alt="IMG-BANNER">
                    <a href="prod" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                
                            </span>
                            <span class="block1-info stext-102 trans-04"></span>
                        </div>
                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="size-202 m-lr-auto respon4">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="3.svg" alt="IMG-BANNER">
                    <a href="prod" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                
                            </span>
                        </div>
                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Product -->
    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1">Store Overview</h3>
            </div>

            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Nos Produits</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-50">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                        <!-- Slide2 -->
                        <div class="wrap-slick2">
                            <div class="slick2">
                                @foreach ($products as $product)
                                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                        <!-- Block2 -->
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

                    <style>
                       
                            .sstext-104 {
                                .sstext-104 {
                                color: #333; /* Default text color */
                                text-decoration: none; /* Remove underline */
                                transition: color 0.3s ease; /* Smooth transition for color change */
                            }

                            .sstext-104:hover {
                                color: yellow; /* Change text color on hover */
                            }

                        }

                    </style>
   
	 
    <!-- Slider for sacs -->
   
    <div class="container">
        <div class="p-b-32">
            <h3 class="ltext-105 cl5 txt-left small-title">Sacs</h3>
        </div>

        <!-- Slider for sacs -->
        <div class="owl-carousel owl-theme">
            @php
                $filteredProducts = \App\Models\produits::where('is_active', 1)
                    ->where('Référence', 'like', '%sac%')
                    ->take(6)
                    ->get();
            @endphp

            @foreach ($filteredProducts as $product)
                <div class="item">
                    <!-- Block2 -->
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
                            <div class="block2-txt-child1 flex-col-l">
                                <a href="{{ route('detail', $product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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


   
    <div class="container">
    <div class="p-b-32">
        <h3 class="ltext-105 cl5 txt-left small-title">Casquettes & Chaussures</h3>
    </div>

    <style>
        .small-title {
            font-size: 1.5rem; /* Adjust the size as needed */
            text-align: left;
            position: relative;
            padding-bottom: 20px; /* Space for the line */
        }
        .small-title::after {
            content: "";
            display: block;
            width: 100px; /* Adjust the width of the line */
            height: 2px; /* Adjust the thickness of the line */
            background: linear-gradient(to right, 
                #000 20%, /* Thicker part */
                #000 40%, /* Ends of thicker part */
                transparent 40%, /* Thinner part starts */
                transparent 100% /* Continues to the end */
            );
            position: absolute;
            left: 0;
            bottom: 0;
        }
    </style>

    <div class="row">
    @php
        // Limiting the number of products to 4 and ensuring they are active
        $filteredProducts = \App\Models\produits::where('is_active', 1)
            ->where(function($query) {
                $query->where('name', 'like', '%casquette%')
                    ->orWhere('name', 'like', '%chaussure%')
                    ->orWhere('Référence', 'like', '%casquette%')
                    ->orWhere('Référence', 'like', '%chaussure%');
            })
            ->take(4) // Limit to 4 products
            ->get();
    @endphp


        @foreach ($filteredProducts as $product)
            <div class="col-6 col-md-3 p-b-30">
                <!-- Block2 -->
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
                        <div class="block2-txt-child1 flex-col-l">
                            <a href="{{ route('detail', $product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $product->name }}
                            </a>
                            <span class="stext-105 cl3">
                                {{ number_format($product->prix, 2) }} DT
                            </span>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
        </div>
            <!-- "Voir Plus" Button -->
            <a href="prod" class="flex-c-m stext-101 cl0 size-101 bg3 bor1 hov-btn1 p-lr-15 trans-04" 
            style="background-color: yellow; color: black; text-decoration: none;"
            onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
            onmouseout="this.style.backgroundColor='yellow'; this.style.color='black';">
            Voir Plus
            </a>

        </div>
    </div>
</div>

                </div>
            </div>
        </div>
        
    </section>


    <!-- Blog -->
    <!-- Additional content can be added here -->

            
    
    <div class="container">
    <div class="p-b-32">
        <h3 class="ltext-105 cl5 txt-left small-title">Accessoires</h3>
    </div>

    <!-- Slider for accessoires -->
    <div class="owl-carousel owl-theme">
        @php
            $filteredProducts = \App\Models\produits::where('is_active', 1)
                ->where('Référence', 'like', '%accessoire%')
                ->take(6)
                ->get();
        @endphp

        @foreach ($filteredProducts as $product)
            <div class="item">
                <!-- Block2 -->
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
                        <div class="block2-txt-child1 flex-col-l">
                            <a href="{{ route('detail', $product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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





   


       <!-- Blog -->
    <!-- Additional content can be added here -->


//

    
@endsection
