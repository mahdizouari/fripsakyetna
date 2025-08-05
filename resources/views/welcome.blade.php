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
                                                    <p>Découvrir maintenant  </p>
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
    
   <style>
   /* Banner Section */
.sec-banner {
    background-color: #f9f9f9;
    padding: 40px 0;
    text-align: center;
}
.tilt-in-fwd-tr {
	-webkit-animation: tilt-in-fwd-tr 0.6s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: tilt-in-fwd-tr 0.6s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}
/* Banner container */
.size-202 {
    display: inline-block;
    width: 100%;
    max-width: 300px;
    margin: 15px;
    vertical-align: top;

    /* Start hidden and transformed off-screen */
  
}

/* Animation class to be added via JS */
.size-202.banner-reveal {
    opacity: 1;
    pointer-events: auto;
    animation: tilt-in-fwd-tr 0.8s cubic-bezier(.25,.46,.45,.94) both;
    backface-visibility: hidden;
    transform-style: preserve-3d;
}

/* Wrapper and hover styles */
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

/* Text overlay */
.block1-txt {
    position: absolute;
    inset: 0;
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
    background-color: #fff;
    color: #000000 !important;
}





   </style>





    <!-- Product -->
    <section class="sec-product bg0 p-t-100 ">
        <div class="container animate-on-scroll  " style="align-items: stretch">
           
       
        
            <script>
                document.addEventListener('DOMContentLoaded', () => {

                /* -------- 1. Elements that must appear first -------- */
                const earlyEls = document.querySelectorAll(
                    '.section-title, .fancy-title, .button-fancy'
                );

                let revealedCount = 0;                          // track how many earlyEls are done
                const totalEarly   = earlyEls.length;

                /* -------- 2. The container that should appear after -------- */
                const lateContainer = document.querySelector('.container.animate-on-scroll');

                /* ---- Observer for the early elements ---- */
                const earlyObserver = new IntersectionObserver(
                    (entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');  // fade / slide in
                        obs.unobserve(entry.target);            // fire once
                        revealedCount++;

                        // If ALL early elements are now revealed, allow the container to animate
                        if (revealedCount === totalEarly && lateContainer) {
                            // If container is already in view, reveal it immediately
                            if (containerInViewport(lateContainer)) {
                            lateContainer.classList.add('in-view');
                            lateObserver.disconnect();
                            } else {
                            canRevealContainer = true;          // flag for the lateObserver
                            }
                        }
                        }
                    });
                    },
                    { threshold: 0.3 }
                );

                earlyEls.forEach(el => earlyObserver.observe(el));

                /* ---- Observer for the late container ---- */
                let canRevealContainer = false;

                const lateObserver = new IntersectionObserver(
                    (entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && canRevealContainer) {
                        entry.target.classList.add('in-view');  // show container
                        obs.unobserve(entry.target);            // run once
                        }
                    });
                    },
                    { threshold: 0.3 }
                );

                if (lateContainer) lateObserver.observe(lateContainer);

                /* Utility: check if element is already within viewport */
                function containerInViewport(el) {
                    const rect = el.getBoundingClientRect();
                    return (
                    rect.top   < window.innerHeight &&
                    rect.bottom > 0
                    );
                }
                });
                </script>

<!-- Header with Poppins font -->
<div class="relative flex items-center justify-center mt-12 mb-8 scroll-animate">
  <h3 class="text-3xl md:text-4xl font-extrabold text-black text-center tracking-tight opacity-0" style="font-family: 'Poppins', sans-serif;">
    Aperçu du magasin
  </h3>
  <span class="absolute -bottom-2 w-24 h-1 bg-black rounded-full opacity-0"></span>
</div>

<!-- Add once (can be in your layout) -->
<style>
@keyframes fade-in-up {
  from { opacity: 0; transform: translateY(12px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes scale-in {
  from { transform: scaleX(0); opacity: .2; }
  to   { transform: scaleX(1); opacity: 1; }
}
.fade-in-up { animation: fade-in-up .6s ease-out forwards; }
.scale-in { animation: scale-in .5s .5s ease-out both; transform-origin: center; }
</style>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const h3 = entry.target.querySelector('h3');
          const span = entry.target.querySelector('span');
          h3.classList.add('fade-in-up');
          span.classList.add('scale-in');
          h3.classList.remove('opacity-0');
          span.classList.remove('opacity-0');
          observer.unobserve(entry.target); // animate only once
        }
      });
    }, {
      threshold: 0.4
    });

    document.querySelectorAll('.scroll-animate').forEach(el => {
      observer.observe(el);
    });
  });
</script>



        
            <!-- Tab01 -->
            <div class="tab01">


                <!-- Tab panes -->
                <div class="tab-content p-t-20 p-b-20 ">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                        <!-- Slide2 -->
                        <div class="wrap-slick2">
                            <div class="slick2">
                                @foreach ($products as $product)
                                    <div class="item-slick2 p-3">
                                        <!-- Block2 -->
                                        <div class="block2 flex flex-col rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300" style="align-items: stretch;">
                                            
                                            <div class="block2-pic hov-img0 m-0 p-4 overflow-hidden rounded-t-lg" loading="lazy">
                                                <a href="{{ route('detail', $product->id) }}">
                                                    <img 
                                                    src="{{ asset('/' . $product->image1) }}" 
                                                    alt="IMG-PRODUCT" 
                                                    loading="lazy" 
                                                    class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105 mt-1"
                                                    >
                                                </a>
                                            </div>

                                            <div class="block2-txt m-2 mt-1 flex flex-col p-3 gap-3">
                                               <a href="{{ route('detail', $product->id) }}"
                                                class="sstext-104 cl4 hover:text-yellow-600 transition-colors duration-300 font-semibold text-lg capitalize block overflow-hidden"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; height: 3rem; line-height: 1.5rem; text-overflow: ellipsis;">
                                                {{ $product->name }}
                                                </a>


                                                <span class="glow-price  font-extrabold">
                                                    {{ number_format($product->prix, 2) }} DT
                                                </span>

                                                    <button class="js-btn-ajouter-panier bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded transition duration-300" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-price="{{ $product->prix }}">
                                                        <i class="fa fa-shopping-cart"></i> Ajouter au panier
                                                    </button>
                                                    
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <script>
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            document.querySelectorAll('.js-btn-ajouter-panier').forEach(button => {
                                                                button.addEventListener('click', function () {
                                                                    const productId = this.dataset.id;
                                                                    const productName = this.dataset.name;
                                                                    const productPrice = this.dataset.price;

                                                                    // Send AJAX POST request to Laravel
                                                                    fetch(`/panier/add/${productId}`, {
                                                                        method: 'POST',
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                                            'Content-Type': 'application/json'
                                                                        },
                                                                        body: JSON.stringify({})
                                                                    })
                                                                        .then(response => {
                                                                            if (!response.ok) throw new Error('Request failed');
                                                                            return response.json();
                                                                        })
                                                                        .then(data => {
                                                                            // Facebook Pixel: AddToCart
                                                                            fbq('track', 'AddToCart', {
                                                                                content_ids: [productId],
                                                                                content_name: productName,
                                                                                value: productPrice,
                                                                                currency: 'TND',
                                                                                content_type: 'product'
                                                                            });

                                                                            // Refresh the page
                                                                            window.location.reload();
                                                                        })
                                                                        .catch(err => {
                                                                            console.error(err);
                                                                            // Optional: You can log or handle the error differently if needed
                                                                        });
                                                                });
                                                            });
                                                        });
                            </script>
                    <style>
                        .btn-ajouter-panier {
                            width: 100%;
                            cursor: pointer;
                            box-shadow: 0 4px 6px rgba(212, 175, 55, 0.4);
                        }
                        .btn-ajouter-panier:hover {
                            box-shadow: 0 6px 10px rgba(212, 175, 55, 0.6);
                        }
                        /* price design*/   
                        .glow-price {
                            background: linear-gradient(270deg, #ff0080, #7928ca,rgb(36, 24, 208),rgb(39, 89, 73), #ffae00,rgb(221, 4, 4));
                            background-size: 600% 600%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            animation: rainbowGlow 15s ease infinite;
                            text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
                            
                        }

                        @keyframes rainbowGlow {
                            0% {
                                background-position: 0% 50%;
                            }
                            50% {
                                background-position: 100% 50%;
                            }
                            100% {
                                background-position: 0% 50%;
                            }
                        }
                    </style>

                    <script>
                        function addToCart(productId) {
                            // Implement your add to cart logic here, example:
                            fetch('/cart/add/' + productId, { method: 'POST', headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'} })
                            .then(res => res.json())
                            .then(data => {
                                alert('Produit ajouté au panier!');
                                // Optionally update cart UI here
                            })
                            .catch(err => console.error(err));
                        }
                    </script>

                   <!-- JS: Animate products on scroll -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            obs.unobserve(entry.target); // Only trigger once
          }
        });
      },
      { threshold: 0.3 }
    );

    // Animate all .item-slick2 elements
    document.querySelectorAll('.item-slick2').forEach(item => {
      observer.observe(item);
    });
  });
