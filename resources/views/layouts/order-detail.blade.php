<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'fripsakyetna ')</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<!--===============================================================================================-->	
	<!-- Favicon -->
<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}"/>

<!-- CSS Links -->
<link rel="stylesheet" href="{{ asset('/css/util.css') }}">
<link rel="stylesheet" href="{{ asset('/css/main.css') }}">
<link rel="icon" type="image/png" href="{{ asset('/images/icons/favicon.png') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animate/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/css-hamburgers/hamburgers.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animsition/css/animsition.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/MagnificPopup/magnific-popup.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>





</head>
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
								<i class="zmdi zmdi-search"></i>
							</div>
						</div>
							
						<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<a href="/panier" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="{{ count(Session::get('productItems', [])) }}">
								<i class="zmdi zmdi-shopping-cart"></i>
							</a>
						</div>
						<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<a href="/wishlist" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="{{ count(Session::get('wishlistItems', [])) }}">
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
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="/">
					<img src="/detail/logo.svg" alt="IMG-LOGO" class="logo-image" style="width: 85px; height: 85px;">
					<span class="logo-text"> </span>
				</a>
			</div>


			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-10">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>
				</div>
				<!-- Notification Container -->


				<!-- Wishlist Icon -->
				<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
					<a href="/wishlist" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="{{ count(Session::get('wishlistItems', [])) }}">
						<i class="zmdi zmdi-favorite-outline"></i>
					</a>
				</div>


				<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<a href="/panier" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="{{ count(Session::get('productItems', [])) }}">
								<i class="zmdi zmdi-shopping-cart"></i>
							</a>
				</div>

			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
    <ul class="main-menu-m">
        <!-- Main Links -->
        <li>
            <a href="/" class="menu-item">Accueil</a>
            <a href="{{ url('/prod') }}" class="menu-item">Produits</a>
            <a href="{{ url('/panier') }}" class="menu-item">Panier</a>
            <a href="{{ url('/about') }}" class="menu-item">A propos</a>



        </li>
       

        <!-- Authentication Links -->
        <li>
            @auth
                @if(auth()->user() && in_array(auth()->user()->email, ['yessin.zouari100@gmail.com', 'akrambahloul2@gmail.com']))
                    <a href="{{ url('/mspace') }}" class="menu-item">My space</a>
                @endif

                <!-- Logout -->
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="menu-item">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            
               
            @endauth
        </li>
    </ul>
    <!-- Footer with attribution -->
    <span class="mtext-101 cl5 footer-text">
        Develpped by <a href="https://www.facebook.com/profile.php?id=100009832151933">@Mehdi Zouari</a>
    </span>
</div>


		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="/images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15" action="{{ route('recherche') }}" method="GET">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Recherche..." required>
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
							Home
						</a>
					</li>

					<li class="p-b-13">
						<a href="/wishlist" class="stext-102 cl2 hov-cl1 trans-04">
							My Wishlist
						</a>
					</li>

					<li class="p-b-13">
						<a href="/Aide_&_FAQs" class="stext-102 cl2 hov-cl1 trans-04">
							Help & FAQs
						</a>
					</li>
					<span class="mtext-101 cl5">
						@ Frip Sakyetna
					</span>
				</ul>

			</div>
		</div>
	</aside>
    <!-- Cart -->
	


</div>

	</div>
    <!-- Footer -->
     
<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
	<center>
    <div class="container text-center">
        <div class="row justify-content-center">
            
            <!-- Help Section -->
            <div class="col-sm-6 col-lg-3 p-b-20">
                <h4 class="stext-301 cl0 p-b-30">
                    Help
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="/qui-somme-nous" class="stext-107 cl7 hov-cl1 trans-04">
                            Qui somme nous 
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="/livraison-echange" class="stext-107 cl7 hov-cl1 trans-04">
                            Livraison et Echange
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="/politique-echange" class="stext-107 cl7 hov-cl1 trans-04">
                            Politique d'échange 
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="/terms-conditions" class="stext-107 cl7 hov-cl1 trans-04">
                            Terms et Conditions 
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Get in Touch Section -->
            <div class="col-sm-6 col-lg-3 p-b-20">
                <h4 class="stext-301 cl0 p-b-30">
                    GET IN TOUCH
                </h4>
                <center>
                <p class="stext-107 cl7 size-201">
                    Avez-vous des questions ? Appelez nous :
                    <div>
                    <a href="tel:+27715933" class="cl7 hov-cl1 trans-04">
                        <i class="fa fa-phone"></i> 27715933
                    </a>
                    </div>
                </p>
                <h4 class="stext-107 cl7 size-201">
                    Service 24/7
                </h4>
                </center>

                <div class="p-t-27">
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
        <div class="p-t-40">
            <p class="stext-107 cl6 txt-center">
                &copy; <script>document.write(new Date().getFullYear());</script> Frip Sakyetna. All rights reserved.
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
	</div><script>
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipElements = document.querySelectorAll('.tooltip100[data-tooltip]');
        tooltipElements.forEach(el => {
            el.addEventListener('mouseover', function () {
                // Optional: Additional code to handle tooltip display
            });
        });
    });
</script>




