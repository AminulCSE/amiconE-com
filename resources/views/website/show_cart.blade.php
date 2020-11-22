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
								<a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
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
						<a class="entry-thumbnail" href="{{ url('product_details/'.$content_row->id) }} ">
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
								<input class="btn btn-primary" type="submit" name="" value="Update Qty">
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
			@endforeach
			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->	

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Estimate shipping and tax</span>
					<p>Enter your destination to get shipping and tax.</p>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<label class="info-title control-label">Country <span>*</span></label>
							<select class="form-control unicase-form-control selectpicker">
								<option>--Select options--</option>
								<option>India</option>
								<option>SriLanka</option>
								<option>united kingdom</option>
								<option>saudi arabia</option>
								<option>united arab emirates</option>
							</select>
						</div>
						<div class="form-group">
							<label class="info-title control-label">State/Province <span>*</span></label>
							<select class="form-control unicase-form-control selectpicker">
								<option>--Select options--</option>
								<option>TamilNadu</option>
								<option>Kerala</option>
								<option>Andhra Pradesh</option>
								<option>Karnataka</option>
								<option>Madhya Pradesh</option>
							</select>
						</div>
						<div class="form-group">
							<label class="info-title control-label">Zip/Postal Code</label>
							<input type="text" class="form-control unicase-form-control text-input" placeholder="">
						</div>
						<div class="pull-right">
							<button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
						</div>
					</td>
				</tr>
		</tbody>
	</table>
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
						</div>
						<div class="clearfix pull-right">
							<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>
			<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">Tk: {{ $cart_total }}</span>
					</div>

					<div class="cart-sub-total">
						Vat amd Tex<span class="inner-left-md">$600.00</span>
					</div>

					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">$600.00</span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
							<span class="">Checkout with multiples address!</span>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			
</div><!-- /.shopping-cart -->
</div> <!-- /.row -->
</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection