@extends('layouts.app')

@section('content')
	
	<div class="panel panel-default"> 
		
		<div class="panel-heading"> 
			
			Add Specialty

		</div>

		
		
		<div class="panel-body"> 

			<div class="row"> 

				<div class="col-md-2"></div>

				<div class="col-md-8">

					{{ Form::model($specialty, [ 'route' => ['specialties.update', $specialty->id], 'method' => 'put']) }}

						{{-- Name Field --}}

						<div class="form-group{{ $errors->first('name') ? ' has-error' : ' ' }}"> 

							{{ Form::label('name', 'Name', ['class' => 'control-label']) }}

							{{ Form::text('name', $specialty->name, ['class' => 'form-control']) }}

							<span class="help-block"> 

								{{ $errors->first('name') }}

							</span>

						</div>


						
						
						{{-- Submit Field --}}

						<div class="form-group"> 

							{{ Form::submit('Submit', ["class" => 'btn btn-default']) }}

						</div>

					{{ Form::close() }}

				</div>

			</div>

		</div>

	</div>

@endsection