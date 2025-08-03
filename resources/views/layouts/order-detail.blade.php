<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src={{asset('vendor/jquery/jquery-3.2.1.min.js')}}></script>


	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'fripsakyetna ')</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="js/main.js"></script>
    <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>


    
    




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


<!-- Owl Carousel JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
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

@if(isset($product))
<script>
  fbq('track', 'ViewContent', {
    content_name: '{{ $product->name }}',
    content_ids: ['{{ $product->id }}'],
    content_type: 'product'
  });
</script>
@endif

@section('scripts')
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


@endsection






    <style>
        body {
    background-color:rgb(255, 255, 255); /* Light grey */
    
}

        /* Product Configuration */
        .product-configuration {
            display: flex;
            flex-direction: column;
            gap: 15px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Product Size */
        .product-size,
        .product-category {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .product-size span,
        .product-category span {
            font-weight: bold;
            color: #333;
        }

        .product-size h4,
        .category-choose {
            font-size: 16px;
            color: #555;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .product-configuration {
                padding: 15px;
            }

            .product-size span,
            .product-category span {
                font-size: 14px;
            }

            .product-size h4,
            .category-choose {
                font-size: 14px;
            }
        }

        /* General Container */
       .container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    background-color: #f9f9f9;
    border-radius: 30px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* subtle shadow */
    margin-bottom: 20px;
}

        /* Slider Wrapper */

            .slider_wrap {
                max-width: 350px;
                margin: 50px auto;
                padding: 0 10px;
            }

            .product-slider .item img {
                width: 100%;
                height: auto;
                border-radius: 8px;
            }

        /* Thumbnails */
        .product-thumbs {
            margin-top: 15px;
        }

        .product-thumbs .thumb-item img {
            width: 100px;
            height: auto;
            cursor: pointer;
            border-radius: 6px;
            border: 2px solid transparent;
            transition: border-color 0.3s ease;
        }

        .product-thumbs .owl-item.current img {
            border-color: #ff6600;
        }

        /* Global Owl image styling */
        .owl-carousel .item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .owl-carousel img {
            width: 100%;
            height: auto;
            display: flex;
        }





        /* Custom Navigation */
        .custom-nav {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            
        }

        .custom-nav button {
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            background-color: #333;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .custom-nav button:hover {
            background-color: #555;
        }

        /* Product Description */
      .product-description h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;

    width: 300px;                /* ✅ limit width to 100px */
    word-wrap: break-word;       /* breaks long words */
    white-space: normal;         /* allows wrapping */
    overflow-wrap: break-word;   /* ensures consistent breaking */
}



        .product-description p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .review-stars {
            display: flex;
            align-items: center;
        }

        .review-stars .star {
            color: #FFD700;
            /* Gold color for filled stars */
            margin-right: 5px;
        }

        .review-stars .star.filled {
            color: #FFD700;
        }

        .review-stars .rating-text {
            font-size: 16px;
            margin-left: 10px;
        }

        .available {
            color: green;
            font-weight: bold;
        }

        /* Product Configuration */
        .product-configuration {
            display: flex;
            flex-direction: column;
        }

        .product-color,
        .cable-config {
            margin-bottom: 10px;
        }

        .product-color span,
        .cable-config span {
            font-weight: bold;
        }

        .product-color h4,
        .cable-choose {
            font-size: 16px;
            margin-top: 5px;
        }

        /* Product Pricing */
        .product-price {
            background-color: #fff;
            padding: 2rem;
            margin: 2rem auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            max-width: 600px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .price-container {
            margin-bottom: 1rem;
        }

        .price {
            font-size: 1.5rem;
            color: #dc3545;
            margin-right: 1rem;
        }

        .price-legdim {
            font-size: 1.2rem;
            color: #888;
            text-decoration: line-through;
        }

        /* Button Container */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        /* Wishlist and Cart Buttons */
        .wishlist-btn,
        .cart-btn {
            padding: 0.6em 2em;
            border: none;
            outline: none;
            color: rgb(255, 255, 255);
            background: #111;
            cursor: pointer;
            position: relative;
            z-index: 1;
            border-radius: 10px;
            user-select: none;
            touch-action: manipulation;
            transition: background 0.3s, transform 0.3s;
        }

        .wishlist-btn:hover,
        .cart-btn:hover {
            background: #333;
            transform: scale(1.05);
        }

        .wishlist-btn:before,
        .cart-btn:before {
            content: "";
            background: linear-gradient(45deg,
                    #ff0000,
                    #ff7300,
                    #fffb00,
                    #48ff00,
                    #00ffd5,
                    #002bff,
                    #7a00ff,
                    #ffd342ff,
                    #ff0000);
            position: absolute;
            top: -2px;
            left: -2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowing-button 20s linear infinite;
            transition: opacity 0.3s ease-in-out;
            border-radius: 10px;
        }

        @keyframes glowing-button {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 400% 0;
            }

            100% {
                background-position: 0 0;
            }
        }

        .wishlist-btn:after,
        .cart-btn:after {
            z-index: -1;
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: #222;
            left: 0;
            top: 0;
            border-radius: 10px;
        }

        /* Return Links */
        .return-links {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .return-btn {
            display: inline-block;
            padding: 0.5rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .return-btn:hover {
            background-color: #555;
        }

        .return-logo {
            width: 24px;
            height: 24px;
        }

        /* Media Queries for Responsiveness */

        /* Info Boxes Container */
        /* ============  CONTAINER  ============ */
.info-boxes {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  max-width: 1200px;
  margin: 60px auto;          /* top/bottom space + horizontal centering */
  justify-items: center;      /* center each card in its grid cell */
  gap: 50px 40px;             /* row-gap (50px) and column-gap (40px) */
  padding: 20px;
  box-sizing: border-box;
}

.info-box {
  margin: 0;                  /* remove any default spacing */
  width: 100%;                /* ensure consistent sizing */
  max-width: 300px;           /* optional: limit card width */
  padding: 30px;
  border-radius: 12px;
  background-color: #e0e0e0;
  display: flex;
  align-items: flex-start;
  gap: 20px;
  box-shadow:
    0 4px 12px rgba(0,0,0,0.06),
    0 16px 32px rgba(0,0,0,0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
   opacity: 0;
  transform: translateY(40px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.info-box:hover {
  transform: translateY(-6px);
  box-shadow:
    0 10px 25px rgba(0, 0, 0, 0.15),
    0 20px 45px rgba(0, 0, 0, 0.1);
}
.info-box.reveal {
  opacity: 1;
  transform: none;
}



@media (max-width: 768px) {
  .info-boxes {
    gap:60px 48px;                     /* a touch more breathing room */
    padding: 40px 24px;
    margin: 0 auto;                /* center the whole container */
    justify-content: center;      /* ensure grid is centered */
  }

  .info-box {
    padding: 28px;
    gap: 20px;
    margin: 0 auto;                /* center each card if needed */
  }

  
}

@media (max-width: 480px) {
  .info-boxes {
    padding: 30px 16px;
    margin: 0 auto;                /* center the container */
    justify-content: center;
  }

  .info-box {
    padding: 30px;
    gap: 16px;
    margin: 0 auto;                /* center each card */
  }

  
}




/* ============  DARK MODE (optional)  ============ */
@media (prefers-color-scheme: dark) {
  .info-boxes {
    background:rgb(255, 255, 255); /* light grey */
    max-width: 1200px;
    margin: 0 auto;      /* center */
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 40px;
    padding: 40px 20px;
    box-sizing: border-box;
  }
  .info-box {
    background:rgb(255, 255, 255); /* lighter grey */
    border-radius: 12px;
    padding: 24px;
    display: flex;
    align-items: flex-start;
    gap: 16px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05),
      0 10px 20px rgba(202, 199, 199, 0.7);
    transition: box-shadow 0.3s ease, transform 0.3s ease;
  }
 .info-content h3 {
  font-size: 20px;
  font-weight: bold;
  margin: 0 0 10px;
  color:rgb(197 181 7);
  text-align: center;
}

.info-content p {
  font-size: 15px;
  line-height: 1.5;
  color: rgba(71, 71, 71, 0.53);
  margin: 0;
  text-align: center;
}
.info-content {
  text-align: center;           /* center title + paragraph */
  display: flex;
  flex-direction: column;
  align-items: center;         /* center content horizontally */
  justify-content: center;
}




  
}

/* ====  CUSTOMISABLE DESIGN TOKENS  ==== */
:root {
  --card-w: 290px; /* card width */
  --card-h: 150px; /* card height */
  --blob-size: 160px; /* ⌀ of blobs */
  --blob-1: #ff5b00; /* main blob */
  --blob-2:rgb(75, 10, 173); /* 2nd blob */
}


/* ====  CARD  ===================================================== */
.card{
  position:relative;
  background-color: #000 important!;
  height:var(--card-h);
  border-radius:18px;
  overflow:hidden;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
  background:radial-gradient(circle at 30% 30%,#ffffff88 0%,#ffffff05 80%);
  box-shadow:
      0 6px 12px rgb(73, 64, 64),
      0 16px 40px rgba(190, 185, 185, 0.84);
  transition:transform .45s cubic-bezier(.22,.68,.23,1),
             box-shadow .45s cubic-bezier(.22,.68,.23,1);
            
}

.card:hover{
  transform:translateY(-10px) rotateX(6deg);
  box-shadow:
      0 10px 20px rgba(0,0,0,.10),
      0 24px 60px rgba(0,0,0,.14);
}

/* ====  GRADIENT RIM  ============================================= */
.card::before{
  content:"";
  position:absolute;
  inset:0;
  border-radius:inherit;
  padding:1px;                             /* rim thickness */
background: linear-gradient(135deg, #fff6cc, #fff0a8, #ffee80);
  -webkit-mask:
      linear-gradient(#000 0 0) content-box,
      linear-gradient(#000 0 0);
  -webkit-mask-composite:xor;
          mask-composite:exclude;
  pointer-events:none;
  z-index:100;
  animation:rim-shift 8s linear infinite;
}

@keyframes rim-shift{
  to{background-position:200% 0;}
}






        /* Detailed Product Description Section */
        .detailed-description {
            display: flex;
            background-color: #f9f9f9;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex-wrap: nowrap;
            flex-direction: column;
            align-items: center;
             border: black; 
             border-color: #000;
             border-radius: 50px;
             
        }

        .detailed-description .section-title {
            font-size: 22px;
            margin-bottom: 15px;
            font-family: 'Poppins', sans-serif;
            color: rgb(10, 4, 4);
            text-decoration:wavy;
        }

        .detailed-description ul {
            list-style-type: none;
            padding: 0;
        }

        .detailed-description ul li {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }

        .detailed-description ul li:before {
            content: "\2022";
            color: #c7b305ff;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .detailed-description {
                padding: 15px;
            }

            .detailed-description .section-title {
                font-size: 20px;
            }

            .detailed-description ul li {
                font-size: 14px;
            }
        }

        /* Similar Products Wrapper */
        .similar-products-wrapper {
            margin-top: 40px;
        }

        .similar-products .section-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            color:rgb(0, 0, 0);
            text-align: center;
        }

       




/* Product Card */
.block2 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    margin: 10px auto;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    background-color: #fff;
    position: relative;
    width: 100%;
    max-width: 160px;
    text-align: center;
    background-color:rgb(246, 246, 246);
}

/* Heart icon positioning */
.btn-addwish-b2 {
    position: absolute;
    top: 250px;
    right: 10px;
}

.btn-addwish-b2 .icon-heart1 {
    opacity: 0.3;
    width: 25px;
    height: 25px;
    transition: opacity 0.3s ease;

}

.btn-addwish-b2:hover .icon-heart1 {
    opacity: 1;
}

.block2 img {
    max-width: 140px;
    height: 140px;
    margin-bottom: 30px;
}

.block2 h4,
.block2 span {
    margin: 5px 0;
    font-size: 14px;
    word-wrap: break-word;
}

/* Grid responsiveness */
.isotope-grid {
    display:flex;
    flex-wrap: wrap;
    justify-content: center;
}

.isotope-item {
    flex: 1 1 calc(50% - 20px);
    max-width: calc(70% - 10px);
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

.block2-txt-child1 a {
    font-size: 16px;
    line-height: 1.1;
    max-height: 3.3em;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    word-break: break-word;
    color: black;
    text-transform: lowercase;
}






.block2-txt-child1 span {
    font-size: 16px;
    font-weight: bold;
    color: #e3002b;
    margin-top: auto;
}


        /* Media Queries for Responsiveness */

        /* Review Stars */
        .review-stars {
            display: flex;
            align-items: center;
        }

        .review-stars .star {
            width: 24px;
            height: 24px;
            margin-right: 5px;
        }

        .review-stars .star-filled {
            filter: brightness(1);
            /* Ensure filled stars are bright */
        }

        .review-stars .star {
            filter: grayscale(100%);
            /* Grey color for empty stars */
        }

        .review-stars .rating-text {
            font-size: 16px;
            margin-left: 10px;
        }
        .limiter-menu-desktop .p-l-45 a{
        color:#888 !important;      /* mid‑grey; tweak if you prefer */

    
}


    </style>
    




    
    <style>

/* ─── animations  ─── */


        .container {
  opacity: 0;
  transform: translateY(-60px);     
  transition: opacity .6s ease-out,
              transform .6s ease-out;
}

.container.reveal {
  opacity: 1;
  transform: none;                  
}
      .info-boxes {
  opacity: 0;
  transform: translateY(-60px);      
  transition: opacity .6s ease-out,
              transform .6s ease-out;
}

.info-boxes.reveal {
  opacity: 1;
  transform: none;                  
}
.detailed-description{
    opacity:0;
    transform:translateY(30px);    
    transform:translateX(30px);

    transition:opacity .6s ease-out,
               transform .6s ease-out;
}

.detailed-description.reveal{
    opacity:1;
    transform:none;
}
.section-title {
  opacity: 0;
  transform: scale(0.95);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

/* Revealed state */
.section-title.reveal {
  opacity: 1;
  transform: scale(1);
}

.block2 {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.block2.reveal {
  opacity: 1;
  transform: translateY(0);
}



    </style>
    <script>
document.addEventListener('DOMContentLoaded', () => {
  const blocks = document.querySelectorAll('.block2');
  if (!blocks.length) return;

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('reveal');
        obs.unobserve(entry.target); // Animate once only
      }
    });
  }, { threshold: 0.15 });

  blocks.forEach(block => observer.observe(block));
});
</script>

    <script>
document.addEventListener('DOMContentLoaded', () => {
  const titles = document.querySelectorAll('.section-title');
  if (!titles.length) return;

  const titleObserver = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('reveal');
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.78 });

  titles.forEach((el, i) => {
    el.style.transitionDelay = `${i * 0.1}s`; // Optional stagger
    titleObserver.observe(el);
  });
});
</script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.querySelector('.container');
        if (!sidebar) return;

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
            if (entry.isIntersecting) {
                sidebar.classList.add('reveal'); // trigger the CSS
                obs.unobserve(entry.target);     // animate only once
            }
            });
        }, { threshold: 0.5 }); // fire when ~15 % visible

        observer.observe(sidebar);
        });
        
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
  const details = document.querySelectorAll('.detailed-description');
  if (!details.length) return;               // none found: exit

  /* One observer for every detailed‑description block */
  const detailObserver = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting){
        entry.target.classList.add('reveal'); // fade / slide in
        obs.unobserve(entry.target);          // animate only once
      }
    });
  }, {threshold:0.45});                       // 15 % visible

  details.forEach(el => detailObserver.observe(el));
});
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.querySelector('.info-boxes');
        if (!sidebar) return;

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
            if (entry.isIntersecting) {
                sidebar.classList.add('reveal'); // trigger the CSS
                obs.unobserve(entry.target);     // animate only once
            }
            });
        }, { threshold: 0.67 }); // fire when ~15 % visible

        observer.observe(sidebar);
        });
    </script>




