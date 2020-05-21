@extends('layouts.app')
@section('title', 'Adopt-a-Fur | Home')

@section('content')

    <section>
        <div id="geloBG" class="text-center p-5">
            <h1><strong>HI, I'M <i class="text-warning">GELO</i></strong></h1>
            <h1 class="geloFriend p-2">Wanna be Friends?</h1>
            <a class="btn btn-warning shadow px-5" href="/catalog">ADOPT</a>
        </div>
    </section>
    {{-- end gelo --}}

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
    
@endsection
