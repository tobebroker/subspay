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
<div class="container">
    @yield('content')
</div>

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
        toastr.error("{{session()->get('error')}}")
    @endif

    {{--success message--}}
    @if(session()->get('success') !== null and session()->get('success'))
        toastr.success("{{session()->get('message')}}")
    @endif
    {{--end success message--}}
</script>
</body>
</html>
