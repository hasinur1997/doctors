@extends('layouts.app')

@section('content')
	
	<div class="panel panel-default"> 
		
		<div class="panel-heading"> 
			
			Add Doctors

		</div>

		@include('layouts.partials.flash_notification')

		<div class="panel-body"> 

			<form action="{{ route('admin.store')}}" id="doctor" method="post" enctype="multipart/form-data">
			
				<div class="personal-info">
					

					{{-- Name Field --}}

					<div class="form-group"> 

						<label for="name" class="control-label">Name</label>

						<input type="text" name="name" id="name" class="form-control">

					</div>


					{{-- Address Field --}}

					<div class="form-group"> 

						<label for="address" class="control-label">Address</label>

						<input type="text" name="address" id="address" class="form-control">

					</div>


					{{-- PhoneNumber Field --}}
					
	
					<div class="form-group" > 

						<label for="phone_number" class="control-label">Phone Number</label>

						<select name="phone_number[]" id="phone_number" class="form-control phone_number" multiple="multiple"> 


						</select>

						
					</div>


					{{-- Location Field --}}

					<div class="form-group" > 

						<label for="location" class="control-label">Location</label>

						<select name="location" id="location"  class="form-control location"> 

							<option value="">Select Location</option>

							@foreach($locations as $location)

							<option value="{{$location->id}}">{{$location->location}}</option>

							@endforeach
						</select>

						
					</div>


					{{--  Education Field --}}
					
					<div class="form-group" > 

						<label for="education" class="control-label">Education degree</label>

						<select name="education[]" id="education" class="form-control education" multiple="multiple"> 

							<option value="">Select Education</option>
							
							@foreach($educations as $education) 

							<option value="{{ $education->id }}">{{ $education->title }}</option>

							@endforeach								


						</select>

						
					</div>


					{{--  Specialty Field --}}
					
					<div class="form-group" > 

						<label for="specialty" class="control-label">Specialty</label>

						<select name="specialty[]" id="specialty" class="form-control specialty" multiple="multiple"> 

							<option value="">Select specialty</option>

							@foreach($specialties as $specialty)

							<option value="{{ $specialty->id }}">{{ $specialty->name }}</option>

							@endforeach


						</select>

						
					</div>


					{{--  Hospital Field --}}
					
					<div class="form-group" > 

						<label for="hospital" class="control-label">Hospital Name</label>

						<select name="hospital[]" id="hospital" class="form-control hospital" multiple="multiple"> 

							<option value="">Select Hospital</option>

							@foreach($hospitals as $hospital)

							<option value="{{ $hospital->id }}">{{ $hospital->hospital_name }}</option>

							@endforeach

							
						</select>

						
					</div>

					{{-- Image Field --}}

					<div class="form-group"> 

				      <label for="image" class="control-label">Doctor Picture</label>

				      <input type="file" name="image" id="image" class="form-control">

  					 </div> 


					{{-- Visitting-Card Field --}}

					<div class="form-group"> 

						<label for="visitting_card" class="control-label">Visitting Card</label>

						<input type="file" name="visitting_card" id="visitting_card" class="form-control"> 

					</div>
				
				
				</div>{{---/ Personal Information  --}}
			
				{{ csrf_field() }}

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

		$('.location').select2();

		$(".education, .specialty, .hospital").select2({
		  	
		});


		$(document).on('click', '.d-add', function(){


			$(this).parents('.visit').repeater({ 

			btnAddClass: 'd-add',
			btnRemoveClass: 'd-remove',
			groupClass: 'visitting-days',
			minItems: 1,

			});
		});


		$('#doctor').on('submit', function(e){ 

			e.preventDefault();

			var form = $(this);

			var inputData = new FormData(this);



			$.ajax({ 

				url:'{{ route('admin.store') }}',

				type:'post',

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

						

						swal('Success', result.message, 'success');

						form.get(0).reset();

						window.location.reload();
					}
				},

				beforeSend: function()
				{
					form.find('.form-group').removeClass('has-error');
					form.find('.help-block').remove();
					form.find('button').attr('disabled', true);

					
				},

				complete: function()
				{
					form.find('button').removeAttr('disabled');
				}

			});

		});
		

	});
		

 </script>
	

@endsection