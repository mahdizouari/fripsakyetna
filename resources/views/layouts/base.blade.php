<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/main.js"></script>


	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'fripsakyetna ')</title>
	<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}"/>
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Preload Fonts -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Owl Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Slick Carousel -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<!-- Custom Vendor CSS -->
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- Icon Fonts -->
<link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">

<!-- Main Styles -->
<link rel="stylesheet" href="{{ asset('css/util.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">








<style>
	.btnc {
    border: none; /* No border */
    background: none; /* No background */
    color: #dc3545; /* Red color for the trash icon */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 1.5em; /* Adjust the size of the icon */
    padding: 2; /* No padding */
    display: inline-flex; /* Align icon properly */
    align-items: bottom; /* Center icon vertically */
}

.btn:hover {
    color: #c82333; /* Darker red for hover effect */
}


</style>
<!--checkout desgin-->
<style>
   .billing-container {
    max-width: 800px; /* Increased width */
    margin: 100px 300px; /* Center the container and reduce the margin */
    padding: 2.5rem; /* Increased padding for more space inside */
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}


    .billing-title {
        font-size: 24px;
        margin-bottom: 1.5rem;
        text-align: center;
        color: #333;
    }

    .billing-inputBox {
        margin-bottom: 1.5rem;
    }

    .billing-inputBox label {
        display: block;
        font-size: 14px;
        margin-bottom: 0.5rem;
        color: #555;
    }

    .billing-inputBox input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }

    .billing-inputBox input:focus {
        border-color: #5cb85c;
        outline: none;
    }

    .billing-flex {
        display: flex;
        gap: 1rem;
    }

    .billing-submit-btn {
        width: 100%;
        padding: 0.75rem;
        background: #5cb85c;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .billing-submit-btn:hover {
        background: #4cae4c;
    }

    @media (max-width: 768px) {
        .billing-container {
			margin: 120px auto;
            padding: 1.5rem;
            max-width: 80%;
        }

        .billing-flex {
            flex-direction: column;
        }

        .billing-submit-btn {
            font-size: 14px;
            padding: 0.65rem;
        }
    }
</style>
 <style>
                    .bg0 {
                    background-color:rgba(171, 172, 173, 0.83); /* or any color */
                    }

                    .m-t-23 {
                    margin-top: 23px;
                    }

                    .p-b-140 {
                    padding-bottom: 140px;
                    }
                </style>
<style>
        /* Custom CSS */
        .owl-carousel .item {
            display: flex;
            justify-content: center;
            margin: 10px;
            margin-bottom: 150px;
            padding: 10px;
        }
        .item img {
            max-width: 100%;
            height: auto;
        }
        
        .btn-view-all {
            display: block;
            width: 100%;
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            background-color: #000; /* Black background */
            color: white; /* White text */
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
        }

        .btn-view-all:hover {
            background-color: #333; /* Darker black for hover effect */
            text-decoration: none;
        }

    </style>


<style>
	/* panier style  */
	body {
    background: #ddd;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    font-family: sans-serif;
    font-size: 0.9rem;
    font-weight: bold;
    margin: 0;
    padding: 0;
}

.card {
    margin: 2rem auto 1rem auto; /* Reduced top margin to 2rem */
    max-width: 900px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
    background-color: #fff;
    padding: 2rem; /* Added padding for inner spacing */
}

@media (max-width: 768px) {
    .card {
        width: 95%; /* Increase width to fit smaller screens */
        padding: 1.5rem; /* Adjust padding for smaller screens */
        margin: 1.5rem auto; /* Reduce top margin for smaller screens */
    }
}

/* Media query for devices with a max width of 480px (phones) */
@media (max-width: 480px) {
    .card {
        width: 100%; /* Full width for very small screens */
        padding: 1rem; /* Adjust padding further for very small screens */
        margin: 1rem auto; /* Reduce top margin even more */
    }
}

.summary {
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 2rem;
    color: rgb(65, 65, 65);
}

