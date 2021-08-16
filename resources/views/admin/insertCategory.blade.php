@extends('layouts.app')
@section('content')
@guest
@if (Route::has('login'))

<script>
    window.location.href='{{ route('login') }}'
</script>

@endif

@elseif (Auth::user()->is_admin == 0)
@elseif (Auth::user()->is_admin == 1)


@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
<link rel="stylesheet" href="{{ asset('css/insertCategory&LanguageStyle.css') }}"/>
<link rel="preconnect" href="https://fonts.gstatic.com">  
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&family=Catamaran:wght@500&display=swap" rel="stylesheet">

<body>
<h1>Insert Category</h1>

    <div class="container">
        <div style="text-align:center"> 
            <form class="suboform" method="post" action="{{ route('add.Category') }}" enctype="multipart/form-data">
            @csrf
               
                <p>
                    <label for="name" class="label">Name</label>
                    <br>
                    <input type="text" name="name" id="name" required>
                </p>
                                
                <p>
                    <input type="submit" id="submit-button" name="insert" value="Insert"  class="btn btn-primary">
                </p>
            </form>
        </div>
    </div>
</body>
<footer class="footer" style="margin-top:20%">
      <div class="footer-content">
      <br>
          <h3>Green&River Book Shop</h3>
          <p>Paragraph for Green&River Book Shop(still havent idea)</p>
          <p>Email  :goh09282000@gmail.com</p>
          <ul class="socials">
              <li>   <a href="https://www.facebook.com/"><i  class="fa fa-facebook"></i></a></li>
              <li>   <a href="https://twitter.com/?lang=en"><i  class="fa fa-twitter"></i></a></li>
              <li>   <a href="https://mail.google.com/mail/u/0/?tab=wm#inbox"><i  class="fa fa-google-plus" ></i></a></li>
              <li>   <a href="https://www.youtube.com/watch?v=kul-g_30HuU&t=10s"><i  class="fa fa-youtube"></i></a></li>
             
        </ul>
        
       
      </div>
      <div class="footer-bottom">
            &copy;Green&RiverBookShop | Designed by ShuLing and Zi Jiang
      </div>

</footer>   

@endguest
@endsection
