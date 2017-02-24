@extends('layouts.app')

@section('content')
	
	<div class="panel panel-default"> 
		
		<div class="panel-heading"> 
			
			Add Educations

		</div>

		@include('layouts.partials.flash_notification')
		
		<div class="panel-body"> 

			<div class="row"> 

				<div class="col-md-2"></div>

				<div class="col-md-8">

					{{ Form::open(['route' => 'education.store', 'id' => 'education']) }}

						{{-- Name Field --}}

						<div class="form-group{{ $errors->first('name') ? ' has-error' : ' ' }}"> 

							{{ Form::label('name', 'Education Name', ['class' => 'control-label', 'id' => 'name']) }}

							{{ Form::text('name', ' ', ['class' => 'form-control']) }}

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

	<script> 
		$(document).ready(function(){ 

			$('#education').on('submit', function(e){ 

				e.preventDefault();

				var form = $(this);

				$.ajax({ 

					url:'{{ route('education.store') }}',

					type:'post',

					dataType:'json',

					data:$('#education').serialize(),

					error:function(error){

						$.each(JSON.parse(error.responseText), function(index, value){

							$('#'+index).parents('.form-group').addClass('has-error').append('<p class="help-block">'+value+'</p>');
						});
					},

					success:function(result){

						if(result.success){

							swal({ 

								title:'Success',

								text: result.message,

								type: 'success',

								timer:2500
							});

							form.get(0).reset();
						}
					},

					beforeSend:function(){

						form.find('.form-group').removeClass('has-error');

						form.find('.help-block').remove();

						form.find('.btn').attr('disabled', true);
					},

					complete:function(){

						form.find('.btn').removeAttr('disabled')
					}


				});
			});
		});
	</script>
@endsection