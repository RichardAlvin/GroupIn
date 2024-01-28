@extends('FE.layout.auth')

@section('title')
<title>GroupIn - SignUp</title>
@endsection

@section('container')
<section class="auth">
    <div class="auth-left">
       <h1>SignUp To GroupIn<h1> 
    </div>
    <div class="auth-right">
        <div class="auth-right-wrapper">
            <form action="/signup" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="@error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Input Name..." value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="@error('email') is-invalid @enderror" type="text" id="email" name="email" placeholder="Input Email..." value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="@error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Input Password...">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password...">
                </div>
                <div class="form-btn">
                    <button class="btn btn-success">Sign In</button>
                </div>
                <div class="link-btn">
                    <a href="/login">already have an account?</a>
                    <a href="/forgot-pass">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection