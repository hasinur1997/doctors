@extends('layouts.app')

@section('content')
	
	<div class="panel panel-default"> 
		
		<div class="panel-heading"> 
			
			Add Doctors

		</div>

		@include('layouts.partials.flash_notification')

		<div class="panel-body"> 

			<form action="{{ route('admin.update', [$doctor->id])}}" id="doctor" method="post" enctype="multipart/form-data">
			
				<div class="personal-info">
					
					<h4>Personal Information</h4>
					<hr>

					{{-- Name Field --}}

					<div class="form-group"> 

						<label for="name" class="control-label">Name</label>

						<input type="text" value="{{ $doctor->name }}" name="name" id="name" class="form-control">

						<span class="help-block">{{ $errors->first('name') }}</span>

					</div>


					{{-- Address Field --}}

					<div class="form-group"> 

						<label for="address" class="control-label">Address</label>

						<input type="text" value="{{ $doctor->address }}" name="address" id="address" class="form-control">

						<span class="help-block">{{ $errors->first('address') }}</span>

					</div>


					{{-- PhoneNumber Field --}}
					
	
					<div class="form-group" > 

						<label for="phone_number" class="control-label">Phone Number</label>

						<select name="phone_number[]" id="phone_number" class="form-control phone_number" multiple="multiple">
							

							@foreach($phone_number as $phone)

								<option value="{{ $phone }}" selected>{{ $phone }}</option>

							@endforeach

						</select>

						<span class="help-block">{{ $errors->first('phone_number') }}</span>

						
					</div>


					{{--  Education Field --}}
					
					<div class="form-group" > 

						<label for="education" class="control-label">Education degree</label>

						<select name="education[]" id="education" class="form-control education" multiple="multiple"> 

							
							@foreach($doctor->education as $education) 

							<option value="{{ $education->id }}" selected>{{ $education->title }}</option>

							@endforeach		

							@foreach($educations as $edu)
								
								<option value="{{ $edu->title }}">{{ $edu->title }}</option>
							@endforeach					


						</select>


						<span class="help-block">{{ $errors->first('education') }}</span>

						
					</div>


					{{--  Specialty Field --}}
					
					<div class="form-group" > 

						<label for="specialty" class="control-label">Specialty</label>

						<select name="specialty[]" id="specialty" class="form-control specialty" multiple="multiple"> 

	

							@foreach($doctor->specialties as $specialty)

							<option value="{{ $specialty->id }}" selected>{{ $specialty->name }}</option>

							@endforeach


							@foreach($specilities as $specialty)

							<option value="{{ $specialty->id }}">{{ $specialty->name }}</option>

							@endforeach


						</select>

						<span class="help-block">{{ $errors->first('specialty') }}</span>

						
					</div>


					{{--  Hospital Field --}}
					
					<div class="form-group" > 

						<label for="hospital" class="control-label">Hospital Name</label>

						<select name="hospital[]" id="hospital" class="form-control hospital" multiple="multiple"> 


							@foreach($doctor->hospital as $hospital)

							<option value="{{ $hospital->id }}" selected >{{ $hospital->hospital_name }}</option>

							@endforeach
							
							@foreach($hospitals as $hos)

								<option value="{{ $hos->id }}">{{ $hos->hospital_name }}</option>

							@endforeach
							
						</select>
						
						<span class="help-block">{{ $errors->first('hospital') }}</span>
						
					</div>

					{{-- Image Field --}}

					@if(!empty($doctor->image))

						<img src="/uploads/{{ $doctor->image }}" alt="" class="img-responsive">

					@endif

					<div class="form-group"> 

				      <label for="image" class="control-label">Doctor Picture</label>

				      <input type="file" name="image" id="image" class="form-control">

  					 </div> 


					{{-- Visitting-Card Field --}}

					<img src="/uploads/{{ $doctor->visitting_card }}" alt="">

					<div class="form-group"> 

						<label for="visitting_card" class="control-label">Visitting Card</label>

						<input type="file" name="visitting_card" id="visitting_card" class="form-control"> 

					</div>
				
				
				</div>{{---/ Personal Information  --}}
			
				{{ csrf_field() }}

				{{ method_field('PUT') }}

				{{-- Submit Field --}}

				<div class="form-group"> 

					<button type="submit" class="btn btn-info">Submit</button>

				</div>
			</form>
			{{-- Form::close() --}}

		</div>

	</div>

	<script> 
	$(document).ready(function(){ 

		$(".phone_number").select2({

		  tags: true,
		  tokenSeparators: [',', ' ']

		});


		$(".education, .specialty, .hospital").select2({
		  	
		});




		$('#doctor').on('submit', function(e){ 

			e.preventDefault();

			var form = $(this);

			var inputData = new FormData(this);



			$.ajax({ 

				url:'{{ route('admin.update', [$doctor->id])}}',

				type:'POST',

				dataType: 'json',

				data: inputData,

				processData: false,

        		contentType: false,

				error: function(error){

					$.each(JSON.parse(error.responseText), function(index, value){ 

							$('#'+index).parents('.form-group').addClass('has-error').append('<p class="help-block">'+value+'</p>');
						});
				},

				success: function(result){ 

					if(result.success){

						

						swal({ 
							title:'Updated',
							text:result.message,
							type:'success',
							timer:2500
						});

					
					}
				},

				beforeSend: function()
				{
					form.find('.form-group').removeClass('has-error');
					form.find('.help-block').remove();

					
				},

				complete: function()
				{

				}

			});

		});
		

	});
		

 </script>
	

@endsection