@extends('template')
@section('title', 'Adopt-a-Fur | Shelter')

@section('body')

	<div class="container-fluid">
		@if(session('message'))
			<div class="alert alert-warning alert-dismissible mx-md-5 mt-4" role="alert">
				{{ session('message') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		<div class="row shelterBG p-md-5 p-4">
			<div class="col-lg-6 shelterOverflow">
				<div class="row">
					@if($pet_shelter != null)
						@foreach($pet_shelter as $pet)
							<div class="col-md-6 mt-4 px-4">
								<div class="card cardInside">
								  <img class="card-img-top img-fluid" src="{{ asset($pet->image) }}" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">{{ $pet->pet_name }}</h5>
								    <span class="card-text">{{ $pet->age }} months old</span>
								    <span class="card-text">{{ $pet->gender }}</span>
								    <p class="card-text overflow">{{ $pet->description }}</p>
								    <p class="card-text text-success">
								    	@if($pet->adoption_fee <= 0)
											FREE
										@else
											₱{{ $pet->adoption_fee }}
										@endif
								    </p>
								    <form action="/shelter/{{ $pet->id }}" method="POST">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger btn-block" type="submit">Remove</button>
									</form>
								  </div>
								</div>
								{{-- end card --}}
							</div>
							{{-- end col --}}
						@endforeach

						<div class="col-12 pt-5 pb-2">
							<h2 class="text-warning font-weight-bold taf">Total Adoption Fee :
								@if($total <= 0)
									FREE
								@else
									₱ {{ $total }}
								@endif
							</h2>
						</div>
						<div class="col-md-12">
							<span class="d-md-flex">
								<a href="/clearshelter" class="btn btn-danger font-weight-bold px-4 mr-2">Clear Cart</a>
								<form action="/orders" method="POST">
									@csrf
									<button type="submit" class="btn btn-warning btn-block font-weight-bold px-4">Submit Request</button>
								</form>
							</span>
						</div>
					@else
						<div class="jumbotron mx-auto mt-5 d-md-block d-none">
							<h1 class="display-4">Your shelter is empty!</h1>
							<p class="lead">
								Wanna be friends with some?
							</p>
							<a href="/catalog" class="btn btn-warning shadow btn-lg">See Fur Babies</a>
						</div>
						{{-- end jumbotron --}}
					@endif

				</div>
				{{-- end row --}}
			</div>
			{{-- end col --}}

			@if($pet_shelter == null)
				<div class="jumbotron mx-auto mt-5 d-md-none d-block">
					<h1 class="display-4">Your shelter is empty!</h1>
					<p class="lead">
						Wanna be friends with some?
					</p>
					<a href="/catalog" class="btn btn-warning btn-block shadow btn-lg">See Fur Babies</a>
				</div>
				{{-- end jumbotron --}}
			@endif

			<div class="col-lg-6 text-center mt-lg-4 mt-5 p-md-5">
				<img src="{{ asset('shelter.png') }}" class="img-fluid">
			</div>
			{{-- end col --}}
		</div>
		{{-- end row --}}
	</div>
	{{-- end container-fluid --}}

@endsection