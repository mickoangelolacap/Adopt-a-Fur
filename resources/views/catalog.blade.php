@extends('template')
@section('title', 'Adopt-a-Fur | Fur Babies')

@section('body')

	<section class="container-fluid" id="myTable4">
		
	
	<section class="container p-md-5">
		@if(session('message'))
			<div class="alert alert-warning alert-dismissible mt-4" role="alert">
				{{ session('message') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		{{-- search --}}
		<form class="form-inline my-2">
			<i class="fa fa-search search-icon mx-2 text-warning d-md-block d-none"></i>
	      	<input class="form-control mt-md-0 mt-4" type="text" placeholder="Search" aria-label="Search" id="myInput4">
	    </form>
	    {{-- end search --}}
		<div class="row">
			{{-- card container for pets --}}
			@foreach($pets as $pet)
				@if($pet->stocks == 1)
					<div class="col-lg-4 col-md-6 mt-4 px-4">
						<div class="card cardInside">
							<img class="card-img-top img-fluid" src="{{ asset($pet->image) }}" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">{{ $pet->pet_name }}</h5>
								<span class="card-text">{{ $pet->age }} months old</span>
								<span class="card-text text-muted font-italic"> | {{ $pet->gender }}</span>
								<span class="card-text text-muted font-italic"> | 
									@if($pet->category_id == 1)
									Dog
									@else
									Cat
									@endif
								</span>
								<p class="card-text overflow" data-toggle="tooltip" title="{{ $pet->description }}">{{ $pet->description }}</p>
								<p class="card-text text-success">
									@if($pet->adoption_fee <= 0)
									FREE
									@else
									₱{{ $pet->adoption_fee }}
									@endif
								</p>

								<form action="/shelter" method="POST" class="form-inline">
									@csrf
									<input type="number" name="pet_id" value="{{ $pet->id }}" hidden>
									<input type="text" name="pet_name" value="{{ $pet->pet_name }}" hidden>
									<input type="number" name="quantity" value="{{ $pet->stocks }}" hidden>
									<button type="submit" class="btn btn-warning font-weight-bold shadow btn-block mt-auto">ADOPT</button>			    	
								</form>

							</div>
						</div>
						{{-- end card --}}
					</div>
					{{-- end col --}}
				@endif
			@endforeach
			{{-- end of card container --}}
		</div>
		{{-- end row --}}
	</section>
	{{-- end container --}}

	</section>
	{{-- end container-fluid --}}
	

@endsection