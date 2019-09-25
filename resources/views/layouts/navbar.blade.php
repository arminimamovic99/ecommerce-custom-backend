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
			
					<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
					<link rel="stylesheet" href="css/animate.css">
					
					<link rel="stylesheet" href="css/owl.carousel.min.css">
					<link rel="stylesheet" href="css/owl.theme.default.min.css">
					<link rel="stylesheet" href="css/magnific-popup.css">
			
					<link rel="stylesheet" href="css/aos.css">
			
					<link rel="stylesheet" href="css/ionicons.min.css">
			
					<link rel="stylesheet" href="css/bootstrap-datepicker.css">
					<link rel="stylesheet" href="css/jquery.timepicker.css">
			
					
					<link rel="stylesheet" href="css/flaticon.css">
					<link rel="stylesheet" href="css/icomoon.css">
					<link rel="stylesheet" href="css/style.css">
			
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
									<li class="nav-item"><a href="#" class="nav-link" style="font-size:16px"><b>THE COLLECTION</b></a></li>

									@foreach ($categories as $category)
										<li class="nav-item"><a href="#" class="nav-link" style="font-size:16px"><b>{{strtoupper($category->name)}}</b></a></li>
									@endforeach
									
									<li class="nav-item"><a href="about.html" class="nav-link" style="font-size:16px"><b>ABOUT US</b></a></li>
							</ul>
							</div>
							<div class="icons" style="float:right">
								<a href="cart.html" style="color: gray"><span class="icon-shopping_cart" style="margin-right: 15px;"></span></a>
								<i class="fas fa-user"></i>
							</div>
						</div>
					</nav>