</script>

<!-- CSS: Slide-up animation for products -->
<style>
  .item-slick2 {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
  }

  .item-slick2.in-view {
    opacity: 1;
    transform: translateY(0);
  }
</style>

                        <script>
                        document.addEventListener('DOMContentLoaded', () => {
                        const observer = new IntersectionObserver(
                            (entries, obs) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                entry.target.classList.add('in-view');
                                obs.unobserve(entry.target);   // run once per slide
                                }
                            });
                            },
                            {
                            threshold: 0.3,                 // 30 % visible
                            rootMargin: '0px 0px -100px 0px' // fire a bit later
                            }
                        );

                        // Observe every Slick slide with class .item-slick2
                        document.querySelectorAll('.item-slick2').forEach(el => observer.observe(el));
                        });
                        </script>


   
  {{-- TOP-SELLING SECTION -------------------------------------------------- --}}
<div class="relative flex items-center justify-center mt-12 mb-4 scroll-animate p-1 ">
  <h3 class="text-3xl md:text-4xl font-extrabold text-black text-center tracking-tight opacity-0 mt-5 p-3" style="font-family: 'Poppins', sans-serif;">
    Meilleures ventes
  </h3>
  <span class="absolute -bottom-2 w-24 h-1 bg-black rounded-full opacity-0"></span>
</div>

<!-- Add once (can be in your layout) -->
<style>
@keyframes fade-in-up {
  from { opacity: 0; transform: translateY(12px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes scale-in {
  from { transform: scaleX(0); opacity: .2; }
  to   { transform: scaleX(1); opacity: 1; }
}
.fade-in-up { animation: fade-in-up .6s ease-out forwards; }
.scale-in { animation: scale-in .5s .5s ease-out both; transform-origin: center; }
</style>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const h3 = entry.target.querySelector('h3');
          const span = entry.target.querySelector('span');
          h3.classList.add('fade-in-up');
          span.classList.add('scale-in');
          h3.classList.remove('opacity-0');
          span.classList.remove('opacity-0');
          observer.unobserve(entry.target); // animate only once
        }
      });
    }, {
      threshold: 0.4
    });

    document.querySelectorAll('.scroll-animate').forEach(el => {
      observer.observe(el);
    });
  });
</script>



    @php
        use Illuminate\Support\Facades\DB;
        use App\Models\produits;

        $topCategory = produits::join('commandes','produits.name','=','commandes.nom_de_produit')
            ->select('produits.Catégorie', DB::raw('COUNT(commandes.id) as total_sales'))
            ->groupBy('produits.Catégorie')
            ->orderByDesc('total_sales')
            ->value('produits.Catégorie');

        if (!$topCategory) {
            $topCategory = produits::where('is_active', 1)->value('Catégorie');
        }

        $filteredProducts = produits::where('is_active', 1)
            ->where('Catégorie', $topCategory)
            ->take(20)
            ->get();
    @endphp
<script>
  const tickerTrack = document.getElementById('tickerTrack');
  const tickerContainer = document.getElementById('tickerContainer');
  let timeoutId;

  function pauseAnimation() {
    tickerTrack.classList.add('paused');
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => {
      tickerTrack.classList.remove('paused');
    }, 2000); // Resume after 2 seconds of inactivity
  }

  // Pause animation on scroll or drag interaction
  tickerContainer.addEventListener('scroll', pauseAnimation);

  // Optional: handle drag cursor styling
  let isDown = false;
  let startX;
  let scrollLeft;

  tickerContainer.addEventListener('mousedown', (e) => {
    isDown = true;
    tickerContainer.classList.add('active');
    startX = e.pageX - tickerContainer.offsetLeft;
    scrollLeft = tickerContainer.scrollLeft;
    pauseAnimation();
  });

  tickerContainer.addEventListener('mouseleave', () => {
    isDown = false;
    tickerContainer.classList.remove('active');
  });

  tickerContainer.addEventListener('mouseup', () => {
    isDown = false;
    tickerContainer.classList.remove('active');
  });

  tickerContainer.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - tickerContainer.offsetLeft;
    const walk = (x - startX) * 2; // scroll-fast
    tickerContainer.scrollLeft = scrollLeft - walk;
  });
