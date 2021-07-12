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
                    <input type="hidden" name="id" id="id" value="{{$product->id}}">
                    <input type="hidden" id="name" name="name" value="{{$product->name}}">
                    <input type="hidden" id="amount" name="amount" value="">
                           
                    <div style="height: 100px">RM {{$product->price}} <button type="submit" style="float:right" class="btn btn-danger btn-xs">Add To Cart</button>
                </form>
            </div>
        @endforeach     
        <form method="post" action="{{route('addReview')}}">
            @csrf
            <!-- Add Comment -->
            <div class="card my-5">
                <h5 class="card-header">Review</h5>
                    <div class="card-body">
                        <div class="rate">
                            <input type="radio" id="star5" name="ratingPoints" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="ratingPoints" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="ratingPoints" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="ratingPoints" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="ratingPoints" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>                          
                    </div>
            </div>
            <p>
                <label for="comment" class="label">Comment</label>
                    
                <br>
                <textarea type="text" name="comment" id="comment"></textarea>
            </p>
            <input type="submit" class="btn btn-dark mt-2" />        
        </form>
	</div>
@endsection  
<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
        
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }
/*makeStar  */
    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>
