<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About GourmetFood</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="javascript::void(0)"><i class="icon-twitter"></i></a></li>
								<li><a href="javascript::void(0)"><i class="icon-facebook"></i></a></li>
								<li><a href="javascript::void(0)"><i class="icon-linkedin"></i></a></li>
								<li><a href="javascript::void(0)"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="contact.php">Contact</a></li>
								<li><a href="javascript::void(0)">Returns/Exchange</a></li>
								<li><a href="javascript::void(0)">Gift Voucher</a></li>
								<li><a href="javascript::void(0)">Wishlist</a></li>
								<li><a href="javascript::void(0)">Special</a></li>
								<li><a href="javascript::void(0)">Customer Services</a></li>
								<li><a href="javascript::void(0)">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="contact.php">About us</a></li>
								<li><a href="javascript::void(0)">Delivery Information</a></li>
								<li><a href="javascript::void(0)">Privacy Policy</a></li>
								<li><a href="javascript::void(0)">Support</a></li>
								<li><a href="javascript::void(0)">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col footer-col">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="javascript::void(0)">Blog</a></li>
							<li><a href="javascript::void(0)">Press</a></li>
							<li><a href="javascript::void(0)">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>Rajshahi, Talimari </li>
							<li><a href="javascript::void(0)">+88 0171792xxxxx</a></li>
							<li><a href="mailto:admin@gmail.com" style="text-transform: lowercase;"><?php echo strtolower('admin@gmail.com')?></a></li>
							<li><a href="index.php" style="text-transform: lowercase;">www.GourmetFood.bd.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span>
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | www.GourmetFood.bd.com</a></span> 
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
	<script src="js/jquery.min.js"></script>
   <!-- popper -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap 4.1 -->
   <script src="js/bootstrap.min.js"></script>
   <!-- jQuery easing -->
   <script src="js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	<script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>


	</body>
</html>

