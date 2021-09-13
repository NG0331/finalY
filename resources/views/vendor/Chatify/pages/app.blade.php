
@include('Chatify::layouts.headLinks')

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" type="text/css">
<link href="{{ asset('css/chatify/app1.css') }}" rel="stylesheet">

<div class="messenger" style="margin-top:60px">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Search" />
            {{-- Tabs --}}
            <div class="messenger-listView-tabs">
                <a href="#" @if($route == 'user') class="active-tab" @endif data-view="users">
                    <span class="far fa-user"></span> People</a>
                <a href="#" @if($route == 'group') class="active-tab" @endif data-view="groups">
                    <span class="fas fa-users"></span> Groups</a>
            </div>
        </div>
        {{-- tabs and lists --}}
        <div class="m-body">
           {{-- Lists [Users/Group] --}}
           {{-- ---------------- [ User Tab ] ---------------- --}}
           <div class="@if($route == 'user') show @endif messenger-tab app-scroll" data-view="users">

               {{-- Favorites --}}
               <div class="favorites-section">
                <p class="messenger-title">Favorites</p>
                <div class="messenger-favorites app-scroll-thin"></div>
               </div>

               {{-- Saved Messages --}}
               {!! view('Chatify::layouts.listItem', ['get' => 'saved','id' => $id])->render() !!}

               {{-- Contact --}}
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

           </div>

           {{-- ---------------- [ Group Tab ] ---------------- --}}
           <div class="@if($route == 'group') show @endif messenger-tab app-scroll" data-view="groups">
                {{-- items --}}
                <p style="text-align: center;color:grey;">Soon will be available</p>
             </div>

             {{-- ---------------- [ Search Tab ] ---------------- --}}
           <div class="messenger-tab app-scroll" data-view="search">
                {{-- items --}}
                <p class="messenger-title">Search</p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Type to search..</span></p>
                </div>
             </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav>
                {{-- header back button, avatar and user name --}}
                <div style="display: inline-flex;">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                    <a href="{{ route('user.Product') }}"><i class="fas fa-home"></i></a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
        </div>
        {{-- Internet connection --}}
        <div class="internet-connection">
            <span class="ic-connected">Connected</span>
            <span class="ic-connecting">Connecting...</span>
            <span class="ic-noInternet">No internet access</span>
        </div>
        {{-- Messaging area --}}
        <div class="m-body app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <p>
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </p>
                </div>
            </div>
            {{-- Send Message Form --}}
            @include('Chatify::layouts.sendForm')
        </div>
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>

<ul style=" margin-top: -800px;width:103%;margin-left: -45px;">
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

                       
                            
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto"  style="float: right;">
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

                                        <div class="dropdown-divider"> </div>
                                      
                                        <div class="dropdown-header" >Message </div>
                                        <a class="dropdown-item" href="{{route(config('chatify.routes.prefix')) }}">
                                        {{ __('Inbox box') }}</a>
                                       

                                        @if (Auth::user()->is_admin == 1)
                                        <div class="dropdown-divider"> </div>
                                      
                                        <div class="dropdown-header" >Product Pending</div>
                                        <a class="dropdown-item" href="{{ url('/pending/showPendingBook') }}">
                                        {{ __('Pending Product') }}</a>
                                        @endif

                                       
                                        <div class="dropdown-header" >Show Product</div>
                                        <a class="dropdown-item" href=" {{ route('products.List') }}">
                                        {{ __('Products List') }}</a>
                                        <a class="dropdown-item" href=" {{ route('secondHand.List') }}">
                                        {{ __('Second Hand List') }}</a>

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
                                        @endif
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
@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')


