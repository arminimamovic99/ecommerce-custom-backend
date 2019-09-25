<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LUST</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css1/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css1/animate.css">

    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="css1/magnific-popup.css">

    <link rel="stylesheet" href="css1/aos.css">

    <link rel="stylesheet" href="css1/ionicons.min.css">

    <link rel="stylesheet" href="css1/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css1/jquery.timepicker.css">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css1/flaticon.css">
    <link rel="stylesheet" href="css1/icomoon.css">

    <link rel="stylesheet" href="css1/slick.css">
    <link rel="stylesheet" href="css1/slick-theme.css">

    <link rel="stylesheet" href="css1/style.css">
    
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
        <div class="container">
           
            <a class="navbar-brand" href="/">
                <img style="width: 80px" src="images/lust-logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
               
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="/products/all" class="nav-link">FASHION</a></li>
                    <li class="nav-item"><a href="/products/all" class="nav-link">HEALTH &amp; BEAUTY</a></li>
                    <li class="nav-item"><a href="/products/all" class="nav-link">THE COLLECTION</a></li>
                    <li class="nav-item"><a href="/about" class="nav-link">ABOUT US</a></li>
                    <li class="cta cta-colored mobile_icons mb-4">
                        <a href="cart.html" class="nav-link d-inline-block"><i class="material-icons">shopping_cart</i></a>
                        <a href="cart.html" class="nav-link d-inline-block ml-3 mb-4"><i class="material-icons">person</i></a>
                    </li>
                </ul>
                
                <ul class="list-inline desktop_menu_icons">
                    <li class="list-inline-item cta-colored mt-3"><a href="/cart" class="nav-link"><i class="material-icons">shopping_cart</i></a></li>
                    <li class="list-inline-item cta-colored"><a href="/cart" class="nav-link"><i class="material-icons">person</i></a></li>
                </ul>
                
            </div>
        </div>
    </nav>
    <!-- END nav -->
    
    <!-- Banner image -->
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_7.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-11 ftco-animate text-center">
                    <h1>LUST</h1>
                    <h2><span>Looks You Will Desire</span></h2>
                </div>
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner image -->
    
    <div class="goto-here"></div>
    
    <!-- Fashion, Health and Beauty, Accessories section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex text-center">
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="">
                            <h3 class="text-center">FASHION</h3>
                        </a>
                        <a href="">
                            <div><img class="img-fluid" src="images/sample_images_resized.jpg" alt=""></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">

                        <a href="">
                            <h3 class="text-center">HEALTH & BEAUTY</h3>
                        </a>
                        <a href="">
                            <div><img class="img-fluid" src="images/sample_images_resized.jpg" alt=""></div>
                        </a>

                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="">
                            <h3 class="text-center">ACCESSORIES</h3>
                        </a>
                        <a href="">
                            <div><img class="img-fluid" src="images/sample_images_resized.jpg" alt=""></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Fashion, Healtsh and Beauty, Accessories section -->

    @if (session('success'))
		<div class="alert alert-success">
			<p>
			{{ session('success') }}
			<span id='close' style="float:right;cursor:pointer;" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'> X </span>
			</p>
		</div>
	@endif

    <!-- What's in season section -->
    <section class="ftco-section whats_in_season bg-light">
        <div class="container">
            <div class="row mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-1">WHAT'S IN SEASON</h2>
                    <h5>Seasonal Clothing</h5>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row text-center">
                <div class="product_slider_wrapper">
                    <p class="prev-arrow whats_in_season_prev align-middle">
                        <i class="material-icons">keyboard_arrow_left</i>
                    </p>
                    <div class="season" style="max-width: 100%">
                        @foreach($sortedProducts['seasonal'] as $product)
                        <div>
                            <img src="/storage/img/{{$product->photo}}" alt="">
                            <a href="#!"><h5 class="mt-2">{{$product['name']}}</h5>
                            <span>{{$product['description']}}</span>
                            <p><b>${{$product['price']}}</b></p></a>
                        </div>
                    @endforeach
                    </div>
                    <p class="next-arrow whats_in_season_next">
                        <i class="material-icons">keyboard_arrow_right</i>
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="see_more_container">    
                   <a class="see_more btn btn-primary" href="/products/all" style="color: black">See more</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /What's in season section -->

    <!-- Dress Up section -->
    <section class="ftco-section bg-light dress-up">
        <div class="container">
            <div class="row mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-1">DRESS UP</h2>
                    <h5>Our best clothing items</h5>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row text-center">
            <div class="product_slider_wrapper">
                <p class="dress_up_prev-arrow dress_up_prev align-middle">
                    <i class="material-icons">keyboard_arrow_left</i>
                </p>
                <div class="dress_up_slider_container" style="max-width: 100%">
                @foreach($sortedProducts['dress up'] as $product)
                    <div>
                        <img src="/storage/img/{{$product->photo}}" alt="">
                        <a href=""><h5 class="mt-2">{{$product['name']}}</h5>
                        <span>{{$product['description']}}</span>
                        <p><b>${{$product['price']}}</b></p></a>
                    </div>
                @endforeach
                </div>
                <p class="dress_up_next-arrow dress_up_next whats_in_season_next">
                    <i class="material-icons">keyboard_arrow_right</i>
                </p>
            </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="see_more_container">    
                   <a class="see_more btn btn-primary" href="/products/all" style="color: black">See more</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /Dress Up section section -->

    <!-- Collection and shoes section -->
     <section class="ftco-section">
        <div class="container">
            <div class="row d-flex text-center">
                <div class="col-md-4 offset-md-2 ftco-animate">
                    <div class="blog-entry">
                        <a href="">
                            <h3 class="text-center">COLLECTION</h3>
                        </a>
                        <a href="">
                            <div><img class="img-fluid" src="images/sample_images_resized.jpg" alt=""></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">

                        <a href="">
                            <h3 class="text-center">SHOES</h3>
                        </a>
                        <a href="">
                            <div><img class="img-fluid" src="images/sample_images_resized.jpg" alt=""></div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Collection and shoes section -->
    
    <!-- New arrivals section -->
    <section class="ftco-section bg-light new_arrivals">
        <div class="container">
            <div class="row mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-1">NEW ARRIVALS</h2>
                    <h5>Our newest products</h5>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row text-center">
            <div class="new_arrivals_slider_wrapper">
                <p class="new_arrivals_prev-arrow new_arrivals_prev align-middle">
                    <i class="material-icons">keyboard_arrow_left</i>
                </p>
                <div class="new_arrivals_slider_container" style="max-width: 100%">
                    @foreach($sortedProducts['new arrivals'] as $product)
                    <div>
                        <img src="/storage/img/{{$product->photo}}" alt="">
                        <a href="/products/{{$product['id']}}"><h5 class="mt-2">{{$product['name']}}</h5>
                        <span>{{$product['description']}}</span>
                        <p><b>${{$product['price']}}</b></p></a>
                    </div>
                @endforeach
                </div>
                <p class="new_arrivals_next-arrow new_arrivals_next whats_in_season_next">
                    <i class="material-icons">keyboard_arrow_right</i>
                </p>
            </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="see_more_container">    
                   <a class="see_more btn btn-primary" href="/products/all" style="color:black">See more</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /New arrivals section -->
    
    <!-- Looks You Will Desire section -->
    <section class="ftco-section bg-light looks_you_will_desire">
        <div class="container">
            <div class="row mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-1">LOOKS YOU WILL DESIRE</h2>
                    <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elitt.</h5>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row text-center">
            <div class="looks_you_will_desire_slider_wrapper">
                <p class="looks_you_will_desire_prev align-middle">
                    <i class="material-icons">keyboard_arrow_left</i>
                </p>
                <div class="looks_you_will_desire_slider_container" style="max-width: 100%">
                @foreach($sortedProducts["looks you'll desire"] as $product)
                    <div>
                        <img src="/storage/img/{{$product->photo}}" alt="">
                        <a href=""><h5 class="mt-2">{{$product['name']}}</h5>
                        <span>{{$product['description']}}</span>
                        <p><b>${{$product['price']}}</b></p></a>
                    </div>
                @endforeach
                </div>
                <p class="looks_you_will_desire_next whats_in_season_next">
                    <i class="material-icons">keyboard_arrow_right</i>
                </p>
            </div>
            </div>
        </div>
    </section>
    <!-- /Looks You Will Desire section -->
    
    <!-- All things luxury section -->
    <section class="ftco-section bg-light luxury_things">
        <div class="container">
            <div class="row mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-1">ALL THINGS LUXURY</h2>
                    <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elitt.</h5>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row text-center">
            <div class="luxury_things_slider_wrapper">
                <p class="luxury_things_prev-arrow luxury_things_prev align-middle">
                    <i class="material-icons">keyboard_arrow_left</i>
                </p>
                <div class="luxury_things_slider_container" style="max-width: 100%">
                    @foreach($sortedProducts["luxurious"] as $product)
                    <div>
                        <img src="/storage/img/{{$product->photo}}" alt="">
                        <a href="/products/{{$product['id']}}"><h5 class="mt-2">{{$product['name']}}</h5>
                        <span>{{$product['description']}}</span>
                        <p><b>${{$product['price']}}</b></p></a>
                    </div>
                @endforeach
                </div>
                <p class="luxury_things_next-arrow luxury_things_next whats_in_season_next">
                    <i class="material-icons">keyboard_arrow_right</i>
                </p>
            </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="see_more_container">    
                   <a class="see_more btn btn-primary" href="#!" style="color: black">See more</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /All things luxury section -->
    
    
    <!-- Beacome vendor section -->
     <section class="ftco-section vendor_section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12 ftco-animate">
                    <div class="blog-entry">
                        <div class="vendor_content_wrapper">
                            <div class="vendor_container">
                                <img class="img-fluid" src="images/vendor.jpg" alt="">
                                <h1>Become a vendor</h1>
                            </div>
                                <a class="vendor_button" href="/partnership">Become A Vendor Partner</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Become vendor section -->
    <footer class="ftco-footer bg-light ftco-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-5 ml-md-5">
                        <h2 class="ftco-heading-2">LUST</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="d-block">About</a></li>
                            <li><a href="#" class="d-block">Careers</a></li>
                            <li><a href="#" class="d-block">Vendor Partnership</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-3 ml-md-5">
                        <h2 class="ftco-heading-2">Customer Service</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-5">
                                <li><a href="#" class="d-block">Shipping &amp; Delivery</a></li>
                                <li><a href="#" class="d-block">Returns &amp; Exchange</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-3 ml-md-5">
                        <h2 class="ftco-heading-2">HAVE A QUESTION</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-5">
                                <li><a href="#" class="d-block">partnerships@finelust.com</a></li>
                                <li><a href="#" class="d-block">support@finelust.com</a></li>
                                <li><a href="#" class="d-block">press@finelust.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>                
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-3 ml-md-5">
                        <h2 class="ftco-heading-2">SOCIAL</h2>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div> 




    <script src="js1/jquery.min.js"></script>
    <script src="js1/jquery-migrate-3.0.1.min.js"></script>
    <script type="text/javascript" src="js1/slick.js"></script>
    <script src="js1/slick-script.js"></script>

    <script src="js1/popper.min.js"></script>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js1/jquery.easing.1.3.js"></script>
    <script src="js1/jquery.waypoints.min.js"></script>
    <script src="js1/jquery.stellar.min.js"></script>
    <script src="js1/owl.carousel.min.js"></script>
    <script src="js1/jquery.magnific-popup.min.js"></script>
    <script src="js1/aos.js"></script>
    <script src="js1/jquery.animateNumber.min.js"></script>
    <script src="js1/bootstrap-datepicker.js"></script>
    <script src="js1/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js1/google-map.js"></script>

    
    <script src="js1/main.js"></script>


</body>
</html>