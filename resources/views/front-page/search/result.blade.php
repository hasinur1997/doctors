@extends('front-page.partials.master')


@section('content')

	<section class="search-single-directory"> 

		<div class="container"> 
				
				                

				@if($doctors->count())


				@foreach($doctors as $doctor)
				
				<div class="row single-section">

					<div class="col-md-9 signle-left"> 

						<div class="row">

							<div class="col-md-3">

								@if(!empty($doctor->image))

									<a href=""><img src="/uploads/{{ $doctor->image }}" alt="" class="img-responsive"></a>
								@else

									<a href=""><img src="/uploads/images/default.jpg" alt="" class="img-responsive"></a>

								@endif
								
							</div>

							

							
							<div class="col-md-9">

								<a href="{{ url('doctor-profile/'.$doctor->id) }}" class="doc-name"><h2>{{ $doctor->name }}</h2></a>

								<p class="desgination">{{ $doctor->specialties->implode('name', ', ')}}</p>

								<div class="address"> 
									<p class="address-location">{{ $doctor->address }}</p>

									<p class="details"><a href="{{ url('doctor-profile/'.$doctor->id) }}">বিস্তারিত</a></p>

								</div>

							</div>

						</div>
						

					</div>

					
					<div class="col-md-3 signle-right"> 
						<div class="contact-info"> 

							@foreach($doctor->hospital as $hospital)

							<p class="text-center">{{ $hospital->hospital_name }}</p>

							@endforeach

							<button class="btn btn-default sl-btn">সিরিয়াল দিন</button>
						</div>

					</div>

				</div>

				@endforeach
					@else

					<div class="text-center"> 
						<h3>No Content Were Found</h3>
					</div>
				@endif
			
		</div>

		{{ $doctors->links() }}
		
	</section>

@stop