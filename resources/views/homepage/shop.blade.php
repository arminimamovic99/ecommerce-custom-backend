
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lust Web Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="/css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="/css/animate.css">
	
	<link rel="stylesheet" href="/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="/css/magnific-popup.css">

	<link rel="stylesheet" href="/css/aos.css">

	<link rel="stylesheet" href="/css/ionicons.min.css">

	<link rel="stylesheet" href="/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="/css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="/css/flaticon.css">
	<link rel="stylesheet" href="/css/icomoon.css">
	<link rel="stylesheet" href="/css/style.css">

	<script>
	$(function () {
		$(document).scroll(function () {
			var $nav = $(".navbar");
			$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());

			$('.navbar').on('scroll', function(){
				$('.nav-item').css('color: white');
			})
		});
	}); 
	</script>

	<style>
		body {
			background-color: white !important; 
		}
		.collapse {
			margin-right: 260px;
		}
		.col-sm {
			max-height: 470px;
		}
		.navbar.scrolled {
			color: #FFF !important;
			background-color: black !important;
			transition: background-color 200ms linear;
		}
		.navbar > .container > .collapse > ul > li > a {
			colo: #FFF;
		}
		.navbar.scrolled a {
			color: #FFF !important;
		} 
		.navbar.scrolled > .container > .collapse > ul > li > a  {
			color: #FFF !important;
			margin-top: 5px;
		}

		.navbar-brand {
			font-family: 'Satisfy', cursive;
		}
		#section2_first {
			margin-right: -100px;
		}

		#section2_second {
			margin-left: -80px;
		}
 
		.navbar > .container > .collapse > ul > li > a > b {
			color: white;
		}

		.img-prod {
			height:300px;
			width: 250px;
		}
	</style>
</head>
<body>
			
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html" style="color: white; font-size: 30px"><img src="images/lust-logo.png" style="width:100px;height:70px" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" style="float:right">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto" style="font-size:20px">
				  <li class="nav-item" style="color: white"><a href="/categories/" class="nav-link" style="font-size:16px"><b>FASHION</b></a></li>
          <li class="nav-item" style="color: white"><a href="/categories/" class="nav-link" style="font-size:16px"><b>HEALTH & BEAUTY</b></li>
					<li class="nav-item"><a href="#" class="nav-link" style="font-size:16px;"><b>THE COLLECTION</b></a></li>
					<li class="nav-item"><a href="about.html" class="nav-link" style="font-size:16px;"><b>ABOUT US</b></a></li>
			</ul>
			</div>
			<div class="icons" style="float:right">
				<a href="/cart" style="color: gray"><span class="icon-shopping_cart" style="margin-right: 15px;"></span></a>
				<a href="/login" style="color: gray"><i class="fas fa-user"></i></a>
			</div>
		</div>
	</nav>
    <!-- END nav -->
		
		<div class="hero-wrap hero-bread" style="background-image: url('/images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Collection</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product</span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section bg-light">
    	<div class="container-fluid">
    		<div class="row">
								@foreach($products as $product)
                  <div class="col-sm col-md-6 col-lg-3">
										<div class="product">
												<a href="/product/{{$product['id']}}" class="img-prod"><img class="img-fluid" src="/storage/img/<?= $product['photo']; ?>" alt="No Image Available">
												</a>
												<div class="text py-3 px-3">
														<h3><a href="/product/{{$product['id']}}">{{$product['name']}}</a></h3>
														<div class="d-flex">
																<div class="pricing">
																		<p class="price"><span class="price-sale">${{$product['price']}}</span></p>
																</div>
																</div>
														</div>
														<hr>
														<p class="bottom-area d-flex">
																<a href="/cart/add/{{$product['id']}}" class="add-to-cart" style="color: black"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
																<a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
														</p>
												</div>
										</div>
                    @endforeach
										</div> 
                </div>
						</div>
				</div>
			</section>

		<footer class="ftco-footer bg-light ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Lust</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script>
						  
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="/js/jquery.min.js"></script>
  <script src="/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.easing.1.3.js"></script>
  <script src="/js/jquery.waypoints.min.js"></script>
  <script src="/js/jquery.stellar.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/aos.js"></script>
  <script src="/js/jquery.animateNumber.min.js"></script>
  <script src="/js/bootstrap-datepicker.js"></script>
  <script src="/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="/js/google-map.js"></script>
  <script src="/js/main.js"></script>
    
  </body>
</html>