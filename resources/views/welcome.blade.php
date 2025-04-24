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
                                <div class="container h-full" >
                                    <div class="flex-col-l-m h-full p-t-100 p-b-30">
                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                            <span class="ltext-202 cl2 respon2">
                                                {{ $slider->title  }}
                                            </span>
                                        </div>
                                        
                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                            <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon">
                                                {{ $slider->subtitle }}
                                            </h2>
                                        </div>
                                        
                                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn">
                                        <div style="display: flex; justify-content: center; margin-top: 20px;">
                                            <a href="prod" style="text-decoration: none;">
                                                <button class="button-fancy">
                                                    <p>Shop now  </p>
                                                </button>
                                            </a>
                                        </div>


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
                    <img src="cov2.PNG" alt="IMG-BANNER" loading="lazy">
                    <a href="prod" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                
                            </span>
                            <span class="block1-info stext-102 trans-04"></span>
                        </div>
                        <button class="cta">
                            <span class="hover-underline-animation"> Shop Now </span>
                            <svg
                                id="arrow-horizontal"
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="10"
                                viewBox="0 0 46 16">
                                <path
                                id="Path_10"
                                data-name="Path 10"
                                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                transform="translate(30)"
                                ></path>
                            </svg>
                        </button>

                    </a>
                </div>
            </div>

            <div class="size-202 m-lr-auto respon4">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="cov1.PNG" alt="IMG-BANNER" loading="lazy">
                    <a href="prod" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                
                            </span>
                            <span class="block1-info stext-102 trans-04"></span>
                        </div>
                        <button class="cta">
                            <span class="hover-underline-animation"> Shop Now </span>
                            <svg
                                id="arrow-horizontal"
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="10"
                                viewBox="0 0 46 16">
                                <path
                                id="Path_10"
                                data-name="Path 10"
                                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                transform="translate(30)"
                                ></path>
                            </svg>
                        </button>

                    </a>
                </div>
            </div>
                <style>

                .cta {
                border: none;
                background: none;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                gap: 10px;
                transition: all 0.3s ease;
                outline: none;
                }

                    .cta span {
                    padding-bottom: 5px;
                    letter-spacing: 3px;
                    font-size: 16px;
                    padding-right: 10px;
                    text-transform: uppercase;
                    font-family: 'Poppins', sans-serif;
                    color: #D4AF37;
                    transition: color 0.3s ease;
                    }

                    .cta svg {
                    transform: translateX(-8px);
                    transition: all 0.3s ease;
                    }

                    .cta:hover svg {
                    transform: translateX(0);
                    }

                    .cta:active svg {
                    transform: scale(0.9);
                    }

                    .hover-underline-animation {
                    position: relative;
                    padding-bottom: 5px;
                    }

                    .hover-underline-animation:after {
                    content: "";
                    position: absolute;
                    width: 100%;
                    transform: scaleX(0);
                    height: 2px;
                    bottom: 0;
                    left: 0;
                    background-color: #D4AF37;
                    transform-origin: bottom right;
                    transition: transform 0.3s ease-out;
                    }

                    .cta:hover .hover-underline-animation:after {
                    transform: scaleX(1);
                    transform-origin: bottom left;
                    }

                    .cta:hover span {
                    color: #FFD700;
                    }

                    .cta svg path {
                    fill: #D4AF37;
                    transition: fill 0.3s ease;
                    }

                    .cta:hover svg path {
                    fill: #FFD700;
                    }
                    
                </style>
            
            <div class="size-202 m-lr-auto respon4">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="cov3.PNG" alt="IMG-BANNER" loading="lazy">
                    <a href="prod" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                
                            </span>
                            <span class="block1-info stext-102 trans-04"></span>
                        </div>
                        <button class="cta">
                            <span class="hover-underline-animation"> Shop Now </span>
                            <svg
                                id="arrow-horizontal"
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="10"
                                viewBox="0 0 46 16">
                                <path
                                id="Path_10"
                                data-name="Path 10"
                                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                transform="translate(30)"
                                ></path>
                            </svg>
                        </button>

                    </a>
                </div>
            </div>
        </div>
    </div>
    <style>/* Banner Section */
.sec-banner {
    background-color: #f9f9f9;
    padding: 40px 0;
    text-align: center;
}

.size-202 {
    display: inline-block;
    width: 100%;
    max-width: 300px;
    margin: 15px;
    vertical-align: top;
}

.wrap-pic-w {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.wrap-pic-w img {
    width: 100%;
    height: auto;
    transition: transform 0.3s;
}

.wrap-pic-w:hover img {
    transform: scale(1.05);
}

.block1-txt {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 20px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    opacity: 0;
    transition: opacity 0.3s;
}

.wrap-pic-w:hover .block1-txt {
    opacity: 1;
}

.block1-txt-child1 {
    display: flex;
    flex-direction: column;
}

.block1-name {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.block1-info {
    font-size: 14px;
}

.block1-txt-child2 {
    align-self: flex-end;
}

.block1-link {
    font-size: 14px;
    background-color: #000000;
    padding: 10px 20px;
    border-radius: 5px;
    text-transform: uppercase;
    transition: background-color 0.3s;
}

.block1-link:hover {
    background-color: #FFFF;
    color: #000000 !important;
}
</style>

    <!-- Product -->
    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container" style="align-items: stretch">
        <div class="p-b-32">
            <h3 class="fancy-title">Store Overview</h3>
        </div>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');

                    .fancy-title {
                    font-family: 'Playfair Display', serif;
                    font-size: 40px;
                    font-weight: 700;
                    color: #D4AF37;
                    text-align: center;
                    letter-spacing: 1px;
                    margin-bottom: 25px;
                    position: relative;
                    }

                    .fancy-title::after {
                    content: "";
                    display: block;
                    width: 70px;
                    height: 3px;
                    background: linear-gradient(90deg, #D4AF37, #FFD700);
                    margin: 14px auto 0;
                    border-radius: 2px;
                    }


        </style>

            <!-- Tab01 -->
            <div class="tab01">


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
                                        <div class="block2" style="align-items: stretch">
                                            <div class="block2-pic hov-img0" loading="lazy">
                                                <a href="{{ route('detail', $product->id) }}">
                                                    <img src="{{ asset('/' . $product->image1) }}" alt="IMG-PRODUCT" loading="lazy">
                                                </a>


                                            </div>
                                            <div class="block2-txt flex-w flex-t p-t-14">
                                                <div class="block2-txt-child1 flex-col-l">
                                                <a href="{{ route('detail', $product->id) }}" class="sstext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
                                                            <img class="icon-heart1 dis-block trans-04" src="images/icons/heart.svg" alt="ICON" loading="lazy">
                                                            
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
                    

                   
   
	 
    <!-- Slider for sacs -->
   
    <div class="container" style="align-items: stretch">
    <div class="p-b-32">
        <h3 class="section-title">Sacs</h3>
    </div>

    <!-- Slider for sacs -->
    <div class="owl-carousel owl-theme sacs-slider">
        @php
            $filteredProducts = \App\Models\produits::where('is_active', 1)
                ->where('Référence', 'like', '%sac%')
                ->take(6)
                ->get();
        @endphp

        @foreach ($filteredProducts as $product)
            <div class="item">
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <a href="{{ route('detail', $product->id) }}">
                            <img src="{{ asset($product->image1) }}" alt="IMG-PRODUCT" loading="lazy">
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
                                    <img class="icon-heart1 dis-block trans-04" src="{{ asset('images/icons/heart.svg') }}" alt="ICON" loading="lazy">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Owl Carousel Initialization -->
<script>
    $(document).ready(function(){
        $('.sacs-slider').owlCarousel({
            loop:true,
            margin:15,
            nav:true,
            dots:false,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive:{
                0:{ items:1 },
                480:{ items:2 },
                768:{ items:3 },
                992:{ items:4 },
                1200:{ items:5 }
            }
        });
    });
</script>


   
    <div class="container">
    <div class="p-b-32">
        <h3 class="section-title">Casquettes & Chaussures</h3>
    </div>

    

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
                            <img src="{{ asset('/' . $product->image1) }}" alt="IMG-PRODUCT" loading="lazy">
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
                                        <img class="icon-heart1 dis-block trans-04" src="images/icons/heart.svg" alt="ICON" loading="lazy">
                                        
                                    </button>
                                </form>
                            </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
        </div>
            <!-- "Voir Plus" Button -->
            <div style="display: flex; justify-content: center; margin-top: 20px;">
                <a href="prod" >
                    <button class="button-fancy">
                        <p>Voir Plus</p>
                    </button>
                </a>
            </div>

           <style>
                     /* Based on Uiverse.io button - using your .button-fancy class */

                     /* From Uiverse.io by cssbuttons-io */ 
                /* From Uiverse.io by nikk7007 */ 
                .button-fancy {
                --color:rgb(0, 0, 0);
                padding: 0.8em 1.7em;
                background-color: transparent;
                border-radius: .3em;
                position: relative;
                overflow: hidden;
                cursor: pointer;
                transition: .5s;
                font-weight: 400;
                font-size: 17px;
                border: 1px solid;
                font-family: inherit;
                text-transform: uppercase;
                color: var(--color);
                z-index: 1;
                }

                .button-fancy::before, .button-fancy::after {
                content: '';
                display: block;
                width: 50px;
                height: 50px;
                transform: translate(-50%, -50%);
                position: absolute;
                border-radius: 50%;
                z-index: -1;
                background-color: var(--color);
                transition: 1s ease;
                }

                .button-fancy::before {
                top: -1em;
                left: -1em;
                }

                .button-fancy::after {
                left: calc(100% + 1em);
                top: calc(100% + 1em);
                }

                .button-fancy:hover::before, .button-fancy:hover::after {
                height: 410px;
                width: 410px;
                }

                .button-fancy:hover {
                color: rgb(255, 255, 255);
                }

                .button-fancy:active {
                filter: brightness(.8);
                }


           </style>

        </div>
    </div>
</div>

                </div>
            </div>
        </div>
        
    </section>


    <!-- Blog -->
    <!-- Additional content can be added here -->

            
    
    <div class="container" style="padding-bottom: 40px; ">
    <div class="p-b-32">
        <h3 class="section-title">Accessoires</h3>
    </div>
    <style>
        .section-title {
                font-size: 28px;
            font-weight: 600;
            color: #333333;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
            position: relative;
            }

            .section-title::after {
            content: "";
            display: block;
            width: auto;
            height: 3px;
            background-color:rgb(250, 212, 0);
            margin-top: 8px;
            }

    </style>

    <div class="owl-carousel owl-theme sacs-slider">
        @php
        $filteredProducts = \App\Models\produits::where('is_active', 1)
            ->where('Catégorie', 'accessoire')
            ->take(4)
            ->get();
        @endphp

        

        @foreach ($filteredProducts as $product)
            <div class="item">
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <a href="{{ route('detail', $product->id) }}">
                            <img src="{{ asset($product->image1) }}" alt="IMG-PRODUCT" loading="lazy">
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
                                    <img class="icon-heart1 dis-block trans-04" src="{{ asset('images/icons/heart.svg') }}" alt="ICON" loading="lazy">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>






   


       <!-- Blog -->
    <!-- Additional content can be added here -->



    <style>
                       /* Product Section */
                       .sec-product {
                                background-color: #f9f9f9;
                                padding-top: 0 !important;
                                padding-bottom: 50px;
                            }

                            .sec-product .container {
                                max-width: 1200px;
                                margin: 0 auto;
                                padding: 0 15px; /* Optional side padding for spacing */
                                box-sizing: border-box;
                            }

                            .sec-product .ltext-105 {
                                font-size: 24px;
                                font-weight: bold;
                                color: #333;
                                text-align: center;
                                margin-bottom: 32px;
                                word-wrap: break-word;   /* Allows breaking long words */
                                white-space: normal;     /* Forces line breaks */
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

                        .slick2 {
                            /* REMOVE these two lines */
                            /* display: flex; */
                            /* flex-wrap: wrap; */
                            gap: 30px; /* Keep if you want space between slides */
                            justify-content: center;
                        }


                        .item-slick2 {
                            padding: 15px; /* good spacing inside each item */
                            box-sizing: border-box;
                        }


                        .block2 {
                            background-color: #fff;
                            border: 1px solid #ddd;
                            border-radius: 10px;
                            overflow: hidden;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            transition: transform 0.3s, box-shadow 0.3s;
                            height: fit-content;

                        }

                        .block2:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                        }

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
                            background-color: yellow;
                            color: black;
                            padding: 10px 20px;
                            border-radius: 5px;
                            text-transform: uppercase;
                            text-decoration: none;
                            transition: background-color 0.3s, color 0.3s;
                        }

                        .block2-btn:hover {
                            background-color: black;
                            color: white;
                        }

                        /* Product Text */
                        .block2-txt {
                            text-align: center;
                            position: relative;
                            word-wrap: break-word;
                            white-space: normal;

                        }
                        

                        .block2-txt-child1 a {
                            font-size: 16px;
                            color: #333;
                            text-decoration: none;
                            transition: color 0.3s;
                            word-wrap: break-word;
                            text-decoration: none;white-space: normal;
                            
                        }

                        .block2-txt-child1 a:hover {
                            color:rgb(199, 171, 49);
                        }

                        .block2-txt-child1 .stext-105 {
                            font-size: 14px;
                            color: #dc3545;
                            margin-top: 10px;
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
                            width: 25px !important;
                            height: auto;
                            transition: opacity 0.3s;
                        }



                        .btn-addwish-b2:hover .icon-heart1 {
                            opacity: 1;
                        }

  
                        .block2-pic img {
                            width: 100%;
                            height: auto;
                        }

                        .block2 {
                            border: 1px solid #e6e6e6;
                            padding: 30px;
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
