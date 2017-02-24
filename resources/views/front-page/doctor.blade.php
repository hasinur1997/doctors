@extends('front-page.partials.master')

@section('content')

	<section class="doctor-profile-section"> 
		
		<div class="container">

			<div class="row">

				<div class="col-md-9 "> 
					
					<div class="doctor-profile"> 
						
						<div class="col-md-5 doctor-image"> 

							<img src="/uploads/images/ca265858f05ef1237f6613311ee42b93.jpeg" alt="image" class="img-responsive">
						</div>

						<div class="col-md-7 doctor-details">

							<h2 class="doc-name">{{ $doctor->name }}</h2>

							<div class="doc-des"> 

								<div class="doc-edu"> 
								
									<h3>Specialty:</h3>
									<p>{{ $doctor->specialties->implode('name', ', ') }}</p>

								</div>

								<div class="doc-sp"> 

									<h3>Degree:</h3>
									<p>{{ $doctor->education->implode('title', ', ') }}</p>

								</div>



							</div>

							<div class="share-doc"> 

								<h3>Share:</h3>

								<p><a href="http://www.facebook.com/share/share.php?display=localhost:8000/doctor-profile/40"><i class="fa fa-facebook"></i></a>
								<a href=""><i class="fa fa-twitter"></i></a>
								<a href=""><i class="fa fa-google-plus"></i></a>
								<a href=""><i class="fa fa-linkedin"></i></a></p>

							</div>

						</div>
						
						<div class="col-md-12 docto">
							
							<div class="about-doctor"> 

								<h3>About Doctor</h3>

							</div>

							<div class="doctor-education"> 
							
								<h3 class="edu-title">Education</h3>
									
									@foreach($doctor->education as $education)

										<p>{{ $education->title }}</p>

									@endforeach
						
							</div>
						</div>
					</div>


				</div>

				<div class="col-md-3"> 

					<div class="serial"> 

						<button class="btn serial-btn dbt">সিরিয়াল দিন </button>

					</div>

					<div class="fee"> 
						<p class="fee-btn dbt" style="padding-left:25px">ফিঃ উল্লেখ নেই </p>
					</div>

					<div class="visitting-card"> 
						<img src="/uploads/{{ $doctor->visitting_card }}" class="img-responsive" alt="">
					</div>

					<div class="dowload-card dbt"> 

						<a href="{{ url('download/'.$doctor->id) }}" class="btn download-btn dbt">Download Card</a>
						
					</div>
					<div class="visiting-hour">
						<h4 class="text-center time">সাক্ষাতের সময় সূচি </h4>

						<div class="panel-group" id="accordion">
								
							@foreach($doctor->hospital as $hospital)

							  <div class="panel panel-default">

							    <div class="panel-heading">


							      <h4 class="panel-title">

							        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$hospital->id}}">{{ $hospital->hospital_name}}</a>

							      </h4>


							    </div>

							    <div id="collapse{{$hospital->id}}" class="panel-collapse collapse ">

							      <div class="panel-body"><p>ফোনঃ {{ $hospital->phone_number }}</p></div>

							     

							    </div>

							</div>

							@endforeach

						</div>

					</div>


				<div class="communication">

					<h4>যোগাযোগ</h4>
					<p>ফোনঃ {{ $doctor->phone_number }}</p>

				</div>

			</div>

		</div>

	</section>

	

@endsection