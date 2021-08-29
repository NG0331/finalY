<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BookShop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app3.css') }}" rel="stylesheet">

</head>
<div class="page-wrapper">
    
</div>

    <body>
        <div id="app" class="sticky" >
            <nav class=" navbar navbar-expand-md bg-dark navbar-dark shadow-sm navbar-default navbar-fixed-top" >
                <div class="container-fluid toop">
                    <a class="navbar-brand" href="{{url('/')}}" style="margin-top:-15px;">
                    <div style="margin-top:8px">  <img src="{{ asset('images/icon.png')}}" width="35" height="35" class="d-inline-block align-top" alt="">
                        &nbsp; BookShop</div>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->

                        <ul class="navbar-nav mr-auto" style="margin-top:8px;">
                            <form class="form-inline active-cyan-4" action="{{ route('search.product') }}" method="post">
                                    @csrf
                                    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                                        aria-label="Search" name="searchProduct" id="searchProduct">
                            </form>
                        
                        </ul>
                            
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto"  style="float: right;">
                            <!-- Authentication Links -->
                            
                            <li class="nav-item">
                                <a class="nav-link"href="{{ route('user.Product') }}">{{ __('Home') }}</a>
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
                                <li class="nav-item dropdown"  style="float: right;">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                        @if (Auth::user()->is_admin == 1)
                                        <div class="dropdown-divider"> </div>
                                      
                                        <div class="dropdown-header" >Product Pending</div>
                                        <a class="dropdown-item" href="{{ route('showPending.Book') }}">
                                        {{ __('Pending Product') }}</a>
                                        @endif
                                        @if (Auth::user()->is_admin == 0)
                                        <div class="dropdown-header" >Show Product</div>
                                        <a class="dropdown-item" href=" {{ route('products.List') }}">
                                        {{ __('New Book List') }}</a>

                                        <a class="dropdown-item" href=" {{ route('secondHand.List') }}">
                                        {{ __('Second Hand List') }}</a>
                                        
                                        @endif
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
                                        <div class="dropdown-header" >Insert Book</div>
                                     
                                        <a class="dropdown-item" href="{{ route('insert.Product') }}">
                                        {{ __('Insert Product') }}</a>
                                      
                                                  
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
                                        @if (Auth::user()->is_admin == 0)

                                        <div class="dropdown-divider"> </div>
                                        <div class="dropdown-header" >My Order</div>
                                        <a class="dropdown-item" href=" {{ route('show.myCart') }}">
                                        My Cart </a>   
                                        
                                        <a class="dropdown-item" href=" {{ route('show.myOrder') }}">
                                        My Order </a>   
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        @endif

                                        
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>


</html>
