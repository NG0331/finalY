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

<!-- fdfsadfsafa -->
<link rel="preconnect" href="https://fonts.gstatic.com">  
<link rel="stylesheet" href="{{ asset('css/insertProductStyle.css') }}"/>
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&family=Catamaran:wght@500&display=swap" rel="stylesheet">

<h1>Edit Product </h1>

<div>
    <div style="text-align:center"> 
        <form class="form-group" method="post" action="{{ route('update.Product') }}" enctype="multipart/form-data">
            @csrf 

            @foreach($products as $product)
            <p>
                <label for="ID" class="label">Product ID</label>
                <br>
                <input type="text" name="ID" id="ID" value="{{$product->id}}" readonly>
            </p>

            
            <p>
                <label for="bookName" class="label">Name</label>
                <br>
                <input type="text" name="bookName" id="bookName" value="{{$product->bookName}}"required>
            </p>
            
            <p>
                <label for="author" class="label">Author</label>
                <br>
                <input type="text" name="author" id="author" value="{{$product->author}}"required>
            </p>

            <p>
                <label for="publisher" class="label">Publisher</label>
                <br>
                <input type="text" name="publisher" id="publisher" value="{{$product->publisher}}"required>
            </p>

            <p>
                <label for="publishDate" class="label">publish Date</label>
                <br>
                <input type="date" name="publishDate" id="publishDate" value="{{$product->publishDate}}"required>
            </p>
            
            <p>
                <label for="description" class="label">Description</label>
                <br>
                <textarea type="text" name="description" id="description" value="{{$product->description}}"required></textarea>
            </p>

            <p>
                <label for="dimensions" class="label">Dimensions</label>
                <br>
                <input type="text" name="dimensions" id="dimensions" value="{{$product->dimensions}}"required>
            </p>

                     
            <p>
                <label for="language" class="label">Category</label>
                <select name="language" id="language" class="form-control">
                    @foreach($languages as $language)
                    <option  value="{{ $language->id }}"
                    @if($product->languageID==$language->id)
                    selected                    
                    @endif
                    >{{ $language->name }}</option>
                    @endforeach
                </select>
            </p>
                    
            <p>
                <label for="category" class="label">Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                    <option  value="{{ $category->id }}"
                    @if($product->categoryID==$category->id)
                    selected                    
                    @endif
                    >{{ $category->name }}</option>
                    @endforeach
                </select>
            </p>
            
                    
            <p>
                <label for="price" class="label">Price</label>
                <br>
                <input type="number" name="price" id="price" value="{{$product->price}}"required>
            </p>

            <p>
                <label for="quantity" class="label">Quantity</label>
                <br>
                <input type="number" name="quantity" id="quantity" value="{{$product->quantity}}"required>
            </p>

          
                    <label for="bookStatus" class="label">Book Status </label><br>
                    <p class="tabl">
                    <input class="in1" type="radio" id="bookStatus" name="bookStatus" value="newBook">
                    <label for="newBook" class="inla1">New Book</label><br>

                    <input class="in2" type="radio" id="bookStatus" name="bookStatus" value="secondHand">
                    <label for="secondHand" class="inla2">Second Hand Book</label><br>
                </p>    

            <p>
                <label for="pages" class="label">Pages</label>
                <br>
                <input type="number" name="pages" id="pages" value="{{$product->pages}}"required>
            </p>
                    
            <p>
                <label for="product-image" class="label">Image</label>
                <input type="file" class="form-control" name="product-image" id="product-image-input" value="{{$product->image}}"required>
            </p>
            @endforeach

            <p>
                <input type="submit" id="submit-button" name="edit" value="Edit">
            </p>
        </form>
    </div>
</div>
@endguest
@endsection
