
@extends('layouts.app')
@section('content')

        <style>
        .numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

.row {
 display: table;
 margin: 35px;
}



         </style>
     
        <div>
        <img src="{{ asset('images/back.jpg')}} " height="615px" width="100%">
        </div>
        <br>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     
    </ol>
    <div class="carousel-inner" role="listbox">

      <div class="carousel-item active" ><img src="{{ asset('images/promotion1.png')}} " height="50%" width="100%">
      </div>
     
      <div class="carousel-item" ><img src="{{ asset('images/promotion2.png')}} " height="50%" width="100%">
      </div>
     
      </div>
    </div>
<br>
<div><h3 style="color:drak-grey;">&nbsp;Recommend</h3></div>
<br>
      <div class="row text-center">
        @foreach ($products as $product)
            <div class="column">
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" alt="product" width="150" height="220" ></a>
              
                <div>{{ $product->name }}</a>RM{{ $product->price }}</div>
            </div>
        @endforeach

</div>
       
      
        @endsection('content')