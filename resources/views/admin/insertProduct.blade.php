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

<link rel="stylesheet" href="{{ asset('css/insertProductStyle.css') }}"/>
<link rel="preconnect" href="https://fonts.gstatic.com">  
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&family=Catamaran:wght@500&display=swap" rel="stylesheet">
<body>
<h1>Insert Product</h1>

    <div>
        <div style="text-align:center"> 
          
            <form class="suboform" method="post" action="{{ route ('add.Product') }}" enctype="multipart/form-data">

            @csrf 
            
                <p>
                    <label for="bookName" class="label">Book Name</label>
                    <br>
                    <input type="text" name="bookName" id="bookName" required>
                </p>

                <p>
                    <label for="author" class="label">Author </label>
                    <br>
                    <input type="text" name="author" id="author" required>
                </p>
                
                <p>
                    <label for="publisher" class="label">Publisher </label>
                    <br>
                    <input type="text" name="publisher" id="publisher" required>
                </p>

                <p>
                    <label for="publishDate" class="date">Publish Date </label>
                    <br>
                    <input type="date" name="publishDate" id="publishDate" required>
                </p>

                <p>
                    <label for="description" class="label">Description</label>
                    <br>
                    <textarea type="text" name="description" id="description" required></textarea>
                </p>

                <p>
                    <label for="dimensions" class="label">Dimensions </label>
                    <br>
                    <input type="text" name="dimensions" id="dimensions" required>
                </p>
                        
                <p>
                    <label for="category" class="label">Category</label>
                    <br>
                    <select name="category" id="category" class="form-control" required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </p>

                <p>
                    <label for="language" class="label">Language</label>
                    <br>
                    <select name="language" id="language" class="form-control" required>
                        @foreach($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endforeach
                    </select>
                </p>
            
                <p>
                    <label for="price" class="label">Price (RM)</label>
                    <br>
                    <input type="number" name="price" id="price" required>
                </p>
                
                <p>
                    <label for="quantity" class="label">Quantity</label>
                    <br>
                    <input type="number" name="quantity" id="quantity" required>
                </p>

                <p>
                    <label for="pages" class="label">Pages</label>
                    <br>
                    <input type="number" name="pages" id="pages"required>
                </p>
                <p>
                    <label for="bookStatus" class="label">Book Status </label><br>

                    <input type="radio" id="bookStatus" name="bookStatus" value="newBook">
                    <label for="newBook">New Book</label><br>
x
                    <input type="radio" id="bookStatus" name="bookStatus" value="secondHand">
                    <label for="secondHand">Second Hand Book</label><br>
                </p>        
                <p>
                    <label for="product-image" class="label">Image</label>
                    <input type="file" id="product-image-input" class="form-control" name="product-image" value="" required>
                </p>
                       
                <p>
                    <input type="submit" id="submit-button" name="insert" value="Insert" >
                </p>
            </form>
        </div>
    </div>
</body>
@endguest
@endsection
