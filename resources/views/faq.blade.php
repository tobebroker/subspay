@extends('layout')
@section('title', 'FAQ')
@section('content')
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
@endsection
