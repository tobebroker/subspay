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
                    <a class="dropdown-item" href="{{route('logout')}}">Profile</a>
                </li>
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