@media(max-width: 767px) {
    .summary {
        border-top-right-radius: 0;
        border-bottom-left-radius: 1rem;
    }
}

.title {
    margin-bottom: 2vh;
}

.title h4 {
    font-size: 1.5rem;
}

.cart-item {
    padding: 1rem; /* Added padding for cart items */
}

.cart .col-2 img {
    width: 4rem; /* Increased image size */
}

.quantity-control {
    padding: 0 1vh;
    font-size: 1.2rem;
    text-decoration: none;
    color: black;
}

.quantity-display {
    padding: 0 1vh;
    font-size: 1.2rem;
    border: 1px solid rgba(0, 0, 0, 0.137);
    background-color: rgb(247, 247, 247);
}

.back-to-shop {
    margin-top: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.back-link {
    text-decoration: none;
    color: blue;
    font-size: 1.2rem;
}

.summary form select,
.summary form input {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    width: 100%;
    background-color: rgb(247, 247, 247);
}

.summary form input:focus::-webkit-input-placeholder {
    color: transparent;
}

.btn {
    background-color: #000;
    border-color: #000;
    color: white;
    width: 100%;
    font-size: 0.8rem;
    padding: -5rem;
    border-radius: 0.25rem; /* Added border radius */
}

.btn:focus {
    box-shadow: none;
    outline: none;
    color: black;
}

.btn:hover {
    color: white;
    background-color: #ddd;
}

.checkout-btn {
    background-color: #000;
    border-color: #000;
    color: white;
    font-size: 0.8rem;
}

@media(max-width: 767px) {
    .btn, .summary form select, .summary form input {
        font-size: 1rem;
		
    }
}

</style>

<style>
	.container {
    padding-top: 20px;
}

.table {
    margin-top: 20px;
}

.img-thumbnail {
    width: 80px;
    height: 80px;
    object-fit: cover;
}

.text-right {
    margin-top: 20px;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

</style>
<style>
    .logo-mobile {
    display: flex;
    justify-content: flex-start;
}

.logo-mobile a {
    text-decoration: red;
    color: #000;
    display: flex;
    align-items: center;
}

.logo-image {
    width: 50px;  /* Adjust the width to fit your design */
    height: auto;  /* Maintain aspect ratio */
    
}

.logo-text {
    font-size: 4rem;
    font-weight: bold;
	text-decoration: red;
}

/* Media query for smaller screens */
@media (max-width: 600px) {
    .logo-image {
        width: 40px;  /* Adjust the size for smaller screens */
    }

    .logo-text {
        font-size: 1.2rem;  /* Adjust the font size for smaller screens */
    }
}





</style>
<style>
	.nav-link {
    text-decoration: none; /* Remove underline */
    color: #000; /* Adjust color to match other links */
    font-size: 1rem; /* Match font size */
    padding: 0.5rem 1rem; /* Match padding */
    transition: color 0.3s ease; /* Smooth color transition */
}

.nav-link:hover {
    color: #0056b3; /* Adjust hover color to match other links */
}

.active-menu .nav-link {
    font-weight: bold; /* Match style for active menu item */
    color: #0056b3; /* Adjust color for active item */
}

</style>
<!--wishlist desgin-->
<style>
    .cart-wrap {
	padding: 40px 0;
	font-family: 'Open Sans', sans-serif;
}
.main-heading {
	font-size: 19px;
	margin-bottom: 20px;
}
.table-wishlist table {
    width: 100%;
}
.table-wishlist thead {
    border-bottom: 1px solid #e5e5e5;
    margin-bottom: 5px;
}
.table-wishlist thead tr th {
    padding: 8px 0 18px;
    color: #484848;
    font-size: 15px;
    font-weight: 400;
}
.table-wishlist tr td {
    padding: 25px 0;
    vertical-align: middle;
}
.table-wishlist tr td .img-product {
    width: 72px;
    float: left;
    margin-left: 8px;
    margin-right: 31px;
    line-height: 63px;
}
.table-wishlist tr td .img-product img {
	width: 100%;
}
.table-wishlist tr td .name-product {
    font-size: 15px;
    color: #484848;
    padding-top: 8px;
    line-height: 24px;
    width: 50%;
}
.table-wishlist tr td.price {
    font-weight: 600;
}
.table-wishlist tr td .quanlity {
    position: relative;
}
 .price-legdim {
            font-size: 1.2rem;
            color: #888;
            text-decoration: line-through;
        }

.total {
	font-size: 24px;
	font-weight: 600;
	color: #ffdd00; /* Updated to yellow */
}
.display-flex {
	display: flex;
}
.align-center {
	align-items: center;
}
.round-black-btn {
	border-radius: 25px;
    background: #ffdd00; /* Updated to yellow */
    color: #fff;
    padding: 5px 20px;
    display: inline-block;
    border: solid 2px #ffdd00; /* Updated to yellow */
    transition: all 0.5s ease-in-out 0s;
    cursor: pointer;
    font-size: 14px;
}
.round-black-btn:hover,
.round-black-btn:focus {
	background: transparent;
	color: #ffdd00; /* Updated to yellow */
	text-decoration: none;
}
.mb-10 {
    margin-bottom: 10px !important;
}
.mt-30 {
    margin-top: 30px !important;
}
.d-block {
    display: block;
}
.custom-form label {
    font-size: 14px;
    line-height: 14px;
}
.pretty.p-default {
    margin-bottom: 15px;
}
.pretty input:checked~.state.p-primary-o label:before, 
.pretty.p-toggle .state.p-primary-o label:before {
    border-color: #ffdd00; /* Updated to yellow */
}
.pretty.p-default:not(.p-fill) input:checked~.state.p-primary-o label:after {
    background-color: #ffdd00 !important; /* Updated to yellow */
}
.main-heading.border-b {
    border-bottom: solid 1px #ededed;
    padding-bottom: 15px;
    margin-bottom: 20px !important;
}
.custom-form .pretty .state label {
    padding-left: 6px;
}
.custom-form .pretty .state label:before {
    top: 1px;
}
.custom-form .pretty .state label:after {
    top: 1px;
}
.custom-form .form-control {
    font-size: 14px;
    height: 38px;
}
.custom-form .form-control:focus {
    box-shadow: none;
}
.custom-form textarea.form-control {
    height: auto;
}
.mt-40 {
    margin-top: 40px !important; 
}
.in-stock-box {
	background: #ffdd00; /* Updated to yellow */
	font-size: 12px;
	text-align: center;
	border-radius: 25px;
	padding: 4px 15px;
	display: inline-block;  
    color: #fff;
}
.trash-icon {
    font-size: 20px;
    color: #ffdd00; /* Updated to yellow */
}

</style>
<style>
/* Base pagination (desktop & up) */
.pagination-container{
  display:flex;
  justify-content:center;
}

/* Mobile ≤ 767 px */
@media (max-width:767px){
  .pagination-container{
    /* makes the list itself wrap onto a second line when needed */
    flex-wrap:wrap;             
    /* optional: add some air above/below the block */
    margin:1rem auto;
  }

  /* UL produced by Laravel’s paginator */
  .pagination{
    display:flex;
    flex-wrap:wrap;             /* 🔑 prevents horizontal scroll */
    gap:.4rem;                  /* slim gap keeps links touch‑friendly */
  }

  /* every <li> */
  .pagination > li{
    flex:0 0 auto;              /* don’t stretch */
  }

  /* the <a> / <span> inside */
  .pagination > li > a,
  .pagination > li > span{
    padding:.45rem .7rem;       /* slightly smaller pill */
    font-size:.9rem;            /* keeps numbers readable but compact */
    line-height:1;              /* trims vertical height */
  }

  /* hide long “previous / next” words on very narrow phones */
  @media (max-width:480px){
    .pagination .page-item:first-child  a::after, /* Prev */
    .pagination .page-item:last-child   a::after{ 
      content:"";               /* wipe text, keeps arrow icon if any */
    }
  }
}



</style>
<!-- Facebook Pixel Code -->

<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '678863848467066'); // Replace with your pixel ID
  fbq('track', 'PageView');
</script>
<noscript>
  <img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=678863848467066&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->


@if(request('query'))
<script>
  // Safely assign PHP query string to a JS variable
  const searchString = "{{ request('query') }}";

  // Fire Facebook Pixel Search event
  fbq('track', 'Search', {
    search_string: searchString
  });
</script>
@endif 




</head>

<body class="animsition">
	
	<!-- Header -->
	<header class="header-v2">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="/" class="logo">
						<img src="logo.svg" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="{{ Request::is('/') ? 'active-menu' : '' }}">
								<a href="/">Accueil</a>
							</li>

							<li class="{{ Request::is('prod') ? 'active-menu' : '' }}">
								<a href="{{ url('/prod') }}">Boutique</a>
							</li>

							<li class="{{ Request::is('panier') ? 'active-menu' : '' }}">
								<a href="{{ url('/panier') }}">Panier</a>
							</li>

							<li class="{{ Request::is('about') ? 'active-menu' : '' }}">
								<a href="{{ url('/about') }}">A propos</a>
							</li>
                            <li>
                            @auth
                                @if(auth()->user() && in_array(auth()->user()->email, ['yessin.zouari100@gmail.com', 'akrambahloul2@gmail.com']))
                                    <a href="{{ url('/mspace') }}" class="menu-item">My space </a>
                                @endif
                                    <li>
                                        <!-- Logout -->
                                        <a href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                        class="menu-item">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    
                                    </li>
                            @endauth
                            </li>
						</ul>


                        <!-- login for  clients is missing and under maintenance -->
                         
                        

						


					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						<div class="flex-c-m h-full p-r-24">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
								<i class="zmdi zmdi-search "></i>
							</div>
                            
                            
						</div>
							
						<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<a href="panier" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="{{ count(Session::get('productItems', [])) }}">
								<i class="zmdi zmdi-shopping-cart"></i>
							</a>
						</div>
						<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<a href="wishlist" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="{{ count(Session::get('wishlistItems', [])) }}">
								<i class="zmdi zmdi-favorite-outline"></i>
							</a>
						</div>




							
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
        <div class="wrap-header-mobile fixed top-0 left-0 w-full bg-white z-50 shadow-md flex items-center justify-between px-4 py-2">
            
            <!-- Logo mobile -->
            <div class="logo-mobile flex items-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('logo.svg') }}" alt="IMG-LOGO" class="logo-image w-[70px] h-[70px]">
                </a>
            </div>

            <!-- Icons Right -->
            <div class="wrap-icon-header flex items-center gap-6">
                <!-- Search -->
            <!-- Toggle Button with both icons -->
        <div class="icon-header-item cl2 hov-cl1 trans-04 cursor-pointer text-3xl" id="search-toggle">
            <i class="zmdi zmdi-search js-show-modal-search" id="search-icon"></i>
                <img src="{{asset('images/icons/icon-close2.png')}}" id="close-icon" class="hidden js-hide-modal-search" alt="Close" style="width: 24px; height: 24px; cursor: pointer;">
        </div>


        <script>
            // When search icon is clicked → show modal + toggle icons
        $('#toggle-search').on('click', function () {
            $('#search-icon').addClass('hidden');
            $('#close-icon').removeClass('hidden');
        });

        // When modal is closed (via close button or outside click)
        $('.js-hide-modal-search').on('click', function () {
            $('#search-icon').removeClass('hidden');
            $('#close-icon').addClass('hidden');
        });

        </script>

        <!-- Wishlist -->
        <a href="{{ route('wishlist') }}" class="icon-header-item cl2 hov-cl1 trans-04 icon-header-noti relative text-3xl" data-notify="{{ count(Session::get('wishlistItems', [])) }}">
            <i class="zmdi zmdi-favorite-outline"></i>
        </a>

        <!-- Cart -->
        <a href="panier" class="icon-header-item cl2 hov-cl1 trans-04 icon-header-noti relative text-3xl" data-notify="{{ count(Session::get('productItems', [])) }}">
            <i class="zmdi zmdi-shopping-cart"></i>
        </a>

        <!-- Hamburger Menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze ml-2" onclick="toggleMobileMenu()">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
</div>  


		<!-- Menu Mobile -->
		<div class="menu-mobile fixed top-16 left-0 w-full h-[calc(100vh-4rem)] bg-white z-40 overflow-auto hidden md:hidden">
        <ul class="main-menu-m flex flex-col space-y-4 p-4">
        <!-- Main Links -->
        <li>
            <a href="/" class="menu-item block px-2 py-2 hover:bg-gray-100 rounded">Accueil</a>
            <a href="{{ url('/prod') }}" class="menu-item block px-2 py-2 hover:bg-gray-100 rounded">Produits</a>
            <a href="{{ url('/panier') }}" class="menu-item block px-2 py-2 hover:bg-gray-100 rounded">Panier</a>
            <a href="{{ url('/about') }}" class="menu-item block px-2 py-2 hover:bg-gray-100 rounded">A propos</a>
        </li>

        <!-- Authentication Links -->
        <li>
            @auth
                @if(auth()->user() && in_array(auth()->user()->email, ['yessin.zouari100@gmail.com', 'akrambahloul2@gmail.com']))
                    <a href="{{ url('/mspace') }}" class="menu-item block px-2 py-2 hover:bg-gray-100 rounded">My space</a>
                @endif

                <!-- Logout -->
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="menu-item block px-2 py-2 hover:bg-gray-100 rounded">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @endauth
        </li>
    </ul>
</div>




		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <form class="wrap-search-header flex items-center justify-between p-l-15" action="{{ route('recherche') }}" method="GET">
                <input class="" type="text" name="query" placeholder="Recherche..." required>

                <!-- Search Button -->
                <button type="submit" class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search text-3xl"></i>
                </button>
                <!-- Older simple close button -->
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search" type="button" style="background: none; border: none; cursor: pointer;">
                    <img src="{{asset('images/icons/icon-close2.png')}}" alt="CLOSE" style="width: 24px; height: 24px;">
                </button>


            
            </form>
        </div>
    </div>



	</header>
    
    @yield('content')
	<!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="/" class="stext-102 cl2 hov-cl1 trans-04">
							Accueil
						</a>
					</li>

					<li class="p-b-13">
						<a href="wishlist" class="stext-102 cl2 hov-cl1 trans-04">
							Liste de souhaits
						</a>
					</li>

					<li class="p-b-13">
						<a href="/Aide_&_FAQs" class="stext-102 cl2 hov-cl1 trans-04">
                         Aide & FAQs
						</a>
					</li>
					
                  
                    
				</ul>

			</div>
		</div>
	</aside>
    <!-- Cart -->
	


</div>

	</div>
    <!-- Footer -->
     
<!-- Footer -->
<footer class="bg3 p-t-25 mt-12">
	<center>
    <div class="container text-center">
        <div class="row justify-content-center">
            
            <!-- Help Section -->
            <div class="col-sm-6 col-lg-3 p-b-10">
                <h4 class="stext-301 cl0 p-b-10">
                    Help
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="qui-somme-nous" class="stext-107 cl7 hov-cl1 trans-04">
                            Qui somme nous ?
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="livraison-echange" class="stext-107 cl7 hov-cl1 trans-04">
                            Livraison et Echange
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="politique-echange" class="stext-107 cl7 hov-cl1 trans-04">
                            Politique d'échange 
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="terms-conditions" class="stext-107 cl7 hov-cl1 trans-04">
                            Termes et Conditions
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="/Aide_&_FAQs" class="stext-107 cl7 hov-cl1 trans-04">
                            Aide & FAQs
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Get in Touch Section -->
            <div class="col-sm-6 col-lg-3   ">
                <h4 class="stext-301 cl0 p-b-10">
                    Entrer en contact
                </h4>
                <center>
                <p class="stext-107 cl7 size-201">
                    Avez-vous des questions ? Appelez nous :
                    <div>
                    <a href="tel:+21627715933" class="cl7 hov-cl1 trans-04 underline"> 
                        <i class="fa fa-phone"></i> 27715933
                    </a>
                    </div>
                </p>
                <h4 class="stext-107 cl7 size-201">
                    Service 24/7
                </h4>
                <li class="p-b-10">
                              
                                <a href="mailto:yessin.zouari100@gmail.com" class="stext-106  cl7 hov-cl1 trans-04 underline " >Fripsakyetna@gmail.com</a>

                            </li>

                </center>

                <div class="p-t-20 p-b-10">
                    <a href="https://www.facebook.com/sakiyetna" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <a href="https://www.instagram.com/frip_sakiyetna/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Payment Methods and Footer Text -->
        <div class="  text-center">
            <p class="stext-107 cl6 mb-2">
                &copy; <script>document.write(new Date().getFullYear());</script> Frip Sakyetna. Tous droits réservés.
            </p>
            <p class="stext-107 cl6">
                Développé par 
                <a href="https://www.linkedin.com/in/mahdi-zouari/" class="text-yellow-500 hover:underline" target="_blank">
                    Mehdi Zouari
                </a>
            </p>
        </div>

       
    </div>
	</center>
</footer>





	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



   
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	
<script>
  $(document).ready(function () {
    $('.parallax100').parallax100();
  });
</script>

	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>

<script>
  $(document).ready(function() { // Ensure DOM is ready
    $('.js-pscroll').each(function(){
      $(this).css('position','relative');
      $(this).css('overflow','hidden');
      var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
      });

      $(window).on('resize', function(){
        ps.update();
      });
    });
  });
</script>

	<script src="js/main.js"></script>
	<script>
    $(document).ready(function() {
        // Initialize Isotope
        var $grid = $('.isotope-grid').isotope({
            itemSelector: '.isotope-item',
            layoutMode: 'fitRows'
        });

        // Filter items on button click
        $('.filter-tope-group').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });

        // Change active class on buttons
        $('.filter-tope-group button').on('click', function() {
            $('.filter-tope-group button').removeClass('how-active1');
            $(this).addClass('how-active1');
        });
    });
</script>  

<script>
$(document).ready(function() {
    $('.filter-link').on('click', function(e) {
        e.preventDefault();

        var sort = $(this).data('sort') || '';
        var priceMin = $(this).data('price-min') || '';
        var priceMax = $(this).data('price-max') || '';

        $.ajax({
            url: '/prod',
            type: 'GET',
            data: {
                sort: sort,
                price_min: priceMin,
                price_max: priceMax
            },
            success: function(response) {
                $('#product-list').html(response);
            }
        });
    });
});
</script>



<!-- Bootstrap and Popper -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Slick Carousel -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Isotope -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

<!-- Moment.js & Daterangepicker -->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>

<!-- Parallax -->
<script src="vendor/parallax100/parallax100.js"></script>

<!-- Magnific Popup -->
<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>

<!-- Perfect Scrollbar -->
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!-- Animsition -->
<script src="vendor/animsition/js/animsition.min.js"></script>

<!-- Select2 -->
<script src="vendor/select2/select2.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- (or your old one) -->
<!-- <script src="vendor/sweetalert/sweetalert.min.js"></script> -->

<!-- Your Custom Scripts (include after dependencies) -->
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<script src="js/slick-custom.js"></script>
<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>




@yield('scripts')




		
</body>
</html>
    
<style>
						
								.product-info {
								text-align: center;
								margin-bottom: 20px;
							}

							.product-info h4 {
								font-size: 24px;
								margin-bottom: 10px; /* Adjust margin for spacing */
							}

							.product-info span {
								font-size: 20px;
								color: #333;
							}

							.product-details {
								padding-top: 20px;
								text-align: center;
							}

							.detail-item {
								display: flex;
								justify-content: center;
								align-items: center;
								margin-bottom: 15px; /* Adjust margin for spacing */
							}

							.detail-item .size-203 {
								font-weight: bold;
								margin-right: 10px; /* Space between label and value */
							}

							.detail-item .size-204 {
								color: #666;
							}

							.product-details button {
								margin-top: 10px; /* Space above the button */
								font-size: 16px; /* Adjust font size */
								padding: 10px 20px; /* Adjust padding for button size */
								align-items: center;
							}

							.social-wishlist {
								display: flex;
								justify-content: center;
								align-items: center;
								flex-wrap: wrap;
								margin-top: 30px; /* Space above social media icons */
							}

							.social-item {
								margin: 0 5px;
							}

							.social-item a {
								font-size: 16px;
								color: #333;
								transition: color 0.3s;
							}

							.social-item a:hover {
								color: #007bff;
							}
