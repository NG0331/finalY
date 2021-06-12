@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="css/showC&I.css" type="text/css">
<body>

<h1>Language</h1>
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
                    @foreach($languages as $language)
                        <tr>
                            <td>{{$language->id}}</td>
                            <td>{{$language->name}}</td>
                            <td><a href="{{ route('deleteLanguage', ['id' => $language->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection