<!doctype html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{config('app.name')}}</title>

    @livewireStyles

</head>
<body>

{{-- Header Section --}}
<header class="">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pb-4 pb-md-3 ">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <i class="bi bi-wallet2 mx-1"></i>
                {{config('app.name')}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-3 mb-lg-0 gap-2">
                    @auth
                        @if(auth()->user()->role)
                            <li class="nav-item ">
                                <a class="nav-link " aria-current="page" href="{{route('admin.index')}}">
                                    {{__('Registered Users')}}
                                </a>
                            </li>
                        @else
                            <li class="nav-item ">
                                <a class="nav-link " aria-current="page" href="{{route('transactions.create')}}">
                                    {{__('New Transaction')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('wallet.show')}}">
                                    {{__('Wallet Transactions')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('user.referrals')}}">
                                    {{__('Users')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('wallet.chart')}}">
                                    {{__('Daily Charts')}}
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>

                @guest
                    <div class="d-flex gap-3 ">
                        <a href="{{route('login')}}" class="nav-link text-white">{{__('Login')}}</a>
                        <a href="{{route('register')}}" class="nav-link text-white">{{__('Register')}}</a>
                    </div>
                @endguest

                @auth
                    <ul class="navbar-nav mt-1">
                        <li class="nav-item dropdown d-flex align-items-center">
                            <img class="rounded-circle  -sm" width="25" height="25"
                                 src="{{asset(auth()->user()->profile_image)}}" alt="user image">
                            <a class="nav-link dropdown-toggle mx-1" href="#" id="navbarDarkDropdownMenuLink"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{auth()->user()->name}}
                            </a>
                            <ul class="dropdown-menu dropdown-menu dropdown-menu-start dropdown-menu-md-end"
                                aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{route('logout')}}">
                                        <i class="bi bi-box-arrow-in-left"></i>
                                        {{__('Logout')}}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endauth

            </div>
        </div>
    </nav>

    {{-- Session Message --}}
    <x-alert></x-alert>

</header>

{{-- Main Section --}}
<main class="container py-5 min-vh-100">
    @auth
        <button onclick="copyToClipBoard(`{{route('register')}}/{{auth()->user()->referral_link}}`)" class="btn btn-primary mb-3 ">Copy Your Link</button>
    @endauth

    @yield('content')
</main>

{{-- Footer Section--}}
<footer class="bottom-0 bg-dark p-4">
    <div class="text-center text-white">
        {{__(' Copyright © 2021 All Rights Reserved @')}} <span class="fw-bold">{{config('app.name')}}</span>
    </div>
</footer>
<script type="text/javascript">
    function copyToClipBoard(link) {

        navigator.clipboard.writeText(link);
    }
</script>
<script src="{{asset('js/app.js')}}"></script>
@livewireScripts

</body>
</html>
