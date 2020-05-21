@extends('template')
@section('title', 'Adopt-a-Fur | Pet Lists')

@section('body')

	<nav class="navbar navbar-expand-md d-md-none d-block navbar-light bg-white shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navtab" aria-controls="navtab" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navtab">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                	<nav>
						<div class="nav d-flex flex-column" id="nav-tab" role="tablist">
							<a class="nav-item nav-link mx-0 px-4 text-secondary active" id="rescue" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Request for Rescue</a>
							<a class="nav-item nav-link mx-0 px-4 text-secondary" id="adoption" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Request for Adoption</a>
							<a class="nav-item nav-link mx-0 px-4 text-secondary" id="screening" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Adoption Screening</a>
							<a class="nav-item nav-link mx-0 px-4 text-secondary" id="records" data-toggle="tab" href="#nav-record" role="tab" aria-controls="nav-contact" aria-selected="false">Fur Babies Records</a>
							<a class="nav-item nav-link mx-0 px-4 text-secondary" id="restore" data-toggle="tab" href="#nav-restore" role="tab" aria-controls="nav-contact" aria-selected="false">Restore</a>
						</div>
					</nav>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                   
                </ul>
            </div>
        </div>
    </nav>
    {{-- end navbar --}}
	
	<div class="container-fluid p-md-5">
		@if(session('message'))
			<div class="alert alert-warning alert-dismissible" role="alert">
				{{ session('message') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		{{-- Request for rescue --}}

		<nav class="d-md-block d-none">
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link mx-0 px-4 text-secondary active" id="rescue" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Request for Rescue</a>
				<a class="nav-item nav-link mx-0 px-4 text-secondary" id="adoption" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Request for Adoption</a>
				<a class="nav-item nav-link mx-0 px-4 text-secondary" id="screening" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Adoption Screening</a>
				<a class="nav-item nav-link mx-0 px-4 text-secondary" id="records" data-toggle="tab" href="#nav-record" role="tab" aria-controls="nav-contact" aria-selected="false">Fur Babies Records</a>
				<a class="nav-item nav-link mx-0 px-4 text-secondary" id="restore" data-toggle="tab" href="#nav-restore" role="tab" aria-controls="nav-contact" aria-selected="false">Restore</a>
			</div>
		</nav>

		{{-- <nav class="d-md-none d-block smallTabs">
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link mx-0 text-secondary active" id="rescue" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Rescue</a>
				<a class="nav-item nav-link mx-0 text-secondary" id="adoption" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Adoption</a>
				<a class="nav-item nav-link mx-0 text-secondary" id="screening" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Screening</a>
				<a class="nav-item nav-link mx-0 text-secondary" id="records" data-toggle="tab" href="#nav-record" role="tab" aria-controls="nav-contact" aria-selected="false">Records</a>
				<a class="nav-item nav-link mx-0 text-secondary" id="restore" data-toggle="tab" href="#nav-restore" role="tab" aria-controls="nav-contact" aria-selected="false">Restore</a>
			</div>
		</nav> --}}
		<div class="tab-content" id="nav-tabContent">

			{{-- Rescue --}}
			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="rescue">
				<div class="row my-5 adminBG">
					<div class="offset-lg-2 col-lg-8 text-center">
						<h1 class="adminHead">Request for Rescue</h1>
						{{-- search --}}
						<form class="form-inline my-4">
							<i class="fa fa-search search-icon d-md-block d-none mx-2 text-warning"></i>
					      	<input class="form-control" type="text" placeholder="Search" aria-label="Search" id="myInput1">
					    </form>
					    {{-- end search --}}
					    <div class="tableOverflow">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th scope="col">
											<form action="/pet/list" method="GET" id="myForm">
												@csrf
												<select class="rounded border-0 font-weight-bold" name="by_name" onchange="this.form.submit()">
													<option disabled selected>Fur Baby</option>
													<option value="asc">A - Z</option>
													<option value="desc">Z - A</option>
												</select>
											</form>
										</th>
										<th scope="col">Pet Name</th>
										<th scope="col">Age</th>
										<th scope="col">Gender</th>
										<th scope="col">Category</th>
										<th scope="col">Description</th>
										<th scope="col">Adopt-Fee</th>
										<th scope="col">Requests</th>
									</tr>
								</thead>
								<tbody id="myTable1">

									@foreach($pets as $pet)
										@if($pet->stocks == 0)
											<tr>
												{{-- image --}}
												<th>
													<img src="{{ asset($pet->image) }}" class="img-fluid rounded" style="width: 120px; height: 100px;">
												</th>
												{{-- name --}}
												<td>{{ $pet->pet_name }}</td>
												{{-- age --}}
												<td>{{ $pet->age }} month/s</td>
												{{-- gender --}}
												<td>{{ $pet->gender }}</td>
												{{-- category --}}
												<td>
													@if($pet->category_id == 1)
														Dog
													@else
														Cat
													@endif
												</td>
												{{-- description --}}
												<td style="word-wrap: break-word;">{{ $pet->description }}</td>
												{{-- fee --}}
												<td>
													@if($pet->adoption_fee <= 0)
														FREE
													@else
														₱{{ $pet->adoption_fee }}
													@endif
												</td>
												{{-- Action --}}
												<td>
													<span class="">
															<a href="/pet/rescue/approve/{{ $pet->id }}/{{ $pet->pet_name }}" class="btn btn-warning font-weight-bold my-1"> Approve </a>
															<a href="/pet/rescue/deny/{{ $pet->id }}/{{ $pet->pet_name }}" class="btn btn-danger font-weight-bold px-4"> Deny </a>
													</span>
												</td>
											</tr>
										@endif
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
					{{-- end col --}}
				</div>
				{{-- end row --}}
			</div>
			{{-- end rescue --}}

			{{-- Adoption --}}
			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="adoption">
				<div class="row my-5 adminBG">
					<div class="offset-lg-2 col-lg-8 text-center">
						<h1 class="adminHead">Request for Adoption</h1>
						{{-- search --}}
						<form class="form-inline my-4">
							<i class="fa fa-search search-icon d-md-block d-none mx-2 text-warning"></i>
					      	<input class="form-control" type="text" placeholder="Search" aria-label="Search" id="myInput2">
					    </form>
					    {{-- end search --}}
					    <div class="tableOverflow">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th scope="col">
											<form action="/pet/list" method="GET" id="myForm">
												@csrf
												<select class="rounded border-0 font-weight-bold" name="by_name" onchange="this.form.submit()">
													<option disabled selected>Fur Baby</option>
													<option value="asc">A - Z</option>
													<option value="desc">Z - A</option>
												</select>
											</form>
										</th>
										<th scope="col">Pet Name</th>
										<th scope="col">Age</th>
										<th scope="col">Gender</th>
										<th scope="col">Category</th>
										<th scope="col">Description</th>
										<th scope="col">Adopt-Fee</th>
										<th scope="col">Requests</th>
									</tr>
								</thead>
								<tbody id="myTable2">

									@foreach($pets as $pet)
										@if($pet->stocks == 2)
											<tr>
												{{-- image --}}
												<th>
													<img src="{{ asset($pet->image) }}" class="img-fluid rounded" style="width: 120px; height: 100px;">
												</th>
												{{-- name --}}
												<td>{{ $pet->pet_name }}</td>
												{{-- age --}}
												<td>{{ $pet->age }} month/s</td>
												{{-- gender --}}
												<td>{{ $pet->gender }}</td>
												{{-- category --}}
												<td>
													@if($pet->category_id == 1)
														Dog
													@else
														Cat
													@endif
												</td>
												{{-- description --}}
												<td style="word-wrap: break-word;">{{ $pet->description }}</td>
												{{-- fee --}}
												<td>
													@if($pet->adoption_fee <= 0)
														FREE
													@else
														₱{{ $pet->adoption_fee }}
													@endif
												</td>
												{{-- Action --}}
												<td>
													<span class="">
															<a href="/pet/adoption/approve/{{ $pet->id }}/{{ $pet->pet_name }}" class="btn font-weight-bold btn-warning my-1"> Approve </a>
															<a href="/pet/adoption/deny/{{ $pet->id }}/{{ $pet->pet_name }}" class="btn font-weight-bold btn-danger px-4"> Deny </a>
													</span>
												</td>
											</tr>
										@endif
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
					{{-- end col --}}
				</div>
				{{-- end row --}}
			</div>
			{{-- end adoption --}}

			{{-- Screening --}}
			<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="screening">
				<div class="row my-5 adminBG">
					<div class="offset-lg-2 col-lg-8 text-center">
						<h1 class="adminHead">Adoption Screening</h1>
						{{-- search --}}
						<form class="form-inline my-4">
							<i class="fa fa-search search-icon d-md-block d-none mx-2 text-warning"></i>
					      	<input class="form-control" type="text" placeholder="Search" aria-label="Search" id="myInput3">
					    </form>
					    {{-- end search --}}
					    <div class="tableOverflow">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th scope="col">
											<form action="/pet/list" method="GET" id="myForm">
												@csrf
												<select class="rounded border-0 font-weight-bold" name="by_name" onchange="this.form.submit()">
													<option disabled selected>Fur Baby</option>
													<option value="asc">A - Z</option>
													<option value="desc">Z - A</option>
												</select>
											</form>
										</th>
										<th scope="col">Pet Name</th>
										<th scope="col">Age</th>
										<th scope="col">Gender</th>
										<th scope="col">Category</th>
										{{-- <th scope="col">Description</th> --}}
										<th scope="col">Adopt-Fee</th>
										<th scope="col">Result</th>
									</tr>
								</thead>
								<tbody id="myTable3">

									@foreach($pets as $pet)
										@if($pet->stocks == 3)
											<tr>
												{{-- image --}}
												<th>
													<img src="{{ asset($pet->image) }}" class="img-fluid rounded" style="width: 120px; height: 100px;">
												</th>
												{{-- name --}}
												<td>{{ $pet->pet_name }}</td>
												{{-- age --}}
												<td>{{ $pet->age }} month/s</td>
												{{-- gender --}}
												<td>{{ $pet->gender }}</td>
												{{-- category --}}
												<td>
													@if($pet->category_id == 1)
														Dog
													@else
														Cat
													@endif
												</td>
												{{-- description --}}
												{{-- <td style="word-wrap: break-word;">{{ $pet->description }}</td> --}}
												{{-- fee --}}
												<td>
													@if($pet->adoption_fee == 0)
														FREE
													@else
														₱{{ $pet->adoption_fee }}
													@endif
												</td>
												{{-- Action --}}
												<td>
													<span class="">
															<a href="/pet/adoption/passed/{{ $pet->id }}/{{ $pet->pet_name }}" class="btn font-weight-bold btn-warning my-1"> Passed </a>
															<a href="/pet/adoption/failed/{{ $pet->id }}/{{ $pet->pet_name }}" class="btn font-weight-bold btn-danger px-3"> Failed </a>
													</span>
												</td>
											</tr>
										@endif
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
					{{-- end col --}}
				</div>
				{{-- end row --}}
				{{-- end screening --}}
			</div>
			{{-- end screening --}}

			{{-- Records --}}
			<div class="tab-pane fade" id="nav-record" role="tabpanel" aria-labelledby="records">
				<div class="row my-5 adminBG">
					<div class="offset-lg-2 col-lg-8 text-center">
						<h1 class="adminHead">Fur Babies Records</h1>
						{{-- search --}}
						<form class="form-inline my-4">
							<i class="fa fa-search search-icon d-md-block d-none mx-2 text-warning"></i>
					      	<input class="form-control" type="text" placeholder="Search" aria-label="Search" id="myInput">
					    </form>
					    {{-- end search --}}
					    <div class="tableOverflow">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th scope="col">
											<form action="/pet/list" method="GET" id="myForm">
												@csrf
												<select class="rounded border-0 font-weight-bold" name="by_name" onchange="this.form.submit()">
													<option disabled selected>Fur Baby</option>
													<option value="asc">A - Z</option>
													<option value="desc">Z - A</option>
												</select>
											</form>
										</th>
										<th scope="col">Category</th>
										<th scope="col">Gender</th>
										<th scope="col">Age</th>
										<th scope="col">Adopt-Fee</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody id="myTable">

									@foreach($pets as $pet)
										<tr>
											{{-- name --}}
											<td>{{ $pet->pet_name }}</td>
											{{-- category --}}
											<td>
												@if($pet->category_id == 1)
													Dog
												@else
													Cat
												@endif
											</td>
											{{-- gender --}}
											<td>{{ $pet->gender }}</td>
											{{-- age --}}
											<td>{{ $pet->age }} month/s</td>
											{{-- fee --}}
											<td>
												@if($pet->adoption_fee <= 0)
													FREE
												@else
													₱{{ $pet->adoption_fee }}
												@endif
											</td>
											{{-- Status --}}
											<td>
												@if($pet->stocks == 0)
													<span class="font-italic text-danger">Pending Rescue</span>
												@elseif($pet->stocks == 1)
													<span class="font-italic text-success">Available</span>
												@elseif($pet->stocks == 2)
													<span class="font-italic text-danger">Pending Adoption</span>
												@elseif($pet->stocks == 3)
													<span class="font-italic text-warning">Screening</span>
												@else
													<span class="font-italic text-primary">Adopted</span>
												@endif
											</td>
											<td>
												{{-- <a href="" class="btn btn-danger font-weight-bold px-4"> Edit </a> --}}
												<a href="/pet/remove/{{ $pet->id }}/{{ $pet->pet_name }}" class="btn btn-danger font-weight- px-3"> Remove </a>
											</td>
										</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
					{{-- end col --}}
				</div>
				{{-- end row --}}
			</div>
			{{-- end records --}}

			{{-- Restore --}}
			<div class="tab-pane fade" id="nav-restore" role="tabpanel" aria-labelledby="restore">
				<div class="row my-5 adminBG">
					<div class="offset-lg-2 col-lg-8 text-center">
						<h1 class="adminHead">Restore</h1>
						{{-- search --}}
						<form class="form-inline my-4">
							<i class="fa fa-search search-icon d-md-block d-none mx-2 text-warning"></i>
					      	<input class="form-control" type="text" placeholder="Search" aria-label="Search" id="myInput5">
					    </form>
					    {{-- end search --}}
					    <div class="tableOverflow">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th scope="col">
											<form action="/pet/list" method="GET" id="myForm">
												@csrf
												<select class="rounded border-0 font-weight-bold" name="by_name" onchange="this.form.submit()">
													<option disabled selected>Fur Baby</option>
													<option value="asc">A - Z</option>
													<option value="desc">Z - A</option>
												</select>
											</form>
										</th>
										<th scope="col">Category</th>
										<th scope="col">Gender</th>
										<th scope="col">Age</th>
										<th scope="col">Adopt-Fee</th>
										{{-- <th scope="col">Status</th> --}}
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody id="myTable">

									@foreach($removedPets as $pet)
										<tr>
											{{-- name --}}
											<td>{{ $pet->pet_name }}</td>
											{{-- category --}}
											<td>
												@if($pet->category_id == 1)
													Dog
												@else
													Cat
												@endif
											</td>
											{{-- gender --}}
											<td>{{ $pet->gender }}</td>
											{{-- age --}}
											<td>{{ $pet->age }} month/s</td>
											{{-- fee --}}
											<td>
												@if($pet->adoption_fee <= 0)
													FREE
												@else
													₱{{ $pet->adoption_fee }}
												@endif
											</td>
											{{-- Status --}}
											{{-- <td>
												@if($pet->stocks == 0)
													<span class="font-italic text-danger">Pending Rescue</span>
												@elseif($pet->stocks == 1)
													<span class="font-italic text-success">Available</span>
												@elseif($pet->stocks == 2)
													<span class="font-italic text-danger">Pending Adoption</span>
												@elseif($pet->stocks == 3)
													<span class="font-italic text-warning">Screening</span>
												@else
													<span class="font-italic text-primary">Adopted</span>
												@endif
											</td> --}}
											<td>
												<a href="/pet/restore/{{ $pet->id }}/{{ $pet->pet_name }}" class="btn btn-warning font-weight-bold px-3"> Restore </a>
											</td>
										</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
					{{-- end col --}}
				</div>
				{{-- end row --}}
			</div>
			{{-- end records --}}

		</div>
		{{-- end tab content--}}

		<div id="stepsBG">
		</div>
		{{-- end steps --}}
	</div>
	{{-- end container fluid--}}

@endsection