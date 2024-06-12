<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <title>@yield('title')</title>
</head>
<body>
<main style="padding: 0;">
    <nav>
        <a href="{{route('dashboard')}}" class="d-flex align-items-center me-auto text-decoration-none logo">
            <span class="fs-4">
                {{auth()->user()->company_name}}
            </span>
        </a>

        <div class="dropdown">
            <div class="dropdown-toggle user" data-bs-toggle="dropdown"
                 aria-expanded="false">
            </div>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{route('logout')}}">Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex">
        <div class="left-bar">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="link-item">
                    <a href="{{route('dashboard')}}"
                       class="nav-link d-flex align-items-center {{request()->routeIs('dashboard') ? 'active' : '' }}"
                       aria-current="page">
                        <svg class="bi me-2" xmlns="http://www.w3.org/2000/svg" width="14" height="16" fill="none"
                             viewBox="0 0 14 16">
                            <path fill="#000"
                                  d="m13.677 6.764-6.206-5.71a1.063 1.063 0 0 0-1.47.031L.292 6.793 0 7.086V15.5h5.5v-5.25h3v5.25H14V7.061l-.323-.297Zm-6.926-4.99c.009 0 .004.002 0 .006-.004-.004-.009-.006 0-.006ZM13 14.5H9.5v-4.25a1 1 0 0 0-1-1h-3a1 1 0 0 0-1 1v4.25H1v-7l5.751-5.708L13 7.5v7Z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="link-item">
                    <a href="{{route('plans')}}"
                       class="nav-link d-flex align-items-center {{request()->routeIs('plans') ? 'active' : '' }}">
                        <svg class="bi me-2" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none"
                             viewBox="0 0 14 14">
                            <path fill="#000"
                                  d="M7 3a.667.667 0 0 0-.667.667v6.666a.667.667 0 1 0 1.334 0V3.667A.667.667 0 0 0 7 3ZM3.667 7A.667.667 0 0 0 3 7.667v2.666a.667.667 0 1 0 1.333 0V7.667A.667.667 0 0 0 3.667 7Zm6.666-1.333a.667.667 0 0 0-.666.666v4a.667.667 0 1 0 1.333 0v-4a.666.666 0 0 0-.667-.666ZM11.667.333H2.333a2 2 0 0 0-2 2v9.334a2 2 0 0 0 2 2h9.334a2 2 0 0 0 2-2V2.333a2 2 0 0 0-2-2Zm.666 11.334a.667.667 0 0 1-.666.666H2.333a.667.667 0 0 1-.666-.666V2.333a.667.667 0 0 1 .666-.666h9.334a.667.667 0 0 1 .666.666v9.334Z"/>
                        </svg>
                        Plans
                    </a>
                </li>
                <li class="link-item">
                    <a href="{{route('profile')}}"
                       class="nav-link d-flex align-items-center {{request()->routeIs('profile') ? 'active' : '' }}">
                        <svg class="bi me-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none"
                             viewBox="0 0 12 12">
                            <path stroke="#000" stroke-linejoin="round"
                                  d="M.667 10a2.667 2.667 0 0 1 2.666-2.667h5.334A2.667 2.667 0 0 1 11.333 10 1.333 1.333 0 0 1 10 11.333H2A1.333 1.333 0 0 1 .667 10Z"/>
                            <path stroke="#000" d="M6 4.667a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                        </svg>
                        Profile
                    </a>
                </li>
                <li class="link-item">
                    <a href="{{route('faq')}}"
                       class="nav-link d-flex align-items-center {{request()->routeIs('faq') ? 'active' : '' }}">
                        <svg class="bi me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                             viewBox="0 0 16 16">
                            <g clip-path="url(#a)">
                                <path fill="#000"
                                      d="M8 0C6.954 0 6.154.8 6.154 1.846v3.692c0 1.047.8 1.847 1.846 1.847h3.692l2.462 2.461V7.385c1.046 0 1.846-.8 1.846-1.847V1.846C16 .8 15.2 0 14.154 0H8Zm2.577 1.846h1.057l1.04 3.692h-.924l-.25-.923h-.923l-.23.923h-.809l1.04-3.692Zm.5.616c-.062.246-.13.546-.193.73L10.712 4h.73l-.173-.808c-.123-.184-.192-.484-.192-.73Zm-9.23 3.692C.8 6.154 0 6.954 0 8v3.692c0 1.046.8 1.847 1.846 1.847V16l2.462-2.461H8c1.046 0 1.846-.8 1.846-1.847V8H8c-1.17 0-2.096-.8-2.404-1.846h-3.75Zm2.826 1.788c1.046 0 1.539.862 1.539 1.846 0 .862-.296 1.408-.789 1.655.247.123.538.188.846.25l-.23.615c-.431-.123-.878-.315-1.309-.5-.061-.062-.169-.058-.23-.058-.739-.061-1.423-.673-1.423-1.904 0-1.046.612-1.904 1.596-1.904Zm0 .673c-.492 0-.73.554-.73 1.231 0 .739.238 1.23.73 1.23.493 0 .75-.553.75-1.23 0-.677-.257-1.23-.75-1.23Z"/>
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="#fff" d="M0 0h16v16H0z"/>
                                </clipPath>
                            </defs>
                        </svg>
                        FAQ
                    </a>
                </li>
                <li class="link-item">
                    <a href="{{route('contact')}}"
                       class="nav-link d-flex align-items-center {{request()->routeIs('contact') ? 'active' : '' }}">
                        <svg class="bi me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                             viewBox="0 0 16 16">
                            <path stroke="#000" stroke-width="1.333"
                                  d="M.667 1.333h14V12H9.333L4 14.667V12H.667V1.333ZM4 6.667h.667v.666H4v-.666Zm3.333 0H8v.666h-.667v-.666Zm3.334 0h.666v.666h-.666v-.666Z"/>
                        </svg>
                        Contact
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content">
            <div class="container">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <footer>
        <a href="#">Privacy</a>
        <a href="#">Terms</a>
    </footer>
</main>

<script src="{{ asset('js/toastr.min.js') }}"></script>
{{--Toast Messages--}}
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    {{--error message--}}
    @if($errors->any())
    toastr.error("{{$errors->first()}}")
    @endif
    {{--end error message--}}

    {{--error message--}}
    @if(session()->has('error'))
    toastr.success("{{session()->get('error')}}")
    @endif

    {{--success message--}}
    @if(session()->get('success') !== null and session()->get('success'))
    toastr.success("{{session()->get('message')}}")
    @endif
    {{--end success message--}}
</script>
</body>
</html>
