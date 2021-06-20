@extends('layouts.app')
@section('content')

<body style="background-color: lightcyan;">

	<div class="container">
		<div class="row">
			<form method="post" action="{!! URL::to('paypal') !!}" style="width:-webkit-fill-available;">
				@csrf
				<table class="table table-hover table-striped">

					<thead style="background-color: white;">
						<tr>
							<th>ID</th>
							<th>Image</th>
							<th>Name</th>
							<th>Amount</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody style="background-color: mintcream;">
						@php
						$total=0;
						@endphp
						@foreach($myorders as $myorder)
						<tr>
							<td>{{$myorder->id}}</td>
							<td><img src="{{ asset('images/') }}/{{$myorder->image}}" alt="" width="50"></td>
							<td style="max-width:300px">
								<h6>{{$myorder->name}}</h6>
							</td>

							@php
							$subtotal = $myorder->price;

							$total=$total+$subtotal;
							@endphp
							<td>RM {{$subtotal}}</td>
							<td>
								{{ $myorder->paymentStatus }}
							</td>
						</tr>
						@endforeach

						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>RM <input name="amount" value="{{ $total }}"></td>
							<td><input type="submit" name="paynow" value="Pay Now" style="background-color: azure; border-radius: 10px; height: 35px; width: 80px; border: 2px solid deepskyblue;"></td>
						</tr>
			</form>
			</tbody>
			</table>

		</div>
	</div>

</body>
@endsection