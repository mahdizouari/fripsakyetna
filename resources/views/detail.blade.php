<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - Détails du produit</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    

</head>

<body>
    <main class="container">
    <div class="left-column">
    <!-- Product Slider -->
        <div class="slider_wrap ">
            <img data-image="black" src="{{asset('/').$product->image1}}" alt="">
            <img data-image="blue" src="images/blue.png" alt="">
            <img data-image="red" class="active" src="images/red.png" alt="">

    
        </div>

<script>
function silder(){
    slideIndex = 0;
      $('.add-remove').slick({
        slidesToShow: 2,
        slidesToScroll: 2
      });
      $('.js-add-slide').on('click', function() {
        $('.add-remove').slick('slickAdd');
      });

      $('.js-remove-slide').on('click', function() {
        $('.add-remove').slick('slickRemove');
      });
};
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('.img_prev').last()
      .attr('src', e.target.result)
    };

    reader.readAsDataURL(input.files[0]);

    setTimeout(function(){
      $('#add_pic').trigger('click');
      silder();
    }, 100);
  }
}
</script>

</div>



        <!-- Right Column -->
        <div class="right-column">

            <!-- Product Description -->
            <div class="product-description">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description ?? 'No description available.' }}</p>
                <div class="review-stars">
                <i class="fas fa-star star filled"></i>
                <i class="fas fa-star star filled"></i>
                <i class="fas fa-star star filled"></i>
                <i class="fas fa-star star filled"></i>
                <i class="fas fa-star star"></i>
                <span class="rating-text">4.0</span>
            </div>
                
                <p class="available">Disponible</p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration">

                <!-- Product Color -->
                <div class="product-color">
                    <span>Taille : </span>
                    <h4>{{ $product->taille }}</h4>
                </div>

                <!-- Cable Configuration -->
                <div class="cable-config">
                    <span>Catégorie : </span>
                    <div class="cable-choose">
                        {{ $product->Catégorie }}
                    </div>
                   
                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <div class="price-container">
                    <span class="price">{{ number_format($product->price, 2) }} DT</span>
                    <a href="#" class="cart-btn">
                        <i class="fa fa-shopping-cart"></i> Ajouter au panier
                    </a>
                </div>
                <a href="/" class="return-btn">Retourner à la page principale</a>
                <div class="free-shipping">
                    <i class="fas fa-truck icon"></i> <!-- Font Awesome truck icon -->
                    <div>
                        <p class="shipping-text">Livraison gratuite</p>
                        <small class="delivery-info">Livraison estimée en 3 jours</small>
                    </div>
                </div>

            </div>

        </div>
         <!-- Related Products Section -->
        <!-- Related Products Section -->


  
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="{{ asset('js/script.js') }}" charset="utf-8"></script>
    <script>$(document).ready(function(){
            $('.product-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 3000,
            });
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


 


</body>
</html>
