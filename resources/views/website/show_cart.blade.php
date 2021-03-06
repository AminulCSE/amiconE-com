@extends('layouts.website')

@section('website_content')
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
<div class="col-md-12">
    @if(session()->has('message'))
        <div class="alert alert-success" style="font-size: 20px; text-align: center;">
            {{ session()->get('message') }}
        </div>
    @endif
</div>
			<thead>
				<tr>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Subtotal</th>
					<th class="cart-total last-item">Grandtotal</th>
					<th class="cart-romove item">Remove</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="{{ url('all_products') }}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
			@php
				$content = Cart::content();
				$cart_total = 0;
			@endphp
			@foreach($content as $content_row)
				<tr>
					<td class="cart-image">
						<a class="entry-thumbnail" href="{{ url('product_details/'.$content_row->id) }}">
						    <img src="{{ asset($content_row->options->image1) }}" alt="">
						</a>
					</td>


					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="{{ url('product_details/'.$content_row->id) }}">{{ $content_row->name }}</a></h4>
					</td>
					<td class="cart-product-quantity">
						<div class="cart-quantity">
							<form action="{{ url('update_cart') }}" method="post">
								@csrf
								<input type="number" style="width: 100px;" name="qty" value="{{ $content_row->qty }}" min="1">
								<input type="hidden" name="rowId" value="{{ $content_row->rowId }}">
								<button class="btn btn-primary" type="submit" name="">Update Qty</button>
							</form>
			            </div>
		            </td>



					<td class="cart-product-sub-total"><span class="cart-sub-total-price">Tk: {{ $content_row->price }}</span></td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">Tk: {{ $content_row->subtotal }}</span></td>


					<td class="romove-item"><a href="{{ url('delete_cart/'.$content_row->rowId) }}" onclick="return confirm('Are you sure to Delete cart this product??? ')" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
				</tr>
				@php
					$cart_total += $content_row->subtotal;
				@endphp

<!-- <form action="{{ url('order_confirm') }}" method="post">
	@csrf
    	<input type="hidden" name="qty[{{ $content_row->id }}]" value="{{ $content_row->qty }}">

    	<input type="hidden" name="id[{{ $content_row->id }}]" value="{{ $content_row->id }}">



    	<input type="hidden" name="product_id[{{ $content_row->id }}]" value="{{ $content_row->id }}">
    	<input type="hidden" name="total_price[{{ $content_row->id }}]" value={{ $content_row->price }}>
    	<input type="hidden" name="user_id[{{ $content_row->id }}]" value="{{ @Auth::user()->id }}">
    	
<button type="submit" class="btn btn-primary checkout-btn">ORDER CONFIRM</button>

</form> -->



			@endforeach


			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->




<div class="col-md-6 col-sm-12 cart-shopping-total">
	<form >
	<table class="table">
		<thead>
			<tr>
				<th>
					<div class="cart-sub-total">
						Grand Total<span class="inner-left-md">Tk: {{ $cart_total }} /-</span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a href="{{ url('order_confirm') }}" type="submit" class="btn btn-primary checkout-btn">ORDER CONFIRM</a>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</form>
</div><!-- /.cart-shopping-total -->

<div class="col-md-6">
	<div class="payment bg-default" style="border: solid 2px green; border-radius: 12px; text-align: center;">
		<img src="{{ asset('frontend/images/bkash.svg') }}" style="height: 100px; width: auto;">
		<h2>Marchent Account: +8801785072312</h2>
		<p><strong>Note: *</strong>After payment Bkash You must confirm by Phone call to: 01711708105</p>
	</div>
</div>




</div><!-- /.shopping-cart -->
</div> <!-- /.row -->
</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection