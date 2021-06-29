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
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&family=Catamaran:wght@500&display=swap" rel="stylesheet">

<h1>Edit Product </h1>

<div>
    <div style="text-align:center"> 
        <form class="form-group" method="post" action="{{ route('updateproduct') }}" enctype="multipart/form-data">
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
                <input type="text" name="bookName" id="bookName" value="{{$product->bookName}}">
            </p>
            
            <p>
                <label for="author" class="label">Author</label>
                <br>
                <input type="text" name="author" id="author" value="{{$product->author}}">
            </p>

            <p>
                <label for="publisher" class="label">Publisher</label>
                <br>
                <input type="text" name="publisher" id="publisher" value="{{$product->publisher}}">
            </p>

            <p>
                <label for="publishDate" class="label">publish Date</label>
                <br>
                <input type="date" name="publishDate" id="publishDate" value="{{$product->publishDate}}">
            </p>
            
            <p>
                <label for="description" class="label">Description</label>
                <br>
                <textarea type="text" name="description" id="description" value="{{$product->description}}"></textarea>
            </p>

            <p>
                <label for="dimensions" class="label">Dimensions</label>
                <br>
                <input type="text" name="dimensions" id="dimensions" value="{{$product->dimensions}}">
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
                <input type="number" name="price" id="price" value="{{$product->price}}">
            </p>

            <p>
                <label for="quantity" class="label">Quantity</label>
                <br>
                <input type="number" name="quantity" id="quantity" value="{{$product->quantity}}">
            </p>

            <p>
                <label for="pages" class="label">Pages</label>
                <br>
                <input type="number" name="pages" id="pages" value="{{$product->pages}}">
            </p>
                    
            <p>
                <label for="product-image" class="label">Image</label>
                <input type="file" class="form-control" name="product-image" id="product-image-input" value="{{$product->image}}">
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
<style>
main {
    background-image: linear-gradient(rgba(241, 241, 241, 0.6),rgba(156, 154, 154, 0.6)),url("/image/background.PNG");
    background-position: center;
    background-size: cover;
    background-color: #323842;
}

h1 {
    margin: 20px;
    font-family: 'Teko', sans-serif;
    text-align: center;
    color: rgb(78, 81, 85);
}

form {
    width: 80%;
    margin: auto;   
}

label {
    color: rgb(72, 77, 90);
    font-family: 'Catamaran', sans-serif;
}

input,textarea {
    border: none;
    border-radius: 5px;
    width: 450px;
    padding: 10px;
    color: #333638;
}

input {
    height: 40px;
}

input#price {
    text-align: center;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}   

textarea {
    height: 150px;
}

input,textarea, select#category,input#product-image-input {
    background-color: rgba(255, 255, 255, 0.548);
}

select#category, input#product-image-input {
    width: 450px;
    margin: auto;
    color: #333638;
}

select#language, input#product-image-input {
    width: 450px;
    margin: auto;
    color: #333638;
}

#submit-button {
    width: 100px;
    margin: 20px;
    color: white;
    background-color: rgb(78, 81, 85);
    padding: 0px;
}

#submit-button:hover {
    background-color: rgba(62, 62, 63, 0.336);
}

</style>