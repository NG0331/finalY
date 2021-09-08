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

<link rel="stylesheet" href="{{ asset('css/showProductStyle.css') }}"/>
<link rel="preconnect" href="https://fonts.gstatic.com">  
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&family=Catamaran:wght@500&display=swap" rel="stylesheet">


<h1>Products</h1>

<div class="container">
    <div class="row">
        <table class="table">
            <thead id="table-head">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Sell by</th>
                    <th>Author</th>
                    <th>Category ID</th>
                    <th>Language ID</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50"></td>
                    <td style="max-width:300px">
                        <h6>{{$product->bookName}}</h6>
                        <p class="text-muted">{{$product->description}}</p>
                    </td>
                    <td>{{$product->userName}}</td>   
                    <td>{{$product->author}}</td>
                    <td>{{$product->categoryID}}</td>
                    <td>{{$product->languageID}}</td>
                    <td>{{$product->price}}</td>
                    @if ($product ->bookStatus == "newBook")   
                        <td>    
                            New Book
                        </td>
                        @endif
                       
                        @if ($product ->bookStatus == "secondHand")   
                        <td>    
                           Second Hand Book
                        </td>
                        @endif 
                   
                    <td>
                   
                        <a  href="{{ route('book.detail', ['id' => $product->id]) }}" class="btn btn-success">Information</a>
                        <a href="{{route('edit.Product',['id' => $product->id])}}" class="btn btn-warning">Edit</i></a> 
                        <a href="{{route('delete.Product',['id' => $product->id])}}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</a>   
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        
       

    </div>
    <div class="text-center">
			{{ $products->links('pagination::bootstrap-4')}}
    </div>


</div>

@endguest
@endsection
