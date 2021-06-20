@extends('layouts.app')
@section('content')
@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session::get('success')}}
	</div>
@endif

<script>
	function Cal() {

		var prices = document.getElementsByName('price[]');

		var total = 0;

		var cboxes = document.getElementsByName('item[]');
		var len = cboxes.length;
		for (var i = 0; i < len; i++) {
			if (cboxes[i].checked) { //calculate if checked		
				subtotal = parseFloat(prices[i].value) + parseFloat(total);
				total = subtotal;
			}
		}

		document.getElementById('amount').value = total.toFixed(2);
	}
</script>


<body style="background-color: peachpuff;">

	<div class="container">
		<div class="row">
			<form method="post" action="{{ route('create.order') }}" style="width:-webkit-fill-available;">
				@csrf
				<table class="table table-hover table-striped">
					<thead style="background-color: salmon;">
						<tr>
							<th>ID</th>
							<th>Image</th>
							<th>Name</th>
							<th>Quantity</th>
							<th>Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody style="background-color: cornsilk;">
						@foreach($carts as $cart)
						<tr>
							<td><input type="checkbox" name="item[]" value="{{$cart->cid}}" onchange="Cal()" /></td>
							<td><img src="{{ asset('images/') }}/{{$cart->image}}" alt="" width="50"></td>
							<td style="max-width:300px">
								<h6>{{$cart->bookName}}</h6>
							</td>
							<td>{{$cart->qty}}</td>

						@php
							$subtotal = $cart->qty*$cart->price;
						@endphp

							<td>RM {{$subtotal}}</td>

							<input type="hidden" value="{{$subtotal}}" name="price[]" id="price[]" disabled/>
							
							<td>
								<a href="{{ route('deleteCart', ['id' => $cart->cid]) }}" 
								class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
									Delete
								</a>
							</td>
						</tr>
						@endforeach

						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>    	
							<td>Total</td>
							<td>RM <input type="text" name="amount" id="amount" value=""></td>
							<td><input type="submit" name="checkout" value="Checkout" style="background-color: antiquewhite; border-radius: 10px; height: 35px; width: 80px; border: 2px solid deeppink;"></td>
						</tr>
			</form>

			</tbody>
			</table>

			<div class="text-center">
				{{ $carts->links() }}
			</div>

		</div>
	</div>
</body>
@endsection