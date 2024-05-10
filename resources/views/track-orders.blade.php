@extends('app')
@section('title','theo dõi đơn hàng')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('home') }}">Home</a></li>
				<li class='active'>Track your orders</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="track-order-page"> 
			<div class="row">
				<div class="col-md-12">
	<h2 class="heading-title">Your Orders</h2>
	<div class="table-responsive">
		<table class="table compare-table inner-top-vs">
			<tr>
				<td><strong>Ảnh</strong></td>
				<td><strong>Tên Sản Phẩm</strong></td>
				<td><strong>Giá</strong></td>
				<td><strong>Số lượng</strong></td>
				<td><strong>Thành tiền</strong></td>
				<td><strong>Đã thanh toán</strong></td>
				<td><strong>Trạng Thái</strong></td>
				<td><strong>Xác nhận đã nhận hàng</strong></td>
				<!-- <td><strong>Add To Cart</strong></td> -->
			</tr>

			@foreach ($products as $product)
			<tr>
				<td><img style ="width: 90%" src="{{asset('app/images/products/'.$product['image'])}}" alt="{{ $product['name'] }}"></td>
				<td>{{ $product['name'] }}</td>
				<td>{{ $product['price'] }}</td>
				<td>{{ $product['quantity'] }}</td>
				<td>{{ $product['total'] }}</td>
				<td>{{ $product['created_at'] }}</td>
				<td>
					<button class="btn btn-danger">Đang Giao Hàng</button>

				</td>
				<td>
					<button class="btn btn-warning">Xác Nhận</button>

				</td>
				<!-- <td>
					<div class="action">
						<a class="lnk btn btn-primary" href="#">Add To Cart</a>
					</div>
				</td> -->
			</tr>
			@endforeach
		</table>
	</div>
	
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
@endsection

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
