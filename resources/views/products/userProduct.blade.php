@extends('layouts.app2')
@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
 background-color:black;
}



</style>
     
        <div>
        <img src="{{ asset('images/back.png')}} " height="615px" width="100%">
        </div>
        <br>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     
    </ol>

    <div class="carousel-inner" role="listbox">
    <a href="{{ route('products.List') }}" >
      <div class="carousel-item active" ><img src="{{ asset('images/promotion1.png')}} " height="50%" width="100%">
      </div>
     
      <div class="carousel-item" ><img src="{{ asset('images/promotion2.png')}} " height="50%" width="100%">
      </div>
     </a>
      </div>
    </div>
    <h1 style=" margin-left: 20%; color:white;margin-top:20px">Contact us</h1>
    <div class="container">
    
  <img src="{{ asset('images/conus.png')}}"  class="image1">
  <div class="overlay">
    <div class="text"><img src="{{ asset('images/badmintonman.jpg')}}" style="width:50%;height:auto;" ><br>A man who loves badminton and is proficient in coding.<br>+6012-3456789</div>
  </div>
</div>
    
    <div style="color:white;text-align: center;border-style: solid;margin-left:820px;margin-right:20px;margin-top:-23.5%;">
<h1 style="margin-top:40px;"> About us |</h1>
<h6 style="margin-left:100px;margin-right:100px;margin-top:40px;">We unfortunately encountered the outbreak of the epidemic in 2021.<br> Our country also entered mco, and most of the people did not go out.<br> Not to mention going to the bookstore to buy books. 
</h6>

<h6  style="margin-left:120px;margin-right:120px;margin-top:20px;margin-bottom:40px;">We intend to use E-commerce to conduct transactions. <br>Customers can use our website to buy our books. <br>At the same time, you can also sell the books you have read at an appropriate price through our website.<br> We intend to use this platform to let everyone know that the used books will drop in price,<br> but the knowledge in it will never be.
</h6>
    </div>
        <div >
  <ul style="position:fixed; margin-top:-1473px;width:103%;margin-left:-45px;">
  <nav class=" navbar navbar-expand-md bg-dark navbar-dark shadow-sm" >
                <div class="container-fluid toop">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{ asset('images/icon.png')}}" width="35" height="35" class="d-inline-block align-top" alt="">
                        &nbsp; BookShop
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->

                        <ul class="navbar-nav mr-auto">
                            <form class="form-inline active-cyan-4" action="{{ route('search.product') }}" method="post">
                                    @csrf
                                    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                                        aria-label="Search" name="searchProduct" id="searchProduct">
                            </form>
                        
                        </ul>
                            
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        @if (Auth::user()->admin == 1)
                                            Admin
                                            @endif
                                            {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        @if (Auth::user()->is_admin == 0)
                                        <div class="dropdown-divider"> </div>
                                        <div class="dropdown-header" >Insert Your Book</div>
                                        <a class="dropdown-item" href="{{ route('user.insert') }}">
                                        {{ __('Insert Book') }}</a>
                                        <a class="dropdown-item" href="{{ route('show.Status') }}">
                                        {{ __('Book Status') }}</a>

                                        @endif

                                        @if (Auth::user()->is_admin == 1)
                                        <div class="dropdown-divider"> </div>
                                      
                                        <div class="dropdown-header" >Product Pending</div>
                                        <a class="dropdown-item" href="{{ url('/pending/showPendingBook') }}">
                                        {{ __('Pending Product') }}</a>
                                        @endif
                                        <div class="dropdown-header" >Show Product</div>
                                        <a class="dropdown-item" href=" {{ route('products.List') }}">
                                        {{ __('Products list') }}</a>
                                        
                                       
                                        <div class="dropdown-divider"> </div>
                                        <div class="dropdown-header" >Insert Book</div>
                                     
                                        <a class="dropdown-item" href="{{ route('insert.Product') }}">
                                        {{ __('Insert Product') }}</a>
                                        @if (Auth::user()->is_admin == 1)
                                                  
                                        <a class="dropdown-item" href="  {{ route('insert.Language') }}">
                                        {{ __('Insert Language') }}</a>
                                      
                                        <a class="dropdown-item" href="{{ route('insert.Category') }}">
                                        {{ __('Insert Category') }}</a>   
                                        

                                        <div class="dropdown-divider"> </div>
                                        <div class="dropdown-header" >Show Book</div>
                                       
                                        <a class="dropdown-item" href="  {{ route('show.Product') }}">
                                        Show Book </a>   
                                        
                                        <a class="dropdown-item" href=" {{ route('show.Language') }}">
                                        Show Language </a>   
                                    
                                        <a class="dropdown-item" href=" {{ route('show.Category') }}">
                                        Show Category </a> 

                                        @endif

                                        <div class="dropdown-divider"> </div>
                                        <div class="dropdown-header" >My Order</div>
                                       
                                        <a class="dropdown-item" href=" {{ route('show.myCart') }}">
                                        My Cart </a>   
                                        
                                        <a class="dropdown-item" href=" {{ route('show.myOrder') }}">
                                        My Order </a>   
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
  </ul>
        </div>

       
<br>
<div ><h3 style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;Recommend</h3></div>

<br>
      <div class="row text-center">
        @foreach ($products as $product)
            <div class="column">
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" alt="product" width="150" height="220" ></a>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
             
                <br>
            </div>
            
        @endforeach

</div>
  
@endsection('content')