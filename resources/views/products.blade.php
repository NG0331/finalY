@extends('layouts.app')
@section('content')

<!--abc-->
<body>
<link href="css/product.css" rel="stylesheet" type="text/css" />

<div id="space">


<div id="sidebar">
  
<table>
  
       <th id="th"> <a href="{{route('products')}}">All</a></th>

        @foreach($categories as $category)
    <th>    <a href="{{route('products',['category'=>$category->id])}}">{{$category->name}}</a>
</th>
        @endforeach
</table>

</div> <!-- END of sidebar -->

<hr color="grey" ></hr>

<br>

@if($categoryName==null)
                <h2>Product</h2>
                @else
                @foreach ($categoryName as $CName)

                <h2>{{$CName->name}}</h2>
                @endforeach
                @endif

                <br>
<div class="col-md-12">
            <div class="card border-0">
                             
                 <div class="row">
                @foreach($products as $product)              
                    <div class="col-sm-4">
                        <div class="card h-100">
                            <div class="card-body">
                                    <h5 class="card-title" >{{$product->bookName}}</h5>  
                                    <br>                          
                                     <a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" alt="" class="img-fluid" width="250px" ></a>
                                     <br>
                                     <div class="card-heading">RM {{$product->price}} <button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
                                    </div>
                            </div>
                        </div>
                    
                    </div>
                   
                @endforeach          
</div>
<div class="text-center">
	{{ $products->links() }}
 </div>    
@endsection