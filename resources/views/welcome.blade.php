<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">

        <title>Adopt-a-Fur</title>

        {{-- Bootstrap CSS CDN --}}
        <!-- Latest compiled and minified CSS -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        {{-- Google fonts --}}
        <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Source+Sans+Pro&display=swap" rel="stylesheet">

        <!-- fav icon -->
        <link rel="icon" href="{{ asset('icon.png') }}">

        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/337361c529.js" crossorigin="anonymous"></script>

        <!-- External CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">

    </head>
    <body>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('icon.png') }}" width="40" height="40" class="d-inline-block align-top mx-1" alt="">
                    Adopt-a-Fur
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a class="nav-link" href="/">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#whyAdopt">{{ __('About') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">{{ __('Contact') }}</a>
                            </li>
                            <li class="nav-item bg-warning rounded-lg">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Adopt Now') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">{{ __('News Feed') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/home">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/catalog">{{ __('Fur Babies') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/shelter">{{ __('Shelter') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/pet/form">{{ __('Rescue') }}</a>
                            </li>

                            <li class="nav-item dropdown bg-warning rounded">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/orders">{{ __('History') }}</a>

                                    <a class="dropdown-item" href="/pet/list">{{ __('Admin') }}</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- end navbar --}}

        <div class="container-fluid">

            <section id="welcome">
                <div class="row welcomeBG">
                    <div class="col-lg-7 offset-lg-5 p-5 text-center">
                        <div class="center-vertical">
                            <h1 class="" id="welcomeHead">Adopt-a-Fur</h1>
                            <h3  class="mt-4">Find the right Fur Baby for you!</h3>
                            <a href="#whyAdopt" class="btn btn-warning shadow px-5 px-md-4 m-2">Learn more</a>
                            <a href="{{ route('login') }}" class="btn btn-outline-warning shadow px-4">Join our community</a>
                        </div>
                    </div>
                    {{-- end col --}}
                </div>
                {{-- end row --}}
            </section>
            {{-- end welcome --}}

            <section id="whyAdopt">
                <div class="row whyAdoptBG">
                    {{-- end col --}}
                    <div class="col-lg-5 offset-lg-5 pr-md-5 offset-md-3">
                        <div class="whyPosition">
                            <h1 class="" id="whyAdoptHead">Why Adopt?</h1>
                            <p class="pr-md-5 pt-md-2 p-2 text-justify">By adopting from a shelter, you are providing an animal with the second chance they deserve. Studies have shown that having pet can elongate your life, whilst improving your overall happiness and health. Also the prices of adopting a pet from a shelter are often a lot lower than the rates charged by breeders. A pet is a companion that will never judge you, will love you regardless of whatever happens and will always be there.</p>
                        </div>
                        <div class="row mt-5 whyPosition">
                            <div class="col-6 text-center">
                                <img class="img-fluid" src="{{ asset('life.png') }}">
                                <span class="lead">SAVE LIFE</span>
                            </div>
                            {{-- end col --}}
                            <div class="col-6 text-center">
                                <img class="img-fluid" src="{{ asset('money.png') }}">
                                <span class="lead">SAVE MONEY</span>
                            </div>
                            {{-- end col --}}
                            <div class="col-6 text-center">
                                <img class="img-fluid" src="{{ asset('happy.png') }}">
                                <span class="lead">BE HAPPIER</span>
                            </div>
                            {{-- end col --}}
                            <div class="col-6 text-center">
                                <img class="img-fluid" src="{{ asset('love.png') }}">
                                <span class="lead">BE LOVED</span>
                            </div>
                            {{-- end col --}}
                        </div>
                        {{-- end row --}}
                    </div>
                    {{-- end col --}}
                </div>
                {{-- end row --}}
            </section>
            {{-- end whyAdopt --}}

            <section id="howAdopt">
                <div class="row howAdoptBG">
                    <div class="col-lg-5 offset-lg-2 col-md-9">
                        <div class="howPosition ml-md-5">
                            <h1 class="" id="howAdoptHead">How It Works?</h1>
                            <p class="px-3 text-justify">As a Fur Parent, you both have the privilege to request to <i>RESCUE</i> or to <i>ADOPT</i> a pet. Once done, your request will be sent to the administrator as a <strong>PENDING STATUS</strong>. Once the administrator approves your request, you will undergo a <strong>SCREENING PROCESS</strong> and once you passed, you will be scheduled for <strong>PICK UP</strong>.</p>
                        </div>
                        <div class="row mt-5 ml-lg-0 ml-5 howPosition2">
                            <div class="col-lg-4">
                                <img class="img-fluid" src="{{ asset('pending.png') }}">
                                <span class="lead">REQUEST</span>
                            </div>
                            {{-- end col --}}
                            <div class="col-lg-4">
                                <img class="img-fluid" src="{{ asset('screening.png') }}">
                                <span class="lead">SCREEN</span>
                            </div>
                            {{-- end col --}}
                            <div class="col-lg-4">
                                <img class="img-fluid" src="{{ asset('pickup.png') }}">
                                <span class="lead">ADOPT</span>
                            </div>
                            {{-- end col --}}
                        </div>
                        {{-- end row --}}
                    </div>
                </div>
                {{-- end row --}}
            </section>
            {{-- end howAdopt --}}

            <section>
                <div id="geloBG" class="text-center p-5">
                    <h1 class="pt-5"><strong>HI, I'M <i class="text-warning">GELO</i></strong></h1>
                    <h1 class="geloFriend p-2">Wanna be Friends?</h1>
                    <a class="btn btn-warning shadow px-5" href="{{ route('login') }}">ADOPT</a>
                </div>
            </section>
            {{-- end gelo --}}

            <section id="contact">
                <div class="row contactBG">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="contactPosition ml-md-5 px-3">
                            <a class="navbar-brand text-dark" href="{{ url('/') }}">
                                <h1 class="" id="contactHead">Adopt-a-Fur</h1>
                            </a>
                            <div class="row p-md-2 mb-md-4">
                                <div class="col-4">
                                    <span class="lead">About</span>
                                    <p class="">Adop-a-Fur is a pet adoption web app that aims to create a community for animals.</p>
                                </div>
                                {{-- end col --}}
                                <div class="col-4">
                                    <span class="lead">Disclaimer</span>
                                    <p class="">This website is for educational purposes only and not for commercial use.</p>
                                </div>
                                {{-- end col --}}
                                <div class="col-4">
                                    <span class="lead">Contact</span>
                                    <p>+639568720280</p>
                                </div>
                                {{-- end col --}}
                            </div>
                            {{-- end row --}}
                            <span class="ml-md-5 pl-md-5 footer">
                                Micko Angelo Lacap | Zuitt Coding Bootcamp &copy; 2020
                            </span>
                            <span class="social-media p-md-3">
                                <a href="https://www.facebook.com/mickoangelolacap" target="_blank">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
                                <a href="https://www.instagram.com/mickoangelolacap/" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://www.twitter.com/angelolacap" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a> 
                                <a href="https://www.linkedin.com/in/mickoangelolacap" target="_blank">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="https://gitlab.com/mickoangelolacap" target="_blank">
                                    <i class="fab fa-gitlab"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    {{-- end col --}}
                </div>
                {{-- end row --}}
            </section>
            {{-- end contact --}}


        </div>
        {{-- end container fluid --}}



        {{-- External JS --}}
        <script src="{{ asset('script.js') }}"></script>

        {{-- Bootstrap JS CDN --}}
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    </body>
</html>
