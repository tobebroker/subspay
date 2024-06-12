@extends('auth.layout')
@section('title', 'Sign in')
@section('content')
    <div class="row align-items-center" style="height: 100vh">
        <div class="col-6">
            <div class="image"></div>
        </div>

        <div class="col-6 d-flex align-items-center flex-column">
            <h1 class="heading-1" style="margin-bottom: 10px">
                Sign in
            </h1>
            <p class="text" style="margin-bottom: 48px">
                Enter your account details to proceed
            </p>

            <form method="POST" action="{{route('login')}}" class="inputs w-100 d-flex flex-column align-items-center"
                  style="margin-bottom: 32px">
                @csrf
                <div class="input-wrapper w-100" style="margin-bottom: 16px; max-width: 468px">
                    <label for="email">Email</label>
                    <input class="w-100" id="email" type="email" name="email" value="{{old('email', "")}}">
                </div>


                <div class="input-wrapper w-100" style="margin-bottom: 25px; max-width: 468px">
                    <label for="password">Password</label>
                    <input class="w-100" id="password" type="password" name="password">
                </div>

                <input class="button w-100" type="submit" value="Log in" style="max-width: 468px">
            </form>

            <p class="text">
                Not a member? <a href="{{route('register.form')}}">Sign up</a>
            </p>
        </div>
    </div>
@endsection
