@extends('layouts.app');

@section('content');
	
	@include('layouts.partials.flash_notification')

	<div class="panel panel-default"> 

		<div class="panel-heading"> 
			
			Hostpital Create Form
		
		</div>

		<div class="panel-body"> 

			<form action="{{ route('hospitals.store') }}" method="post" id="create_form"> 

				{{-- Hospital Name Field --}}
				
				<div class="form-group{{ $errors->has('hospital_name') ? ' has-error' : '' }}"> 
					
					<label for="hospital_name" class="control-label">Hospital Name</label>

					<input type="text" name="hospital_name" class="form-control" id="hospital_name">

					@if($errors->first('hospital_name'))
								
						<span class="help-block text-danger"> 
						
							{{ $errors->first('hospital_name') }}

						</span>

					@endif

				</div>

				{{-- Hospital Location Field  --}}


				<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}"> 

					<label for="location" class="control-label">Hospital 
					Location
					</label>

					<input type="text" name="location" class="form-control" id="location">

					@if($errors->first('location'))
								
						<span class="help-block text-danger"> 
						
							{{ $errors->first('location') }}

						</span>

					@endif

				</div>


				{{-- Hospital Phone Number Field  --}}

				<div class="phone">

					<div class="phone_number">

						<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}"> 

							<label for="phone_number" class="control-label">Phone Number
							</label>

							<select name="phone_number[]"  class="number form-control" multiple="multiple" id="phone_number">

							  </select>

							
							@if($errors->first('phone_number'))
								
								<span class="help-block text-danger"> 
								
									{{ $errors->first('phone_number') }}

								</span>

							@endif
							

						</div>
	

					</div>

				</div>

				{{--  Submit Button --}}

				<div class="form-group"> 
					
					<button type="submit" class="btn btn-info">Submit</button>

				</div>

				{{ csrf_field() }}
			
			</form>
			
		</div>

	</div>

	<script>
		$(document).ready(function(){ 

			$(".number").select2({

			  tags: true,
			  tokenSeparators: [',', ' ']

			});


			$('#create_form').on('submit', function(event){ 

				event.preventDefault();

				var form = $(this);

				$.ajax({  

					url:'{{ route('hospitals.store') }}',

					type:'POST',

					dataType:'json',

					data:$('#create_form').serialize(),

					error: function(error){

						$.each(JSON.parse(error.responseText), function(e, v){ 

							$('#'+e).parents('.form-group').addClass('has-error').append('<p class="help-block">'+v+'</p>');
						});
					},

					success: function(result){

						if(result.success){
							swal('Success', result.message, 'success' );
							$('#create_form')[0].reset();
						}
					},


					beforeSend: function(){

						form.find('button').attr('disabled', true);
						form.find('.form-group').removeClass('has-error');
						form.find('.help-block').remove();
					},

					complete: function(){

						form.find('button').removeAttr('disabled');
						
					}
				});

			});

		});
	</script>




@endsection