</script>
<style>
    .ticker-wrapper {
        overflow: hidden;
        width: 100%;
    }

    .ticker-track {
        display: flex;
        width: max-content;
        animation: ticker 15s linear infinite;
    }

    .ticker-item {
        flex-shrink: 0;
        min-width: 240px;
        margin: 0 1rem;
    }
    .ticker-wrapper:hover .ticker-track {
    animation-play-state: paused;
    }
    .js-btn-ajouter-panier {
    min-height: 40px;
    background-color: #facc15; /* Tailwind's yellow-500 */
    color: white;
    font-size: 0.875rem; /* text-sm */
    font-weight: 600;
    padding: 0.5rem 0.75rem;
    width: 100%;
    border-radius: 0.5rem;
    transition: all 0.3s;
    }



    @keyframes ticker {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
</style>

<div class="ticker-wrapper py-6">
        <div class="ticker-track p-b-70 ">
                       @foreach ($filteredProducts as $product)
                <div class="ticker-item w-[260px] flex-shrink-0 mx-4">
            <div class="block2 flex flex-col justify-between h-full min-h-[350px] rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
            
            <!-- Image -->
                <div class="block2-pic hov-img0 p-4 overflow-hidden rounded-t-lg">
                <a href="{{ route('detail', $product->id) }}">
                    <img 
                        src="{{ asset('/' . $product->image1) }}" 
                        alt="IMG-PRODUCT" 
                        loading="lazy" 
                        class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105"
                    >
                    </a>
                </div>

            <!-- Content -->
            <div class="block2-txt m-2 mt-1 flex flex-col flex-grow p-3 gap-3">
               <a href="{{ route('detail', $product->id) }}"
                class="sstext-104 cl4 hover:text-yellow-600 transition-colors duration-300 font-semibold text-lg capitalize block overflow-hidden"
                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; height: 3rem; line-height: 1.5rem; text-overflow: ellipsis;">
                {{ $product->name }}
                </a>



                <span class="glow-price font-extrabold text-sm">
                    {{ number_format($product->prix, 2) }} DT
                </span>

                <button class="js-btn-ajouter-panier w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 text-sm rounded transition duration-300 min-h-[40px] px-3"
                    data-id="{{ $product->id }}"
                    data-name="{{ $product->name }}"
                    data-price="{{ $product->prix }}">
                    <i class="fa fa-shopping-cart"></i> Ajouter au panier
                </button>
            </div>
        </div>
</div>

        @endforeach
    </div>
</div>

    
</div>

<style>




/* Hidden state before a card enters the viewport */
.block2 {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

/* Key‑framed text‑tracking effect */
@keyframes tracking-in-expand {
    0%   { letter-spacing: -0.5em; opacity: 0; }
    40%  { opacity: 0.6; }
    100% { letter-spacing: normal; opacity: 1; }
}

/* When .block2 becomes visible */
.block2.in-view {
    animation: tracking-in-expand 0.9s ease-out both;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');   // fire animation
                    obs.unobserve(entry.target);             // run once per card
                }
            });
        },
        {
            threshold: 0.3,                 // 30 % of element visible
            rootMargin: '0px 0px -100px 0px'
        }
    );

    // Observe every card with class “block2”
    document.querySelectorAll('.block2').forEach(el => observer.observe(el));
});
</script>


