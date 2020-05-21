@extends('template')
@section('title', 'Adopt-a-Fur | History')

@section('body')

	<div class="container-fluid">
		<div class="row p-md-5 p-3 historyBG">
			<div class="col-lg-8 offset-lg-2">
				<h1 class="text-warning historyHead pb-md-5 pb-4">Adoption History</h1>
				{{-- search --}}
				<form class="form-inline my-2">
					<i class="fa fa-search search-icon mx-2 text-warning d-md-block d-none"></i>
			      	<input class="form-control" type="text" placeholder="Search" aria-label="Search" id="myInput">
			    </form>
			    {{-- end search --}}
			    <div class="tableOverflow">
					<table class="table table-hover rounded my-4">
						<thead>
							<tr>
								<th scope="col">Reference Number</th>
								<th scope="col">
									<form action="/orders" method="GET" id="myForm">
										@csrf
										<select class="rounded border-0 font-weight-bold" name="by_purchase_date" onchange="this.form.submit()">
											<option disabled selected>Date</option>
											<option value="desc">Newest to Oldest</option>
											<option value="asc">Oldest to Newest</option>
										</select>
									</form>
								</th>
								<th scope="col">Total</th>
								<th scope="col">Breakdown</th>
							</tr>
						</thead>
						<tbody id="myTable">
							<div>
								@foreach($orders as $order)
									@if($order->user_id == Auth::user()->id)
										<tr>
											<td>{{ $order->transaction_code }}</td>
											<td>{{ $order->purchase_date }}</td>
											<td>
												@if($order->total_price <= 0)
													FREE
												@else
													₱ {{ $order->total_price }}
												@endif
												
											</td>
											<th>
												<table>
													<thead>
														<tr>
															<th scope="col">Pet Name</th>
															<th scope="col">Status</th>
														</tr>
													</thead>
													<tbody>
														@foreach($order->pets as $pet)
															<tr>
																<th>{{ $pet->pet_name }}</th>
																<th>
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
																</th>
															</tr>
														@endforeach
													</tbody>
												</table>
											</th>
										</tr>
									@endif
								@endforeach
							</div>
						</tbody>
					</table>
			    </div>
			    {{-- end overflow --}}
			</div>
			{{-- end col --}}
		</div>
		{{-- end row --}}

	</div>
	{{-- end container --}}

	<div id="stepsBG">
		
	</div>
	{{-- end steps --}}

@endsection