<script>
  document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('reveal');
          observer.unobserve(entry.target); // only animate once
        }
      });
    }, {
      threshold: 0.2 // Reveal when 20% of the box is visible
    });

    document.querySelectorAll('.info-box').forEach(box => {
      observer.observe(box);
    });
  });
</script>

</head>

<body>

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


        

            <!-- Wishlist -->
            <a href="{{ route('wishlist') }}" class="icon-header-item cl2 hov-cl1 trans-04 icon-header-noti relative text-3xl" data-notify="{{ count(Session::get('wishlistItems', [])) }}">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>

            <!-- Cart -->
            <a href="/panier" class="icon-header-item cl2 hov-cl1 trans-04 icon-header-noti relative text-3xl" data-notify="{{ count(Session::get('productItems', [])) }}">
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
						<a href="/wishlist" class="stext-102 cl2 hov-cl1 trans-04">
							Lise de Souhaits
						</a>
					</li>

					<li class="p-b-13">
						<a href="/Aide_&_FAQs" class="stext-102 cl2 hov-cl1 trans-04">
							Aide & FAQs
						</a>
					</li>
					<span class="mtext-101 cl5">
						@Frip Sakyetna
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
    <div class=" text-center">
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
            <p class="stext-107 cl6 txt-center">
            Developed by <a href="https://www.linkedin.com/in/mahdi-zouari/">Mehdi Zouari</a> 
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
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: false,
        margin: 10,
        nav: true,
        autoplay: false,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
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
    
    
  <!--===============================================================================================-->	
<!--===============================================================================================-->
	<script src={{asset('/vendor/animsition/js/animsition.min.js')}}></script>
<!--===============================================================================================-->
	<script src={{asset('/vendor/bootstrap/js/popper.js')}}></script>
	<script src={{asset('/vendor/bootstrap/js/bootstrap.min.js')}}></script>
    <script src={{ asset('/vendor/animsition/js/animsition.min.js') }}></script>

<script src={{ asset('/js/main.js') }}></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4"></script>





</body>


</html>