<style>
/* Hidden before scroll‑in */
.item.px-2 {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

/* Tracking‑in text effect */
@keyframes tracking-in-expand {
    0%   { letter-spacing: -0.5em; opacity: 0; }
    40%  { opacity: 0.6; }
    100% { letter-spacing: normal; opacity: 1; }
}

/* When the slide enters the viewport */
.item.px-2.in-view {
    animation: tracking-in-expand 0.9s ease-out both;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    obs.unobserve(entry.target);   // trigger only once per slide
                }
            });
        },
        {
            threshold: 0.3,                 // 30 % visible
            rootMargin: '0px 0px -100px 0px'
        }
    );

    // Observe every slide with classes "item px-2"
    document.querySelectorAll('.item.px-2').forEach(el => observer.observe(el));
});
</script>








                    
<div class="sec-banner bg0">
        <div class="flex-w flex-c-m">
            <div class="size-202 wrap-pic-w">
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
                            <span class="hover-underline-animation"> Découvrir </span>
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

            <div class="size-202 wrap-pic-w">
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
                            <span class="hover-underline-animation">  Découvrir </span>
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
               
            
            <div class="size-202 wrap-pic-w">
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
                            <span class="hover-underline-animation"> Découvrir </span>
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
                   
   
	 
    <!-- Slider for sacs -->
   
    <div class="container animate-on-scroll p-b-40 " style="align-items: stretch">
   <div class="relative flex items-center justify-center mt-12 mb-8 scroll-animate">
  <h3 class="text-3xl md:text-4xl font-extrabold text-black text-center tracking-tight opacity-0" style="font-family: 'Poppins', sans-serif;">
    Sacs
  </h3>
  <span class="absolute -bottom-2 w-24 h-1 bg-black rounded-full opacity-0"></span>
</div>

<!-- Add once (can be in your layout) -->
<style>
@keyframes fade-in-up {
  from { opacity: 0; transform: translateY(12px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes scale-in {
  from { transform: scaleX(0); opacity: .2; }
  to   { transform: scaleX(1); opacity: 1; }
}
.fade-in-up { animation: fade-in-up .6s ease-out forwards; }
.scale-in { animation: scale-in .5s .5s ease-out both; transform-origin: center; }
</style>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const h3 = entry.target.querySelector('h3');
          const span = entry.target.querySelector('span');
          h3.classList.add('fade-in-up');
          span.classList.add('scale-in');
          h3.classList.remove('opacity-0');
          span.classList.remove('opacity-0');
          observer.unobserve(entry.target); // animate only once
        }
      });
    }, {
      threshold: 0.4
    });

    document.querySelectorAll('.scroll-animate').forEach(el => {
      observer.observe(el);
    });
  });
</script>
        @php
            $filteredProducts = produits::where('is_active', 1)
                ->where('Référence', 'like', '%sac%')
                ->take(6)
                ->get();
        @endphp
   <div class="wrap-slick3 w-full flex justify-center px-4 sm:px-6 md:px-8  ">
                            <div class="slick3 w-full max-w-6xl">
                                @foreach ($filteredProducts as $product)
                                    <div class="item-slick3 p-1 " >
                                        <!-- Block2 -->
                                        <div class="block2 flex flex-col rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300" style="align-items: stretch;">
                                            
                                            <div class="block2-pic hov-img0 m-0 p-4 overflow-hidden rounded-t-lg" loading="lazy">
                                                <a href="{{ route('detail', $product->id) }}">
                                                    <img 
                                                    src="{{ asset('/' . $product->image1) }}" 
                                                    alt="IMG-PRODUCT" 
                                                    loading="lazy" 
                                                    class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105 mt-1"
                                                    >
                                                </a>
                                            </div>

                                            <div class="block2-txt m-2 mt-1 flex flex-col p-3 gap-3">
                                               <a href="{{ route('detail', $product->id) }}"
                                                class="sstext-104 cl4 hover:text-yellow-600 transition-colors duration-300 font-semibold text-lg capitalize block overflow-hidden"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; height: 3rem; line-height: 1.5rem; text-overflow: ellipsis;">
                                                {{ $product->name }}
                                                </a>


                                                <span class="glow-price  font-extrabold">
                                                    {{ number_format($product->prix, 2) }} DT
                                                </span>

                                                    <button class="js-btn-ajouter-panier bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded transition duration-300" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-price="{{ $product->prix }}">
                                                        <i class="fa fa-shopping-cart"></i> Ajouter au panier
                                                    </button>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
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


   
    <div class="container animate-on-scroll">
        <div class="relative flex items-center justify-center mt-12 mb-8 scroll-animate">
            <h3 class="text-3xl md:text-4xl font-extrabold text-black text-center tracking-tight opacity-0" style="font-family: 'Poppins', sans-serif;">
                Casquettes & Chaussures
            </h3>
            <span class="absolute -bottom-2 w-24 h-1 bg-black rounded-full opacity-0"></span>
            </div>

            <!-- Add once (can be in your layout) -->
            <style>
            @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
            }
            @keyframes scale-in {
            from { transform: scaleX(0); opacity: .2; }
            to   { transform: scaleX(1); opacity: 1; }
            }
            .fade-in-up { animation: fade-in-up .6s ease-out forwards; }
            .scale-in { animation: scale-in .5s .5s ease-out both; transform-origin: center; }
            </style>
            <script>
            document.addEventListener('DOMContentLoaded', () => {
                const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                    const h3 = entry.target.querySelector('h3');
                    const span = entry.target.querySelector('span');
                    h3.classList.add('fade-in-up');
                    span.classList.add('scale-in');
                    h3.classList.remove('opacity-0');
                    span.classList.remove('opacity-0');
                    observer.unobserve(entry.target); // animate only once
                    }
                });
                }, {
                threshold: 0.4
                });

                document.querySelectorAll('.scroll-animate').forEach(el => {
                observer.observe(el);
                });
            });
            </script>
    

            <div class="row">
                @php
                    // Limiting the number of products to 4 and ensuring they are active
                    $filteredProducts = produits::where('is_active', 1)
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
                                                <div class="block2 flex flex-col rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300" style="align-items: stretch;">
                                                    
                                                    <div class="block2-pic hov-img0 p-2 pb-0 overflow-hidden rounded-t-2xl">
                                                        <a href="{{ route('detail', $product->id) }}">
                                                            <img 
                                                            src="{{ asset('/' . $product->image1) }}" 
                                                            alt="IMG-PRODUCT" 
                                                            loading="lazy" 
                                                            class="w-full h-52 sm:h-64 md:h-48 object-cover transition-transform duration-500 hover:scale-105"
                                                            >
                                                        </a>
                                                    </div>

                                                    <div class="block2-txt px-2 py-3 flex flex-col gap-2 text-sm sm:text-base md:text-sm ">
                                                          <a href="{{ route('detail', $product->id) }}"
                                                            class="sstext-104 cl4 hover:text-yellow-600 transition-colors duration-300 font-semibold text-lg capitalize block overflow-hidden"
                                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; height: 3rem; line-height: 1.5rem; text-overflow: ellipsis;">
                                                            {{ $product->name }}
                                                            </a>


                                                        <span class="glow-price  font-extrabold">
                                                            {{ number_format($product->prix, 2) }} DT
                                                        </span>

                                                            <button class="js-btn-ajouter-panier bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded transition duration-300" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                                data-price="{{ $product->prix }}">
                                                                <i class="fa fa-shopping-cart"></i> Ajouter au panier
                                                            </button>

                                                    </div>

                                                </div>
                            </div>
                        @endforeach
                </div>
                <!-- "Voir Plus" Button -->
                <div class="btn-wrapper" style="display:flex;justify-content:center;margin-top:40px;">
                    <a href="prod">
                        <button class="button-fancy">Voir Plus</button>
                    </a>
                </div>


            <style>
                .button-fancy {
                        padding: 10px 28px;
                        font-size: 1rem;
                        letter-spacing: .5px;
                        border: none;
                        border-radius: 40px;
                        background: #222;
                        color: #fff;
                        cursor: pointer;
                        opacity: 0;                 /* hidden */
                        transform: scale(0);        /* “nothing” */
                        transition: opacity .45s ease-out, transform .45s ease-out;
                    }

                    .button-fancy.in-view {
                        opacity: 1;
                        transform: scale(1);
                    }

            </style>
        


            </div>
        </div>
    </div>

                </div>
            </div>
        </div>
    <!-- Blog -->
    <!-- Additional content can be added here -->

            
    
    <div class="container animate-on-scroll" >
        <div class="relative flex items-center justify-center mt-12 mb-8 scroll-animate">
        <h3 class="text-3xl md:text-4xl font-extrabold text-black text-center tracking-tight opacity-0" style="font-family: 'Poppins', sans-serif;">
                    Accessoires
        </h3>
        <span class="absolute -bottom-2 w-24 h-1 bg-black rounded-full opacity-0"></span>
    </div>

     @php
        $filteredProducts = produits::where('is_active', 1)
            ->where('Catégorie', 'accessoire')
            ->take(6)
            ->get();
        @endphp


                        <div class="wrap-slick2">
                            <div class="slick2 p-b-40">
                                @foreach ($filteredProducts as $product)
                                    <div class="item-slick2 p-3 ">
                                        <!-- Block2 -->
                                        <div class="block2 flex flex-col rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300" style="align-items: stretch;">
                                            
                                            <div class="block2-pic hov-img0 m-0 p-4 overflow-hidden rounded-t-lg" loading="lazy">
                                                <a href="{{ route('detail', $product->id) }}">
                                                    <img 
                                                    src="{{ asset('/' . $product->image1) }}" 
                                                    alt="IMG-PRODUCT" 
                                                    loading="lazy" 
                                                    class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105 mt-1"
                                                    >
                                                </a>
                                            </div>

                                            <div class="block2-txt m-2 mt-1 flex flex-col p-3 gap-3">
                                               <a href="{{ route('detail', $product->id) }}"
                                                class="sstext-104 cl4 hover:text-yellow-600 transition-colors duration-300 font-semibold text-lg capitalize block overflow-hidden"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; height: 3rem; line-height: 1.5rem; text-overflow: ellipsis;">
                                                {{ $product->name }}
                                                </a>



                                                <span class="glow-price  font-extrabold">
                                                    {{ number_format($product->prix, 2) }} DT
                                                </span>

                                                    <button class="js-btn-ajouter-panier bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded transition duration-300" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                        data-price="{{ $product->prix }}">
                                                        <i class="fa fa-shopping-cart"></i> Ajouter au panier
                                                    </button>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

