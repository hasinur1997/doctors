@extends('layouts.app');

@section('content')

  
  
  	<div class="col-md-3"> 
	 
  
		<img src="{{ url('uploads/'.$doctor->image) }}" class="img-responsive" alt="">

  	
  	</div>

  <div class="col-md-6"> 

	<h2>{{ $doctor->name }}</h2>

	<hr>

	<div class="doc-education"> 
		<h2 style="display: table-cell;padding-top: 12.5px;
    padding-bottom: 12.5px; text-align: left">Education:</h2>
		<p style="display: table-cell;padding-top: 12.5px;
    padding-bottom: 12.5px; font-size:14px; padding-left: 25px">

			@foreach($doctor->education as $edu_list)

				{{ $edu_list->title }},

			@endforeach

		</p>

	</div>

	<div class="doc-specialty"> 
		<h2 style="display: table-cell;padding-top: 12.5px;
    padding-bottom: 12.5px; text-align: left">Specialty:</h2>
		<p style="display: table-cell;padding-top: 12.5px;
    padding-bottom: 12.5px; font-size:14px; padding-left: 25px">

		@foreach($doctor->specialties as $edu_list)

			{{ $edu_list->name }},

		@endforeach
	</p>
	</div>

  </div>

  
	<div class="visitting-card col-md-3"> 

		<img src="{{ url('uploads/'.$doctor->visitting_card) }}" alt="">

		<div class="doc-btn" style="width:100%; margin-top:20px"> 
			
			<a href="/download/{{$doctor->id}}" >Download</a>

		</div>

	</div>
	

	<ul class="list"> 
		<li></li>
	</ul>
 
 


@endsection


