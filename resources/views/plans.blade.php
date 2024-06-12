@extends('layout')
@section('title', 'Plans')
@section('content')
    <h1 class="heading-1 text-center" style="margin-top: 50px; margin-bottom: 20px">
        Price
    </h1>

    <p class="text text-center" style="margin-bottom: 55px">Choose the perfect plan for you</p>

    <section class="pricing-table">
        <div class="promos">
            <div class="promo first">
                <h4 class="promo-heading heading-5">
                    Basic
                </h4>
                <ul class="features">
                    <li class="price">
                        <div class="sign">$</div>
                        <span class="value">69</span>
                        <span class="promo-text">/month</span>
                    </li>
                    <li>1 Employees</li>
                    <li>50 Customers in CRM</li>
                    <li class="buy w-100">
                        <a href="{{route('payment', ['plan' => 'basic'])}}" class="buy-button white w-100">
                            <span>Get Started With Basic</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="promo second">
                <div class="caption">Most Popular</div>
                <h4 class="promo-heading heading-5">
                    Pro
                </h4>
                <ul class="features">
                    <li class="price">
                        <div class="sign">$</div>
                        <span class="value">2000</span>
                        <span class="promo-text">/month</span>
                    </li>
                    <li>20 Employees</li>
                    <li>10 000 Customers in CRM</li>
                    <li class="buy w-100">
                        <a href="{{route('payment', ['plan' => 'pro'])}}" class="buy-button black w-100">
                            <span>Get Started With Pro</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="promo third">
                <h4 class="promo-heading heading-5">
                    Business
                </h4>
                <ul class="features">
                    <li class="price">
                        <div class="sign">$</div>
                        <span class="value">3500</span>
                        <span class="promo-text">/month</span>
                    </li>
                    <li>Unlimited Employees</li>
                    <li>Unlimited Customers</li>
                    <li class="buy w-100">
                        <a href="{{route('payment', ['plan' => 'business'])}}" class="buy-button white w-100">
                            <span>Get Started With Business</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <h1 class="heading-3 text-center" style="margin-top: 58px; margin-bottom: 60px">
            Compare Features
        </h1>

        <section class="features-section">
            <div class="feature-box">
                <p class="feature-title">
                    Basic
                </p>

                <ul>
                    @foreach($plans['basic']['features'] as $feature)
                        <li>
                            <div class="feature__list-icon"></div>
                            <p class="feature">{{$feature}}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="feature-box">
                <p class="feature-title">
                    Pro
                </p>

                <ul>
                    @foreach($plans['pro']['features'] as $feature)
                        <li>
                            <div class="feature__list-icon"></div>
                            <p class="feature">{{$feature}}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="feature-box">
                <p class="feature-title">
                    Business
                </p>

                <ul>
                    @foreach($plans['business']['features'] as $feature)
                        <li>
                            <div class="feature__list-icon"></div>
                            <p class="feature">{{$feature}}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </section>

    <section class="faq">
        <div class="image"></div>
        <h1 class="heading-1 text-center">
            Subscription FAQs
        </h1>

        <div class="accordion">
            @foreach($faqs as $key => $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{$key}}" aria-expanded="false"
                                aria-controls="collapse-{{$key}}">
                            {{$faq['question']}}
                        </button>
                    </h2>
                    <div id="collapse-{{$key}}" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            {{$faq['answer']}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="contact">
        <div>
            <h1 class="heading-1" style="margin-bottom: 60px">Consult with us</h1>
            <p class="text" style="margin-bottom: 50px">Choose the perfect plan for you</p>
            <a class="contact__button" href="#" target="_blank">Consult</a>
        </div>

        <div class="contact__image"></div>
    </section>
@endsection
