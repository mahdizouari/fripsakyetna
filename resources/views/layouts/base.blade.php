<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'fripsakyetna ')</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	


<!-- Include Isotope Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    margin: auto;
    max-width: 900px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
    background-color: #fff;
    padding: 2rem; /* Added padding for inner spacing */
}

@media(max-width: 767px) {
    .card {
        margin: 3vh auto;
        width: 95%;
    }
}

.cart {
    padding: 2rem; /* Reduced padding for mobile */
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
}

@media(max-width: 767px) {
    .cart {
        padding: 1.5rem;
        border-bottom-left-radius: 0;
        border-top-right-radius: 1rem;
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
    padding: 1rem;
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
	text-decoration-color:color: #ddd; /* Slight hover effect */
}

.checkout-btn {
    background-color: #000;
    border-color: #000;
    color: white;
    font-size: 0.8rem;
}

@media(max-width: 767px) {
    .btn, .summary form select, .summary form input {
        font-size: 0.8rem;
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
    align-items: center;
    padding: 10px 0;
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
    margin-right: 100px;  /* Space between image and text */
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
						<img src="logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="/">Accueil</a>
								
							</li>

							<li>
								<a href="{{url('/prod')}}">Boutique</a>
							</li>

							
							<li>
								<a href="{{url('/panier')}}">Panier </a>
							</li>

	
							<li>
								<a href="{{url('/about')}}">A propos</a>
							</li>

							
							@auth
								@if(auth()->user() && in_array(auth()->user()->email, ['yessin.zouari100@gmail.com', 'akrambahloul2@gmail.com']))
									<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
								@endif


								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
									@csrf
								</form>
							@else
								<a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

								@if (Route::has('register'))
									<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
								@endif
							@endauth

						</ul>
						


					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						<div class="flex-c-m h-full p-r-24">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
								<i class="zmdi zmdi-search"></i>
							</div>
						</div>
							
						<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
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
					<img src="logo.png" alt="IMG-LOGO" class="logo-image">
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

				<div class="flex-c-m h-full p-lr-10 bor5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="0">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
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
				<li>
					<a href="/">Accueil</a>
					
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="{{url('/prod')}}" class="label1 rs1" data-label1="hot">Produits</a>
				</li>
				
			
				<li>

			
				<li>
					<a href="{{url('/panier')}}">Panier </a>
				</li>


				<li>
					<a href="{{url('/about')}}">about</a>
				</li>
				
				

					
				<li >
					
					@auth
								@if(auth()->user() && in_array(auth()->user()->email, ['yessin.zouari100@gmail.com', 'akrambahloul2@gmail.com']))
									<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
								@endif


								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
									@csrf
								</form>
							@else
								<a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

								@if (Route::has('register'))
									<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
								@endif
							@endauth
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
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
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							My Wishlist
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
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
    <div class="container">
        <div class="row">
            
            <!-- Help Section -->
            <div class="col-sm-6 col-lg-3 p-b-20">
                <h4 class="stext-301 cl0 p-b-30">
                    Help
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Track Order
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Returns
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Shipping
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Get in Touch Section -->
            <div class="col-sm-6 col-lg-3 p-b-20">
                <h4 class="stext-301 cl0 p-b-30">
                    GET IN TOUCH
                </h4>

                <p class="stext-107 cl7 size-201">
                    Any questions? Let us know in store at //////
                </p>

                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
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

<style>
	/* Footer Styles */
footer {
    background-color: #f8f9fa;
    padding-top: 75px;
    padding-bottom: 32px;
}

footer .container {
    max-width: 1140px;
    margin: auto;
}

/* Responsive Columns */
@media (max-width: 767px) {
    footer .row {
        display: block;
    }

    footer .col-sm-6 {
        margin-bottom: 30px;
    }

    footer .p-t-40 {
        text-align: center;
    }

    footer .flex-c-m {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    footer .fs-18 {
        font-size: 1.2rem;
        margin: 0 0.5rem;
    }
}

footer h4 {
    font-size: 1.5rem;
    color: #333;
}

footer .stext-107 {
    font-size: 1rem;
}

footer .stext-301 {
    font-size: 1.2rem;
    margin-bottom: 15px;
}

footer .size-201 {
    font-size: 0.875rem;
}

footer .txt-center {
    text-align: center;
}

footer .stext-107 a {
    text-decoration: none;
    color: #6c757d;
    transition: color 0.3s;
}

footer .stext-107 a:hover {
    color: #007bff;
}

footer .p-t-27 a {
    margin-right: 15px;
}

footer .p-b-10 {
    margin-bottom: 10px;
}

footer .m-all-1 img {
    max-width: 100px;
    margin: 0 5px;
}

footer .p-t-40 {
    padding-top: 40px;
}

</style>



	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	


<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
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
			})
		});
	</script>
<!--===============================================================================================-->
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


						.slick-dots li button:before {
							font-size: 10px;
							color: #fff; /* Dot color */
						}

						.slick-dots li.slick-active button:before {
							color: #007bff; /* Active dot color */
						}

						/* Custom styles for slider arrows */
						.wrap-slick3-arrows {
							position: absolute;
							top: 50%;
							width: 100%;
							display: flex;
							justify-content: space-between;
							transform: translateY(-50%);
						}

						.slick-prev, .slick-next {
							width: 30px;
							height: 30px;
							border-radius: 50%;
							background-color: rgba(0,0,0,0.5);
							color: #fff;
							font-size: 18px;
							line-height: 30px;
							text-align: center;
							cursor: pointer;
						}

						.slick-prev:hover, .slick-next:hover {
							background-color: rgba(0,0,0,0.8);
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
								.flex-w {
									flex-direction: column;
									align-items: flex-start;
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

