@extends('app')
@section('title','vouchers của bạn')
@section('content')
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="product-comparison">
			<div>
				<h1 class="page-title text-center heading-title">Product Comparison</h1>
				<div class="table-responsive">
					<table class="table compare-table inner-top-vs">
						 @foreach ($vouchers as $voucher)
						<tr>
							<td><i class="fa-solid fa-ticket"></i></td>
							<td>{{ $voucher['title'] }}</td>
							<td>{{  $voucher['quantity'] }}</td>
							<td>{{ $voucher['due_date'] }}</td>
							<td>Giảm: {{ $voucher['discount'] }}%</td>
							<td>
								<a href="#" class="remove-icon" onclick="return confirmRemove({{ $voucher['id']; }});">
									<i class="fa fa-times"></i>
								</a>

							</td>
						</tr>
						@endforeach 
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection