@extends('layouts.app3')
@section('content')  

@if(Session::has('success'))
	<div class="alert alert-success background-color=blue" role="alert">
        
		{{ Session::get('success')}}
	</div>
@endif
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" type="text/css">
<link href="{{ asset('css/fixed.css') }}" rel="stylesheet" type="text/css" />
<div class="row" align-text="center">
@foreach($products as $product)       
        <div class="col-md-6"><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50%" class="img-fluid"> </div>
            <div class="col-md-6">
                <form action="{{ route('add.to.cart') }}" method="post">
                       @csrf
                       
                    <h5 class="card-title "><p class="big-font">Description</p><hr class="linkk"><p class="font">{{$product->description}}</p></h5>
                  <br>
                    <div class="far" style="height: 100px;"><p class="fffont">Quantity <input style="color:black;" type="number" name="quantity" id="qty" value="1" min="1" max="10"> Available stock: {{$product->quantity}}</p>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$product->id}}">
                    <input type="hidden" id="name" name="name" value="{{$product->name}}">
                    <input type="hidden" id="amount" name="amount" value="">
                           


                    <div class="far" style="height: 100px;margin-top:-20px;"><p class="ffont">RM {{$product->price}}</p>
                    @if ($product->quantity == 0)
                        <button type="submit" class="btn btn-danger" style="height:40px; font-size: 15px;" disabled>sold
                            out</button>
                        @else

                        <button type="submit" class="btn btn-secondary" style="height:40px; font-size: 15px;">Add To
                            Cart</button>

                        @endif

                </form>
                <div class="card my-4 ">
                    <h5 class="card-header">Rating & Comments <span class="badge badge-dark"></span></h5>
                    <div class="card-body">


                        @php
                        $total=0;
                        $calpoint=0;
                        $numComment=0;
                        @endphp

                        @foreach($review as $item)
                       @php
                           $calpoint= $calpoint+($item->ratingPoints);
                        $numComment=$numComment+1;
                       @endphp
                        
                        @endforeach

                        
                        
                        @if($numComment != 0)
                        @php
                        $total=  number_format($calpoint/$numComment,1);
                        @endphp
                        
                          Total user Ratting {{$total}} ★
                        @endif
                        

                          @foreach($review as $reviews)
                          <blockquote class="blockquote">
                              <p class="mb-0">{{$reviews->comment}}</p>
                              <p class="blockquote-footer">by:{{$reviews->userName}} | ★:{{$reviews->ratingPoints}}</p>  
                          </blockquote>
                          @endforeach
                    </div>
                </div>
                <form method="post" action="{{route('add.Review')}}" >
            @csrf
            <!-- Add Comment -->
            <div class="card my-5 ">
                <h5 class="card-header">Review</h5>
                    <div class="card-body">
                        <div class="rate">
                            <input type="radio" id="star5" name="ratingPoints" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="ratingPoints" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="ratingPoints" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="ratingPoints" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="ratingPoints" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>                          
                    </div>
            </div>
            <p>
                <label for="comment" class="label " style="font-size:13px;">Comment</label>
                
                <br>
                <textarea type="text" name="comment" id="comment" ></textarea>
            </p> 
          
            <input type="hidden" name="productID" id="productID" value="{{$product->id}}">
            <input type="hidden" name="id" id="id" value="{{$product->id}}">
            <input type="submit" class="btn btn-dark mt-2 " />      
           
        </form>
        
</div>
@endforeach   
</div>

</div>
<footer class="footer ttop">
      <div class="footer-content">
      <br>
          <h3>Green & River Book Shop</h3>
          <p>Every book is a soul printed in black words on white paper, as long as my eyes, my knowledge touch it, it comes alive.</p>
          <p>Email  :goh09282000@gmail.com</p>
          <ul class="socials">
              <li>   <a href="https://www.facebook.com/%E7%BB%BF%E6%B2%B3%E4%B9%A6%E7%B1%8D-100969648996154"><i  class="fa fa-facebook"></i></a></li>
              <li>   <a href="https://twitter.com/GreenRi05699013"><i  class="fa fa-twitter"></i></a></li>
              <li>   <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=GTvVlcSBpgPgNjKQmkbpCGCqVLGSLgppxchZlPpNfkMWKxgQbZFlRXTdmZwlmSZQNHmjLqVxRSmZC"><i  class="fa fa-google-plus" ></i></a></li>
              <li>   <a href="https://www.youtube.com/watch?v=kul-g_30HuU&t=10s"><i  class="fa fa-youtube"></i></a></li>
             
        </ul>
        
       
      </div>
      <div class="footer-bottom">
            &copy;Green & RiverBookShop | Designed by ShuLing and Zi Jiang
      </div>

</footer>   
@endsection  