<style>
@keyframes fade-in-up {
  from { opacity: 0; transform: translateY(12px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes scale-in {
  from { transform: scaleX(0); opacity: .2; }
  to   { transform: scaleX(1); opacity: 1; }
}
.fade-in-up { animation: fade-in-up .6s ease-out forwards; }
.scale-in { animation: scale-in .5s .5s ease-out both; transform-origin: center; }
</style>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const h3 = entry.target.querySelector('h3');
          const span = entry.target.querySelector('span');
          h3.classList.add('fade-in-up');
          span.classList.add('scale-in');
          h3.classList.remove('opacity-0');
          span.classList.remove('opacity-0');
          observer.unobserve(entry.target); // animate only once
        }
      });
    }, {
      threshold: 0.4
    });

    document.querySelectorAll('.scroll-animate').forEach(el => {
      observer.observe(el);
    });
  });
</script>
    <style>
        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: #333333;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 1px;
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
                            padding: 50px; /* good spacing inside each item */
                            box-sizing: border-box;
                        }


                       
                    /* Product Card */
                        .block2 {
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            align-items: center;
                            margin: 10px auto;
                            border-radius: 8px;
                            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
                            background-color: #fff;
                            position: relative;
                            width: 100%;
                            max-width: 300px;
                            text-align: center;
                            
                        }

                        .block2:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                        }

/* Heart icon positioning */
.btn-addwish-b2 {
    position: absolute;
    top: 261px;
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

.block2 img{
    max-width:350px;     /* ← keep your size limits */
    height:280px;        /* (or use height:auto for true aspect ratio) */
    display:block;       /* turns the <img> into a block */
    position: relative;  /* 0 top + bottom‑space + centered horizontally */
}


.block2 h4,
.block2 span {
    margin: 5px 0;
    font-size: 14px;
    word-wrap: break-word;
}

/* Grid responsiveness */
.isotope-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.isotope-item {
    flex: 1 1 calc(50% - 20px);
    max-width: calc(50% - 20px);
    box-sizing: border-box;
}

@media (min-width: 768px) {
    .isotope-item {
        flex: 1 1 calc(25% - 20px);
        max-width: calc(25% - 20px);
    }
}
.block2-txt-child1 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    text-align: center;
    height: 90px; /* Fixed height for uniformity */
    padding: 10px;
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
/* prevent name from wrapping awkwardly */






.block2-txt-child1 span {
    font-size: 15px;
    font-weight: bold;
    color: #e3002b;
    margin-top: auto;
}
.product-price{
  font-size:15px;
  font-weight:bold;
  color:#e3002b;
  white-space:nowrap;              /* always on one line */
}

/* ──────────────────────────────────────────────
   MOBILE TWEAKS (optional)
   ──────────────────────────────────────────── */
@media (max-width:575px){
  .product-name{ font-size:14px; }
  .product-price{ font-size:14px; }
}
.product-name{
  font-size:16px;
  line-height:1.2;
  color:#000;
  text-transform:lowercase;
  text-decoration:none;

  /* clamp to 2 lines with ellipsis */
  display:-webkit-box;
  -webkit-line-clamp:2;
  -webkit-box-orient:vertical;
  overflow:hidden;
  text-overflow:ellipsis;
  word-break:break-word;
}




    </style>

     
    </section>


   
    
@endsection
