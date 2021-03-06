<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LUST</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="/css1/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/css1/animate.css">

    <link rel="stylesheet" href="/css1/owl.carousel.min.css">
    <link rel="stylesheet" href="/css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css1/magnific-popup.css">

    <link rel="stylesheet" href="/css1/aos.css">

    <link rel="stylesheet" href="/css1/ionicons.min.css">

    <link rel="stylesheet" href="/css1/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/css1/jquery.timepicker.css">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css1/flaticon.css">
    <link rel="stylesheet" href="/css1/icomoon.css">

    <link rel="stylesheet" href="/css1/slick.css">
    <link rel="stylesheet" href="/css1/slick-theme.css">

    <link rel="stylesheet" href="/css1/style.css">
    
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
                    <li class="list-inline-item cta-colored mt-3"><a href="cart.html" class="nav-link"><i class="material-icons">shopping_cart</i></a></li>
                    <li class="list-inline-item cta-colored"><a href="cart.html" class="nav-link"><i class="material-icons">person</i></a></li>
                </ul>
                
            </div>
        </div>
    </nav>
    <!-- END nav -->
		<div class="alert alert-success">
			<p>
					{{ session('success') }}
					<span id='close' style="float:right;cursor:pointer;" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'> X </span>
			</p>
			
	</div>
		<div class="hero-wrap hero-bread" style="background: black;">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread" style="color: white">My Cart</h1>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						      </tr>
						    </thead>
						    <tbody>
									
								@foreach ($products as $item)
												
												<tr class="text-center">
													<td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
													
													<td class="image-prod"><div class="img" style="background-image:url(images/product-3.jpg);"></div></td>
													
													<td class="product-name">
																			<h3>{{$item->name}}</h3>
																			<p>{{$item->description}}</p>
													</td>
													
																			<td class="price">${{$item->price}}</td>
																			
																			
													<td class="quantity">
														<div class="input-group mb-3">
															<input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
														</div>
													</td>

												</tr><!-- END TR-->
                	@endforeach
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
							<h3>Cart Totals</h3>
							
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span> ${{$total}}</span>
    					</p>
    				</div>
    				<p class="text-center"><a href="/checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>

    
    
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

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




	<script src="/js1/jquery.min.js"></script>
	<script src="/js1/jquery-migrate-3.0.1.min.js"></script>
	<script type="text/javascript" src="/js1/slick.js"></script>
	<script src="/js1/slick-script.js"></script>

	<script src="/js1/popper.min.js"></script>
	<script src="/js1/bootstrap.min.js"></script>
	<script src="/js1/jquery.easing.1.3.js"></script>
	<script src="/js1/jquery.waypoints.min.js"></script>
	<script src="/js1/jquery.stellar.min.js"></script>
	<script src="/js1/owl.carousel.min.js"></script>
	<script src="/js1/jquery.magnific-popup.min.js"></script>
	<script src="/js1/aos.js"></script>
	<script src="/js1/jquery.animateNumber.min.js"></script>
	<script src="/js1/bootstrap-datepicker.js"></script>
	<script src="/js1/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="/js1/google-map.js"></script>

	
	<script src="/js1/main.js"></script>


</body>
</html>