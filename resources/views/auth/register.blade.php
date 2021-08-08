@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width:120%;margin-left:50%">
                <div class="card-header" >{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fa fa-user-plus icon"></i></label>

                            <div class="col-md-6">
                                <input id="name" style="margin-top:13px;" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="User Name" type="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                               
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fa fa-envelope icon"></i></label>

                            <div class="col-md-6">
                                <input id="email" style="margin-top:13px;" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fa fa-key icon"></i></label>

                            <div class="col-md-6">
                                <input id="password" style="margin-top:13px;" placeholder="Password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><i class="	fa fa-check-square-o icon"></i></label>

                            <div class="col-md-6">
                                <input style="margin-top:13px;" id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>



                        <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right"><i class="fa fa-building icon"></i></label><br>
                        
                        <div class="col-md-6">
                                <input id="address" style="margin-top:13px;" placeholder="Address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
