@extends('layouts.app4')
@section('content')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" type="text/css">

<!--abc-->
<body>
<link href="{{ asset('css/product.css') }}" rel="stylesheet" type="text/css" />
<div id="space">

<br>


    <div id="sidebar"  style="margin-top:2%;">
    
        <table>
        
            <th id="th"> <a href="{{route('products.List')}}">All</a></th><!-- the route name -->


                @foreach($categories as $category)
            <th >    <a href="{{route('products.List',['category'=>$category->id])}}" >{{$category->name}}</a> 
        </th>
                @endforeach
        </table>
        <hr color="white" width="100%" ></hr>
    </div> <!-- END of sidebar -->

  

    <br>

    @if($categoryName==null)
                    <h2 class="ff">Product</h2>
                    @else
                    @foreach ($categoryName as $CName)

                    <h2 class="ff">{{$CName->name}}</h2>
                    @endforeach
                    @endif

                    <br>
<div id="container">                
        <div class="col-md-12">
            <div class="card border-0">
                                    
                <div class="row">
                    @foreach($products as $product)              
                        <div class="col-sm-4 bb">
                            <div class="card h-100">
                                <div class="card-body " >
                                    <h5 class="card-title" style="font-size:22px;">{{$product->bookName}}</h5>  
                                        <br>                          
                                            <a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" alt="" class="img-fluid" width="250px" ></a>
                                        <br>

                                        <div class="card-title " >RM {{$product->price}} 
                                            <button type="submit" style="float:right; " class="btn btn-danger btn-xs ff" color="white"> 
                                                <a class="ff" href="{{ route('product.detail', ['id' => $product->id]) }}" font-color="white">See More</a>
                                            </button>                                               
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                        <br style="background-color: #4287f5;">
                        @endforeach     
                </div>
                
            </div>         
        </div>
</div> 

<!--pagination -->
    <div class="text-center cc" >
        {{ $products->links('pagination::bootstrap-4')}}
    </div>
    
@endsection
