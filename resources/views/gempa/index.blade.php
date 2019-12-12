@extends('layouts.simple')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                KuyOngkir
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main id="main-container">
        <div class="container mt-50">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h4 class="mb-5">Gempa Terakhir (BMKG)</h4>
                    <hr>

                    @foreach($gempas as $gempa)

                        <a href="{{ route('gempa.ongkir', ['lat'=>$gempa['latitude'], 'lon'=>$gempa['longitude']]) }}"
                           class="list-gempa text-black-50" style="text-decoration: none">
                            <div class="row">
                                <div class="col">
                                    <h5>{{ $gempa['tanggal'] }}</h5>
                                </div>
                                <div class="col-auto">
                                    <h5>{{ $gempa['jam'] }}</h5>
                                </div>
                            </div>
                            <span class="row mt-2">
                                <span class="col text-black">
                                    <h6>{{ $gempa['dirasakan'] }}</h6>
                                </span>
                                <span class="col-auto">
                                    <h6>Kedalaman:</h6>
                                </span>
                            </span>
                            <span class="row">
                                <span class="col text-black">
                                    <h1><b>{{ $gempa['magnitude'] }}</b> R</h1>
                                </span>
                                <span class="col-auto text-black">
                                    <h1>{{ $gempa['kedalaman'] }} km</h1>
                                </span>
                            </span>
                        </a>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
