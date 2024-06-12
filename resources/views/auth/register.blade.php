@extends('auth.layout')
@section('title', 'Sign up')
@section('content')
    <div class="row align-items-center" style="height: 100vh">
        <div class="col-6">
            <div class="image"></div>
        </div>

        <div class="col-6 d-flex align-items-center flex-column">
            <h1 class="heading-1" style="margin-bottom: 10px">
                Sign up
            </h1>
            <p class="text" style="margin-bottom: 48px">
                Enter your account details to proceed
            </p>

            <form method="POST" action="{{route('register')}}"
                  class="inputs w-100 d-flex flex-column align-items-center" style="margin-bottom: 32px">
                @csrf
                <div class="input-wrapper w-100" style="margin-bottom: 16px; max-width: 468px">
                    <label for="full_name">Full name</label>
                    <input class="w-100" type="text" id="full_name" name="full_name" value="{{old('full_name', "")}}">
                </div>

                <div class="input-wrapper w-100" style="margin-bottom: 16px; max-width: 468px">
                    <label for="email">Email</label>
                    <input class="w-100" id="email" type="email" name="email" value="{{old('email', "")}}">
                </div>

                <div class="input-wrapper w-100" style="margin-bottom: 16px; max-width: 468px">
                    <label for="company_name">Company name</label>
                    <input class="w-100" id="company_name" type="text" name="company_name"
                           value="{{old('company_name', "")}}">
                </div>

                <div class="input-wrapper w-100" style="margin-bottom: 16px; max-width: 468px">
                    <label for="password">Set your password</label>
                    <input class="w-100" id="password" type="password" name="password">
                </div>

                <div class="input-wrapper w-100" style="margin-bottom: 25px; max-width: 468px">
                    <label for="password_confirmation">Confirm your password</label>
                    <input id="password_confirmation" class="w-100" type="password" name="password_confirmation">
                </div>

                <div class="input-wrapper w-100 checkbox" style="margin-bottom: 24px; max-width: 468px">
                    <input type="checkbox" style="margin-right: 16px">
                    <label>I accept Terms and Privacy Policy.</label>
                </div>

                <input class="button w-100" type="submit" value="Join now" style="max-width: 468px">
            </form>

            <p class="text">
                Already a member? <a href="{{route('login.form')}}">Sign in</a>
            </p>
        </div>
    </div>
@endsection
