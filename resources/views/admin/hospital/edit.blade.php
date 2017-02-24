@extends('layouts.app');

@section('content');

	
	
	<div class="panel panel-default"> 

		<div class="panel-heading"> 
			
			Hostpital Update Form
		
		</div>

		<div class="panel-body"> 

			<form action="{{ route('hospitals.update', [$hospital->id]) }}" method="post"> 

				{{-- Hospital Name Field --}}
				
				<div class="form-group{{ $errors->has('hospital_name') ? ' has-error' : '' }}"> 
					
					<label for="hospital_name" class="control-label">Hospital Name</label>

					<input type="text" name="hospital_name" value="{{ $hospital->hospital_name }}" class="form-control">

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

					<input type="text" name="location" value="{{$hospital->location}}" class="form-control">

					@if($errors->first('location'))
								
						<span class="help-block text-danger"> 
						
							{{ $errors->first('location') }}

						</span>

					@endif

				</div>


				{{-- Hospital Phone Number Field  --}}

						<div class="form-group{{ $errors->has('hospital_phone') ? ' has-error' : '' }}"> 

							<label for="hospital_phone" class="control-label">Phone Number
							</label>

							<select name="phone_number[]"  class="number form-control" multiple="multiple">
								
								@foreach($phone_number as $phone)

									<option value="{{$phone}}" selected>{{ $phone }}</option>

								@endforeach


							  </select>
							
							@if($errors->first('hospital_phone'))
								
								<span class="help-block text-danger"> 
								
									{{ $errors->first('hospital_phone') }}

								</span>

							@endif
							

						</div>

						{{--  Submit Button --}}

						<div class="form-group"> 
							
							<input type="submit" class="btn btn-info">

						</div>

				{{ method_field('PUT') }}

				{{ csrf_field() }}
			
			</form>
			
		</div>

	</div>

	<script> 

		$(".number").select2({
		  tags: true,
		  tokenSeparators: [',', ' ']
		})

	</script>

@endsection