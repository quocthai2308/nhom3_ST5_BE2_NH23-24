﻿

<?php $__env->startSection('title','ThuanLamProduct'); ?>
<?php $__env->startSection('content'); ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?php echo e(url('home')); ?>">Home</a></li>
				<li class='active'>Compare</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
    <div class="product-comparison">
		<div>
			<h1 class="page-title text-center heading-title">Product Comparison</h1>
			<div class="table-responsive">
				<table class="table compare-table inner-top-vs">
					<tr>
						<th>Products</th>
						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="detail.html">
										    <img alt="" src="<?php echo e(asset ('app\images\products\p1.jpg')); ?>">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="#">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>

						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="detail.html">
										    <img alt="" src="<?php echo e(asset ('app\images\products\p2.jpg')); ?>">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="#">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>

						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="detail.html">
										    <img alt="" src="<?php echo e(asset ('app\images\products\p4.jpg')); ?>">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="#">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>

						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="detail.html">
										    <img alt="" src="<?php echo e(asset ('app\images\products\p5.jpg')); ?>">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="#">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<th>Price</th>
						<td>
							<div class="product-price">
								<span class="price"> $300.00 </span>
								<span class="price-before-discount">$500.00</span>
							</div>
						</td>

						<td>
							<div class="product-price">
								<span class="price"> $350.00 </span>
								<span class="price-before-discount">$500.00</span>
							</div>
						</td>

						<td>
							<div class="product-price">
								<span class="price"> $400.00 </span>
								<span class="price-before-discount">$500.00</span>
							</div>
						</td>

						<td>
							<div class="product-price">
								<span class="price"> $3600.00 </span>
								<span class="price-before-discount">$500.00</span>
							</div>
						</td>
					</tr>

					<tr>
						<th>Description</th>
						<td><p class="text">Proin semper eros ac posuere ultrices. Nulla quis mi in risus volutpat blandit vestibulum in lorem. In euismod laoreet sapien vel gravida.  Proin sem per eros ac posuere ultrices. Nulla quis mi in risus.<p></td>
						<td><p class="text">Proin semper eros ac posuere ultrices. Nulla quis mi in risus volutpat blandit vestibulum in lorem. In euismod laoreet sapien vel gravida.  Proin sem per eros ac posuere ultrices.<p> </td>
						<td><p class="text">Proin semper eros ac posuere ultrices. Nulla quis mi in risus volutpat blandit vestibulum in lorem. In euismod laoreet sapien vel gravida.<p></td>
						<td><p class="text">Proin semper eros ac posuere ultrices. Nulla quis mi in risus volutpat blandit vestibulum in lorem. In euismod laoreet sapien vel gravida.  Proin sem per eros ac posuere ultrices. Nulla quis mi in risus.<p></td> 
					</tr>

					<tr>
						 <th>Availability</th>
	                     <td><p class="in-stock">In Stock</p></td>
	                     <td><p class="in-stock">In Stock</p></td>
	                     <td><p class="in-stock">In Stock</p></td>
	                     <td><p class="in-stock">In Stock</p></td>
					</tr>

					<tr>
						<th>Remove</th>
						<td class='text-center'><a href="#" class="remove-icon"><i class="fa fa-times"></i></a></td>
						<td class='text-center'><a href="#" class="remove-icon"><i class="fa fa-times"></i></a></td>
						<td class='text-center'><a href="#" class="remove-icon"><i class="fa fa-times"></i></a></td>
						<td class='text-center'><a href="#" class="remove-icon"><i class="fa fa-times"></i></a></td>
					</tr>
				</table>
			</div>
            </div>
		</div>
	</div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->

<?php $__env->stopSection(); ?>
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Thuận HK4\BE2\LamNhom\nhom3_ST5_BE2_NH23-24\resources\views/productComparison.blade.php ENDPATH**/ ?>