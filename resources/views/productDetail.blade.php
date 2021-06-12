<style>
.size-content{
    max-height: 168px;
    overflow: auto;
}
.varable-size{
    box-sizing: border-box;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    user-select: none;
    font-size: 12px;
    text-align: center;
    overflow: hidden;
    min-width: 48px;
    max-width: 388px;
    height: 32px;
    padding-right: 8px;
    padding-left: 8px;
    margin-top: 8px;
    margin-right: 8px;
    background: #fff;
    border: 1px solid #dadada;
    border-radius: 2px;
}
.cartBtn{
    justify-content: center;
}
</style>
<script> 
 

 
</script>
@extends('layouts.app')
@section('content')  
	<div class="row" align="center">
        @foreach($products as $product)       
        <div class="col-md-6"><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50%" class="img-fluid"> </div>
            <div class="col-md-6">
                <form action="{{ route('add.to.cart') }}" method="post">
                       @csrf
                    <h5 class="card-title">{{$product->description}}</h5>
                    <p></p>
                    <div style="height: 100px">Quantity <input type="number" name="quantity" id="qty" value="1" min="1" max="10"> Available stock: {{$product->quantity}}
                    </div>
                    <div style="height: 100px">Size</div>
                    <div class="size-content">
                    <button class="varable-size" title="S"data-spm-anchor-id="S"name="S">S</button>
                    <button class="varable-size" title="M"data-spm-anchor-id="M"name="M">M</button>
                    <button  class="varable-size" title="L"data-spm-anchor-id="L"name="L">L</button>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$product->id}}">
                    <input type="hidden" id="name" name="name" value="{{$product->name}}">
                    <input type="hidden" id="amount" name="amount" value="">
                    <div style="height: 100px">RM {{$product->price}}</div>
                    
                <button type="submit" class="cartBtn" style="float:right" class="btn btn-danger btn-xs">Add To Cart</button>
                </form>
             </div>
        @endforeach     
	</div>
@endsection  

