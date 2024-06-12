@extends('layout')
@section('title', 'Payment')
@section('content')
    <section class="success-payment d-flex align-items-center justify-content-center flex-column">
        <div class="d-flex align-items-center flex-column">
            <div class="success-payment-image"></div>
            <p class="main-text">Thank you for choosing SubsPay!</p>
            <p class="secondary-text">Your payment is being processed and you'll receive a confirmation shortly.</p>
        </div>

        <a href="{{route('dashboard')}}">
            Manage Account
        </a>
    </section>
@endsection
