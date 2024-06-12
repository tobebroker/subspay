@extends('layout')
@section('title', 'Payment')
@section('content')
    <div class="back">
        <span class="back-icon"></span>
        <a href="{{ url()->previous() ?: url('/') }}" class="back-button"></a>
    </div>

    <h1 class="heading-1" style="margin-top: 30px">
        Selected Plan: {{$plan['name']}}
    </h1>

    <p class="text" style="margin-bottom: 55px">Selected on {{date('d/m/Y')}} at {{date('H:i')}}</p>

    <p class="heading-2" style="margin-bottom: 25px">Total Amount: ${{$plan['price']}}</p>

    <div class="line"></div>

    <section class="payment">
        <form action="{{route('payment.process')}}" method="POST">
            @csrf
            <input type="text" name="plan" value="{{$plan['id']}}" hidden="">
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut beatae et exercitationem
                facilis provident qui sint tenetur voluptatibus. Accusamus autem enim harum hic nemo odit, officia
                provident quibusdam quo rerum!
            </p>

            <div class="payment-input-wrapper align-items-center">
                <div>
                    <label>Something input</label>
                </div>
                <div>
                    <input type="text">
                </div>
            </div>

            <div class="payment-input-wrapper">
                <div>
                    <label>Additional Note</label>
                </div>
                <div>
                    <textarea placeholder="Add notes here" name="note">{{old('note', '')}}</textarea>

                    <div class="buttons">
                        <button type="submit">Confirm Payment</button>
                        <a href="{{route('plans')}}" style="font-weight: lighter">Cancel Payment</a>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
