@extends('layout')
@section('title', 'Dashboard')
@section('content')
    <h1 class="heading-1" style="margin-bottom: 30px">
        Dashboard
    </h1>

    <section class="custom-card" style="margin-bottom: 35px">
        <div class="custom-card__title">
            <h2 class="heading-2">Subscription Overview</h2>
        </div>

        <div class="info-items row">
            <div class="info-item col-3">
                <div class="info-item__icon"></div>
                <div class="info-item__title">Active employees</div>
                <div class="info-item__value">12</div>
                <a class="info-item__button" href="{{route('plans')}}">Upgrade</a>
            </div>

            <div class="info-item col-3">
                <div class="info-item__icon"></div>
                <div class="info-item__title">Active clients</div>
                <div class="info-item__value">1117</div>
                <a class="info-item__button" href="{{route('plans')}}">Upgrade</a>
            </div>

            <div class="info-item col-3">
                <div class="info-item__icon"></div>
                <div class="info-item__title">My plan</div>
                <div class="info-item__value">Pro</div>
                <a class="info-item__button" href="{{route('plans')}}">Upgrade</a>
            </div>
        </div>
    </section>

    <section class="custom-card" style="margin-bottom: 35px">
        <div class="custom-card__title">
            <h2 class="heading-2">Plan Activity</h2>
        </div>

        <div class="custom-card__table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><span class="text">Activity Date</span></th>
                    <th scope="col"><span class="text">Plan Type</span></th>
                    <th scope="col"><span class="text">Employees</span></th>
                    <th scope="col"><span class="text">Clients</span></th>
                    <th scope="col"><span class="text">Price</span></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">
                        <span class="text">21 Mar - 21 Apr</span>
                    </th>
                    <td>
                        <span class="text rounded-bg">Pro</span>
                    </td>
                    <td>
                        <span class="text rounded-bg">20</span>
                    </td>
                    <td>
                        <span class="text rounded-bg">1000</span>
                    </td>
                    <td>
                        <span class="text rounded-bg">200$/m</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="custom-card">
        <div class="custom-card__title">
            <h2 class="heading-2">Subscription Plans</h2>
        </div>

        <div class="custom-card__table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><span class="text">Plan</span></th>
                    <th scope="col"><span class="text">Employees</span></th>
                    <th scope="col"><span class="text">Customers</span></th>
                    <th scope="col"><span class="text">Price</span></th>
                </tr>
                </thead>
                <tbody>
                @foreach($plans as $key => $plan)
                    <tr>
                        <th scope="row">
                            <span class="text">{{$plan['name']}}</span>
                        </th>
                        <td>
                            <span class="text rounded-bg">{{$plan['employees']}}</span>
                        </td>
                        <td>
                            <span class="text rounded-bg">{{$plan['customers']}}</span>
                        </td>
                        <td>
                            <span class="text rounded-bg">{{$plan['price']}}/m</span>
                        </td>
                        <td>
                            <a href="{{route('payment', ['plan' => $plan['id']])}}" class="text rounded-bg" style="cursor: pointer">Select</a>
                        </td>
                        <td>
                            <a href="{{route('plans')}}" class="text rounded-bg" style="cursor: pointer">More Details</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