</style>
<style>
						/* Container for slick slider */
						.wrap-slick3 {
								position: relative;
							}

							/* Style for slick images */
							.slick-img {
								width: 40%; /* Adjust width as needed */
								height: auto; /* Maintain aspect ratio */
								border-radius: 8px; /* Rounded corners */
								box-shadow: 0 4px 8px rgba(0,0,0,0.2); /* Shadow effect */
							}


						/* Style for the zoom-in icon */
						.how-pos1 {
							display: flex;
							justify-content: center;
							align-items: center;
							width: 40px;
							height: 40px;
							border-radius: 50%;
							background-color: rgba(255,255,255,0.7);
							position: absolute;
							bottom: 10px;
							right: 10px;
							text-align: center;
							cursor: pointer;
							transition: background-color 0.3s;
						}

						.how-pos1:hover {
							background-color: rgba(255,255,255,1);
						}

						/* Custom styles for slider dots */
						.wrap-slick3-dots {
							position: absolute;
							bottom: 10px;
							left: 50%;
							transform: translateX(-50%);
						}
							.button-container {
							display: flex;
							justify-content: center; /* Center horizontally */
							align-items: center; /* Center vertically, if needed */
							width: 100%; /* Ensure the container takes the full width */
						}


						

						

</style>

<style>
							@media (max-width: 768px) {
								.wrap-slick3 {
									display: block;
								}
								.wrap-slick3-dots, .wrap-slick3-arrows {
									display: none;
								}
								.slick3 {
									margin-bottom: 20px;
								}
								.item-slick3 {
									margin-bottom: 20px;
								}
								.p-t-33 {
									padding-top: 20px;
								}

								.flex-w .size-203, .flex-w .size-204 {
									margin-bottom: 10px;
								}
								.flex-w .size-204 button {
									width: 100%;
								}
								.flex-m {
									flex-direction: row;
									flex-wrap: wrap;
								}
							}
								 
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipElements = document.querySelectorAll('.tooltip100[data-tooltip]');
        tooltipElements.forEach(el => {
            el.addEventListener('mouseover', function () {
                // Optional: Additional code to handle tooltip display
            });
        });
    });
