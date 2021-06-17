
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
         </style>
        <body class="antialiased">
        <div>
        <img src="{{ asset('images/back.png')}} " height="615px">
        </div>
        <br>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" ><img src="{{ asset('images/promotion1.png')}} " height="50%" width="100%">
        
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" ><img src="{{ asset('images/promotion2.png')}} " height="50%" width="100%">
        
      </div>
     
        
      </div>
    </div>
<br>


        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        G&R Book Shop
                    </div>
        </body></html>
        @endsection