@extends('layouts.base')

@section('title', 'Fripsakyetna')

@section('content')


<style>
/* ─── Custom color palette using your yellows ───────────────────── */
:root {
  --brand-yellow-light: #FFFFDF;
  --brand-yellow-bold:  #FFFFBF;
  --brand-grey-dark:    #2E2E2E;
  --brand-grey-light:   #F5F5F5;
}

/* ─── Top bar (thin announcement strip) ─────────────────────────── */
#flash-sale-top {
  background: var(--brand-yellow-light);
  color: var(--brand-grey-dark);
  letter-spacing: .5px;
  font-weight: 600;
}

/* ─── Middle hero section gradient ──────────────────────────────── */
#flash-sale-middle {
  background: var(--brand-grey-dark);
  background-image: linear-gradient(
    135deg,
    var(--brand-yellow-bold) 0%,
    var(--brand-yellow-light) 50%,
    var(--brand-yellow-bold) 100%
  );
  color: var(--brand-grey-dark);
}

/* ─── Countdown numbers inside hero section ─────────────────────── */
#flash-sale-middle .count {
  color: var(--brand-grey-dark);
  background: var(--brand-yellow-bold);
  padding: 0.3rem 0.6rem;
  border-radius: 0.4rem;
  font-weight: bold;
}

/* ─── Button style to match yellow/grey theme ───────────────────── */
.button-fancy {
  background: var(--brand-yellow-bold);
  color: var(--brand-grey-dark);
  border: none;
  padding: .75rem 2.5rem;
  font-size: 1rem;
  font-weight: 600;
  border-radius: 2rem;
  transition: transform .2s ease, box-shadow .2s ease;
}
.button-fancy:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0,0,0,.1);
}
 #flash-sale-middle .display-5 {
    color: #000;           /* solid black */
  }
 .lead {
    color: #000;           /* solid black */
  } 

/* ─── Responsive: shrink top bar on phones ──────────────────────── */
@media (max-width: 576px) {
  #flash-sale-top {
    font-size: .75rem;
  }
}
</style>



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
    <!-- ===== Flash‑Sale TOP BAR ===== -->



<!-- Other page content -->

<!-- ⚡ Flash‑sale banner -->

  
  <!-- Elfsight Countdown -->
  <script src="https://static.elfsight.com/platform/platform.js" async></script>
  <div class="elfsight-app-876c9a3f-5c28-4d98-a553-757b382704ae" data-elfsight-app-lazy></div>

<!-- Put the script only once per page. -->





<!-- ▬▬▬ SCRIPT (one copy, at the bottom) ▬▬▬ -->
<script>
(() => {
  /* 72 h from first load — replace with fixed date if needed */
  const deadline = Date.now() + 3*24*60*60*1000;

  /* map of ID arrays */
  const ids = {
    d:['d_top','d_mid'],
    h:['h_top','h_mid'],
    m:['m_top','m_mid'],
    s:['s_top','s_mid']
  };
  /* pad helper */
  const pad = n => n.toString().padStart(2,'0');

  /* tick */
  const t = setInterval(() => {
    let diff = Math.max(deadline - Date.now(),0);
    const days=Math.floor(diff/864e5); diff-=days*864e5;
    const hrs =Math.floor(diff/ 36e5); diff-=hrs * 36e5;
    const mins=Math.floor(diff/  6e4); diff-=mins*  6e4;
    const secs=Math.floor(diff/  1e3);

    [['d',days],['h',hrs],['m',mins],['s',secs]].forEach(([k,v])=>{
      ids[k].forEach(id=>{
        const el=document.getElementById(id);
        if(!el) return;
        const nv=pad(v);
        if(el.textContent!==nv){              // value changed → flip
          el.textContent=nv;
          el.classList.remove('flip');        // restart animation
          void el.offsetWidth;                // ↰ reflow trick
          el.classList.add('flip');
          el.addEventListener('animationend',()=>el.classList.remove('flip'),{once:true});
        }
      });
    });

    if(diff===0){                            // time’s up
      clearInterval(t);
      document.getElementById('flash-sale-top')?.remove();
      document.getElementById('flash-sale-middle')?.remove();
    }
  },1000);
})();
</script>

