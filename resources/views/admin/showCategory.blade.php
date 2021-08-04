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

<link rel="stylesheet" href="{{ asset('css/showC&I.css') }}" type="text/css">

<link rel="preconnect" href="https://fonts.gstatic.com">  
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&family=Catamaran:wght@500&display=swap" rel="stylesheet">
<body>

<h1>Category</h1>
    <div class="container">
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="thead-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td><a href="{{ route('delete.Category', ['id' => $category->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
@endguest
@endsection