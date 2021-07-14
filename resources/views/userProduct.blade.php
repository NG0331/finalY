@extends('layouts.app2')
@section('content')


        <style>

.row {
 display: table;
 margin: 35px;
}
.ss{
  
}


         </style>
     <body>
        
     <div >
        <img class="ss" src="{{ asset('images/back.png')}} " height="100%" width="100%">
        
      </div>
        <br>

        <div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px">I am John Doe</h1>
    <p>And I'm a Photographer</p>
    <button>Hire me</button>
  </div>
</div>


        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     
    </ol>

    <div class="carousel-inner" role="listbox">
    <a href="{{ route('products') }}" >
      <div class="carousel-item active" ><img src="{{ asset('images/promotion1.png')}} " height="50%" width="100%">
      </div>
     
      <div class="carousel-item" ><img src="{{ asset('images/promotion2.png')}} " height="50%" width="100%">
      </div>
     </a>
      </div>
    </div>
<br>

<div ><h3 style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;Recommend</h3></div>

<br>
      <div class="row text-center">
        @foreach ($products as $product)
            <div class="column">
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" alt="product" width="150" height="220" ></a>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
             
                <div>{{ $product->name }}</a></div>
                <br>
            </div>
        @endforeach

</div>
       
</body>
        @endsection('content')