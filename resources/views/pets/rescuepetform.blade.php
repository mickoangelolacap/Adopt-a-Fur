@extends('template')
@section('title', 'Adopt-a-Fur | Rescue Pet')

@section('body')

<div class="container-fluid">

	{{-- Validation Error response --}}
		@if($errors->any())
			<div class="alert alert-danger alert-dismissible mt-5 mx-5 p-5">
				<ul>
					@foreach($errors->all() as $error)
					<li> {{ $error }} </li>
					@endforeach
				</ul>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

		@if(session('message'))
			<div class="alert alert-warning alert-dismissible mt-5 mx-5" role="alert">
				{{ session('message') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

	<div class="row p-md-5 mb-lg-5 rescueBG">
		<div class="col-lg-6 p-5">
			<form action="/pet/form/rescue" method="POST" enctype="multipart/form-data">
				@csrf

				<div class="form-group">
					<label for=""> Fur Baby Name </label>
					<input type="text" name="pet_name" class="form-control" placeholder="Pet name">
				</div>

				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label for=""> Age </label>
							<input type="number" name="pet_age" class="form-control" placeholder="Months">
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							<label for=""> Gender </label>
							<select name="pet_gender" class="form-control" id="">
								<option value="" disabled selected> Is your Fur Baby Male or Female? </option>
								<option value="Male"> Male </option>
								<option value="Female"> Female </option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for=""> Breed </label>
					<select name="pet_category" class="form-control" id="">
						<option value="" disabled selected> Is your Fur Baby a Dog or a Cat? </option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">
								{{ $category->category_name }}
							</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for=""> Description </label>
					<textarea name="pet_description" class="form-control" placeholder="Please describe how lovely your pet is."></textarea>
				</div>

				<div class="form-group">
					<label for=""> Adoption Fee: </label>
					<input type="number" name="pet_fee" class="form-control" placeholder="If you wish to adopt your pet for free, please input '0'">
					<small id="" class="form-text text-warning">10% of the adoption fee will proceed to PAWS.</small>
				</div>

				<div class="form-group">
					<label for=""> Upload Image: </label>
					<input type="file" name="pet_image" class="form-control p-1">
				</div>

				<button type="submit" class="btn btn-warning btn-block font-weight-bold px-5 mt-5 shadow"> Submit </button>

			</form>

		</div>
		{{-- end col --}}
		<div class="col-lg-6 text-center p-5">
			<img src="{{ asset('rescue.png') }}" class="img-fluid">
		</div>
		{{-- end col --}}
	</div>
	{{-- end row --}}
</div>
{{-- end container --}}

@endsection