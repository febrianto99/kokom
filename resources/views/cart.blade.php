<!DOCTYPE HTML>
<html>
	<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="/frontend/footwear/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/frontend/footwear/css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="/frontend/footwear/css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/frontend/footwear/css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/frontend/footwear/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="/frontend/footwear/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/frontend/footwear/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/frontend/footwear/css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="/frontend/footwear/css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="/frontend/footwear/css/style.css">

	</head>
	<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="index">Footwear</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="#" class="search-wrap">
			               <div class="form-group">
			                  <input type="search" class="form-control search" placeholder="Search">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
                                    <li class="active"><a href="/">Home</a></li>
                                    <li class="has-dropdown">
                                        <a href="bag">bag</a>
                                        <ul class="dropdown">
                                        <li><a href="casuals">Casual</a></li>
                                        <li><a href="travelling">Travelling</a></li>
                                        <li><a href="women">Women</a></li>
                                        <li><a href="cart">Shopping Cart</a></li>
                                        <li><a href="check">Checkout</a></li>
                                        <li><a href="order">Order Complete</a></li>
                                        <li><a href="list">Wishlist</a></li>
                                        </ul>
                                    <li><a href="about">About</a></li>
                                    <li><a href="contact">Contact</a></li>
                                    <li class="cart"><a href="cart"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index">Home</a></span> / <span>Shopping Cart</span></p>
					</div>
				</div>
			</div>
        </div>


<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <form action="{{ url('/formcart-update') }}" method="post">
                            @csrf
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                    <tbody >
                                        @foreach($detailtas as $data)
                                        <input type="hidden" name="id_produk[]" value="{{ $data['id']}}">
                                        <tr>
                                                <td class="cart_product_img">
                                                    <a href="#"><img src="assets/poto/{{ $data['foto_produk'] }}" alt="detailtas"></a>
                                                </td>
                                                <td class="cart_product_desc">
                                                    <h5>{{ $data['detailtas'] }}</h5>
                                                </td>
                                                <td class="price">
                                                    <span>{{ number_format($data['harga_produk']) }}</span>
                                                </td>
                                                <td class="qty">
                                                    <div class="qty-btn d-flex">
                                                        <p>Qty</p>
                                                        <div class="quantity">
                                                            <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="qty[]" value="{{ $data['qty'] }}">
                                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            <button type="submit" class="btn amado-btn">Update</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>Rp. {{ number_format($subtotal)  }}</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>Rp. {{ number_format($subtotal)  }}</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="cart.html" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/cart.js') }}"></script>
@endsection


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							<div class="one-eight text-center px-4">
								<span>Remove</span>
							</div>
						</div>
						<div class="product-cart d-flex">
							<div class="one-forth">
								<div class="product-img" style="background-image: url(frontend/footwear/images/item-6.jpg);">
								</div>
								<div class="display-tc">
									<h3>Product Name</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$68.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$120.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="#" class="closed"></a>
								</div>
							</div>
						</div>
						<div class="product-cart d-flex">
							<div class="one-forth">
								<div class="product-img" style="background-image: url(frontend/footwear/images/item-7.jpg);">
								</div>
								<div class="display-tc">
									<h3>Product Name</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$68.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<form action="#">
										<input type="text" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
									</form>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$120.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="#" class="closed"></a>
								</div>
							</div>
						</div>
						<div class="product-cart d-flex">
							<div class="one-forth">
								<div class="product-img" style="background-image: url(frontend/footwear/images/item-8.jpg);">
								</div>
								<div class="display-tc">
									<h3>Product Name</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$68.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$120.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="#" class="closed"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="total-wrap">
							<div class="row">
								<div class="col-sm-8">
									<form action="#">
										<div class="row form-group">
											<div class="col-sm-9">
												<input type="text" name="quantity" class="form-control input-number" placeholder="Your Coupon Number...">
											</div>
											<div class="col-sm-3">
												<input type="submit" value="Apply Coupon" class="btn btn-primary">
											</div>
										</div>
									</form>
								</div>
								<div class="col-sm-4 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Subtotal:</span> <span>$200.00</span></p>
											<p><span>Delivery:</span> <span>$0.00</span></p>
											<p><span>Discount:</span> <span>$45.00</span></p>
										</div>
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span>$450.00</span></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Related Products</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="/frontend/footwear/images/item-1.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Women's Boots Shoes Maca</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="/frontend/footwear/images/item-2.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Women's Minam Meaghan</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="/frontend/footwear/images/item-3.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Men's Taja Commissioner</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="/frontend/footwear/images/item-4.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Russ Men's Sneakers</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <footer id="colorlib-footer" role="contentinfo">
                <div class="container">
                    <div class="row row-pb-md">
                        <div class="col footer-col colorlib-widget">
                            <h4>About Footwear</h4>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                            <p>
                                <ul class="colorlib-social-icons">
                                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                </ul>
                            </p>
                        </div>

                        <div class="col footer-col">
                            <h4>Contact Information</h4>
                            <ul class="colorlib-footer-links">
                                <li><a>Jalan terusan Cibaduyut</a></li>
                                <li><a href="tel://895412427355">+62 895412427355</a></li>
                                <li><a href="mailto:febrianmarkoto@gmail.com">febrianmarkoto@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="/frontend/fo/otwear/js/jquery.min.js"></script>
   <!-- popper -->
   <script src="/frontend/footwear//js/popper.min.js"></script>
   <!-- bootstrap 4.1 -->
   <script src="/frontend/footwear//js/bootstrap.min.js"></script>
   <!-- jQuery easing -->
   <script src="/frontend/footwea/r/js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="/frontend/footwea/r/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="/frontend/footwear//js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="/frontend/footwear//js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="/frontend/footwear//js/jquery.magnific-popup.min.js"></script>
	<script src="/frontend/footwear//js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="/frontend/footwear//js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="/frontend/f/ootwear/js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script s/rc="frontend/footwear/js/main.js"></script>

	</body>
</html>