</script>

<script>
	$(document).ready(function(){
    $('.slick3').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        adaptiveHeight: true
    });
});


</script>
<style> 

    .product-detail {
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        padding: 20px;
        margin: 20px;
        transition: transform 0.3s;
    }
    .product-detail:hover {
        transform: translateY(-5px);
    }
    .product-detail .btn {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        transition: background-color 0.3s, color 0.3s;
    }
    .product-detail .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>
<script>
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'html',
        transition: function(url){ window.location.href = url; }
    });
</script>
<script>
    $(document).ready(function() {
        // Handle wishlist button clicks
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();

            var $button = $(this);
            var productName = $button.parent().parent().find('.js-name-b2').text();

            // AJAX request to add item to wishlist
            $.ajax({
                url: $button.closest('form').attr('action'),
                method: 'POST',
                data: $button.closest('form').serialize(),
                success: function(response) {
                    // Show SweetAlert notification
                    Swal.fire({
                        title: productName,
                        text: "is added to wishlist!",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });

                    // Add class to indicate item is added
                    $button.addClass('js-addedwish-b2');
                    $button.off('click');
                },
                error: function(xhr) {
                    // Handle errors if needed
                    Swal.fire({
                        title: 'Error!',
                        text: "There was an issue adding the item to wishlist.",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        // Handle wishlist detail button clicks
        $('.js-addwish-detail').on('click', function(e) {
            e.preventDefault();

            var $button = $(this);
            var productName = $button.parent().parent().parent().find('.js-name-detail').text();

            // AJAX request to add item to wishlist
            $.ajax({
                url: $button.closest('form').attr('action'),
                method: 'POST',
                data: $button.closest('form').serialize(),
                success: function(response) {
                    // Show SweetAlert notification
                    Swal.fire({
                        title: productName,
                        text: "is added to wishlist!",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });

                    // Add class to indicate item is added
                    $button.addClass('js-addedwish-detail');
                    $button.off('click');
                },
                error: function(xhr) {
                    // Handle errors if needed
                    Swal.fire({
                        title: 'Error!',
                        text: "There was an issue adding the item to wishlist.",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        // Handle add to cart button clicks
        $('.js-addcart-detail').on('click', function(e) {
            e.preventDefault();

            var $button = $(this);
            var productName = $button.parent().parent().parent().parent().find('.js-name-detail').text();

            // Show SweetAlert notification
            Swal.fire({
                title: productName,
                text: "is added to cart!",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    });
</script>

<script>
	$(document).ready(function() {
    // Initialize Isotope
    var $grid = $('.isotope-grid').isotope({
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows'
    });

    // Filter items on link click
    $('.block1-txt').on('click', function(event) {
        event.preventDefault(); // Prevent default anchor behavior

        var filterValue = $(this).attr('data-filter');
        var filterUrl = $(this).attr('href');

        // Update URL with the filter
        window.location.href = filterUrl;

        // Filter items
        $grid.isotope({ filter: filterValue });

        // Change active class on links
        $('.block1-txt').removeClass('active');
        $(this).addClass('active');
    });
});

</script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                items: 3,  // Number of items to display at once
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayTimeout: 3000,  // Autoplay interval (3 seconds)
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2  // 2 items per line on phones
                    },
                    600: {
                        items: 2  // 2 items per line on tablets
                    },
                    768: {
                        items: 3  // 3 items per line on larger screens
                    }
                }
            });
        });
    </script>
     <script>
        $(document).ready(function() {
    // Filter by category
    $('.filter-category').click(function() {
        var filter = $(this).data('filter');
        $('.product-item').hide(); // Hide all products
        $(filter).show(); // Show products that match the category filter
    });

    // Filter by Référence
    $('.filter-reference').click(function() {
        var reference = $(this).data('filter');
        $('.product-item').hide(); // Hide all products
        $('.product-item').each(function() {
            if ($(this).data('reference') === reference) {
                $(this).show(); // Show products that match the Référence filter
            }
        });
    });
});

    </script>
    <script src="js/main.js"></script>
	<script>
    $(document).ready(function() {
        // Initialize Isotope
        var $grid = $('.isotope-grid').isotope({
            itemSelector: '.isotope-item',
            layoutMode: 'fitRows'
        });

        // Filter items on button click
        $('.filter-tope-group').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });

        // Change active class on buttons
        $('.filter-tope-group button').on('click', function() {
            $('.filter-tope-group button').removeClass('how-active1');
            $(this).addClass('how-active1');
        });
    });
    $(window).on('load', function () {
  $('.isotope-grid').isotope('layout');
});

</script>  

  




