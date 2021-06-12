@extends('layouts.app')
@section('content')

@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
<link rel="stylesheet" href="css/insertProductStyle.css"/>
<link rel="preconnect" href="https://fonts.gstatic.com">  
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&family=Catamaran:wght@500&display=swap" rel="stylesheet">

<h1>Insert Product</h1>

<div>
    <div style="text-align:center"> 
        <form method="post" action="{{ route('addProduct') }}" enctype="multipart/form-data">
        @csrf 
        
            <p>
                <label for="bookName" class="label">Book Name</label>
                <br>
                <input type="text" name="bookName" id="bookName">
            </p>

            <p>
                <label for="author" class="label">Author </label>
                <br>
                <input type="text" name="author" id="author">
            </p>
            
            <p>
                <label for="publisher" class="label">Publisher </label>
                <br>
                <input type="text" name="publisher" id="publisher">
            </p>

            <p>
                <label for="publishDate" class="date">Publish Date </label>
                <br>
                <input type="date" name="publishDate" id="publishDate">
            </p>

            <p>
                <label for="description" class="label">Description</label>
                <br>
                <textarea type="text" name="description" id="description"></textarea>
            </p>

            <p>
                <label for="dimensions" class="label">Dimensions </label>
                <br>
                <input type="text" name="dimensions" id="dimensions">
            </p>
                    
            <p>
                <label for="category" class="label">Category</label>
                <br>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </p>

            <p>
                <label for="language" class="label">Language</label>
                <br>
                <select name="language" id="language" class="form-control">
                    @foreach($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </p>
          
            <p>
                <label for="price" class="label">Price (RM)</label>
                <br>
                <input type="number" name="price" id="price">
            </p>
            
            <p>
                <label for="quantity" class="label">Quantity</label>
                <br>
                <input type="number" name="quantity" id="quantity">
            </p>

            <p>
                <label for="pages" class="label">Pages</label>
                <br>
                <input type="number" name="pages" id="pages">
            </p>
                    
            <p>
                <label for="product-image" class="label">Image</label>
                <input type="file" id="product-image-input" class="form-control" name="product-image" value="">
            </p>
                    
            <p>
                <input type="submit" id="submit-button" name="insert" value="Insert">
            </p>
        </form>
    </div>
</div>
@endsection
