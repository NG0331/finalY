@extends('layouts.app')
@section('content')
@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session::get('success')}}
	</div>
@endif

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
<link rel="stylesheet" href="css/insertCategory&LanguageStyle.css"/>
<link rel="preconnect" href="https://fonts.gstatic.com">  
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&family=Catamaran:wght@500&display=swap" rel="stylesheet">
<body>
    <h1>Insert Language</h1>

    <div class="container">
        <div style="text-align:center"> 
            <form class="suboform" method="post" action="{{ route('addLanguage') }}" enctype="multipart/form-data">
            @csrf 
              
                <p>
                    <label for="name" class="label">Name</label>
                    <br>
                    <input type="text" name="name" id="name">
                </p>

                <p>
                    <input type="submit" id="submit-button" name="insert" value="Insert"   class="btn btn-primary">
                </p>
            </form>
        </div>
    </div>
</body>    
@endguest
@endsection