<style>
    /* ─── Bigger & bolder Flash-sale countdown ─── */
.countdown {
  display: flex;
  justify-content: center;
  gap: 2.2rem;              /* space between units */
  font-size: 2.8rem;        /* bigger numbers */
  font-weight: bold;
  letter-spacing: 0.03em;
}

.countdown div {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.countdown span {
  font-variant-numeric: tabular-nums;
  display: inline-block;
  min-width: 2ch;
  transform-origin: 50% 100%;
}

@keyframes flip {
  0%   { transform: rotateX(0); }
  49%  { transform: rotateX(-90deg); }
  50%  { transform: rotateX(90deg); }
  100% { transform: rotateX(0); }
}

.flip {
  animation: flip 0.6s cubic-bezier(0.55, 0.09, 0.68, 0.53);
}

.countdown small {
  font-size: 0.75em;
  opacity: 0.8;
  margin-top: -4px;
}

/* Mobile-friendly scale down */
@media (max-width: 576px) {
  .countdown {
    gap: 1rem;
    font-size: 2rem;
  }
}
/* ▬▬▬ Make the whole timer bigger ▬▬▬ */
.eapps-countdown-timer {      /* root of the widget */
  font-size: 3rem !important;     /* ↑ overall scale */
  max-width: none !important;     /* remove default width cap */
}

/* ▬▬▬ Adjust just the numbers ▬▬▬ */
.eapps-countdown-timer-item-value-base {
  font-size: 1.4em !important;    /* bigger digits */
  line-height: 1 !important;
}

/* ▬▬▬ Make the “d • h • m • s” labels smaller ▬▬▬ */
.eapps-countdown-timer-item-group-label {
  font-size: .5em !important;
  letter-spacing: .05em;
}

/* ▬▬▬ Control spacing between blocks ▬▬▬ */
.eapps-countdown-timer-item:not(:last-child) {
  margin-right: 1.2rem !important;   /* add/remove gap */
}

/* ▬▬▬ Center the widget & trim blank space ▬▬▬ */
.eapps-countdown-timer {
  margin: 0 auto !important;
  display: flex !important;
  justify-content: center !important;
}

/* ▬▬▬ Shrink on phones ▬▬▬ */
@media (max-width: 576px){
  .eapps-countdown-timer{ font-size: 2.1rem !important; }
}


</style>


    <!-- Banner -->
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

/* add more lines if you ever have 4th, 5th, etc. */


/* New Animista keyframes */
@-webkit-keyframes tilt-in-fwd-tr {
  0% {
    -webkit-transform: rotateY(20deg) rotateX(35deg) translate(300px, -300px) skew(-35deg, 10deg);
            transform: rotateY(20deg) rotateX(35deg) translate(300px, -300px) skew(-35deg, 10deg);
    opacity: 0;
  }
  100% {
    -webkit-transform: rotateY(0) rotateX(0deg) translate(0, 0) skew(0deg, 0deg);
            transform: rotateY(0) rotateX(0deg) translate(0, 0) skew(0deg, 0deg);
    opacity: 1;
  }
}
@keyframes tilt-in-fwd-tr {
  0% {
    -webkit-transform: rotateY(20deg) rotateX(35deg) translate(300px, -300px) skew(-35deg, 10deg);
            transform: rotateY(20deg) rotateX(35deg) translate(300px, -300px) skew(-35deg, 10deg);
    opacity: 0;
  }
  100% {
    -webkit-transform: rotateY(0) rotateX(0deg) translate(0, 0) skew(0deg, 0deg);
            transform: rotateY(0) rotateX(0deg) translate(0, 0) skew(0deg, 0deg);
    opacity: 1;
  }
  
}


   </style>





    <!-- Product -->
    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container animate-on-scroll" style="align-items: stretch">
        <div >
            <h3 class="fancy-title">Store Overview</h3>
        </div>
        
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

            <style>
                /* 1. Start the heading hidden & 50 px above its spot */
            .fancy-title {
                opacity: 0;
                transform: translateY(-50px);
                transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            }

            /* 2. When JS adds .in-view, animate it into place */
            .fancy-title.in-view {
                opacity: 1;
                transform: translateY(0);
            }
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
                <div class="tab-content p-t-20">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                        <!-- Slide2 -->
                        <div class="wrap-slick2">
                            <div class="slick2">
                                @foreach ($products as $product)
                                    <div class=" item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
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

                    <script>
                        //SCRIPT FOR PRODUCTS ANIMATION
                        document.addEventListener('DOMContentLoaded', () => {
                        const observer = new IntersectionObserver(
                            (entries, obs) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                entry.target.classList.add('animate-tab');
                                obs.unobserve(entry.target); // run only once
                                }
                            });
                            },
                            { threshold: 0.3 }
                        );

                        // For id="tab01" or class="tab01", use the one you actually have
                        const target = document.querySelector('#tab01') || document.querySelector('.tab01');
                        if (target) observer.observe(target);
                        });
                        </script>
                        <style>
                            /* Initial hidden state */
                        .item-slick2 {
                        opacity: 0;
                        transform: translateY(40px);
                        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
                        }

                        /* When JS adds .in-view */
                        .item-slick2.in-view {
                        opacity: 1;
                        transform: translateY(0);
                        }
                        /* Animista: tracking‑in‑expand */
                        @keyframes tracking-in-expand {
                        0%   { letter-spacing:-0.5em; opacity:0; }
                        40%  { opacity:0.6; }
                        100% { letter-spacing:normal; opacity:1; }
                        }

                        /* Replace previous .in-view rule with this if you like */
                        .item-slick2.in-view {
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

    <!-- top selling products -->

   
  {{-- TOP-SELLING SECTION -------------------------------------------------- --}}
<div class="container animate-on-scroll">
    <div >
    <div >
        <h3 class="section-title">Top Selling</h3>
    </div>
</div>
<style>
    /* 1. Start the heading invisible and shifted left */
.section-title {
    opacity: 0;
    transform: translateX(-50px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

/* 2. When we add .in-view via JS, animate it into place */
.section-title.in-view {
    opacity: 1;
    transform: translateX(0);
} 



</style>
   



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
            ->take(6)
            ->get();
    @endphp
    


    <div class="owl-carousel owl-theme top-selling">
        @foreach ($filteredProducts as $product)
            <div class="item px-2">
                <div class="card block2 text-center h-100">
                    <div class="block2-pic hov-img0">
                        <a href="{{ route('detail', $product->id) }}">
                            <img src="{{ asset($product->image1) }}"
                                 alt="{{ $product->name }}"
                                 class="img-fluid"
                                 loading="lazy">
                        </a>
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l">
                            <a href="{{ route('detail', $product->id) }}"
                               class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $product->name }}
                            </a>
                            <span class="stext-105 cl3">
                                {{ number_format($product->prix, 2) }} DT
                            </span>
                        </div>
                        <div class="block2-txt-child2 flex-r p-t-3">
                            <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="js-addwish-form">
                                @csrf
                                <button type="submit" class="btn-addwish-b2 dis-block pos-relative" aria-label="Ajouter à la wishlist">
                                    <img src="{{ asset('images/icons/heart.svg') }}" alt="heart icon" class="icon-heart1 dis-block trans-04" loading="lazy">
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




<!-- Owl Carousel Initialization -->
<script>
  $('.top-selling').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        576: {
            items: 2
        },
        768: {
            items: 3
        },
        992: {
            items: 4
        }
    }
});

</script>



                    

                   
   
	 
    <!-- Slider for sacs -->
   
    <div class="container animate-on-scroll" style="align-items: stretch">
    <div >
        <h3 class="section-title">Sacs</h3>
    </div>

    <div class="owl-carousel owl-theme sacs-slider">
        @php
            $filteredProducts = produits::where('is_active', 1)
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


   
    <div class="container animate-on-scroll">
    <div >
        <h3 class="section-title">Casquettes & Chaussures</h3>
    </div>

    

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
        
    </section>


    <!-- Blog -->
    <!-- Additional content can be added here -->

            
    
    <div class="container animate-on-scroll" >
    <div >
        <h3 class="section-title">Accessoires</h3>
    </div>
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

    <div class="owl-carousel owl-theme sacs-slider">
        @php
        $filteredProducts = produits::where('is_active', 1)
            ->where('Catégorie', 'accessoire')
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
                                padding: 20px;
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
