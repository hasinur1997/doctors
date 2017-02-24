@extends('layouts.app')


@section('content')
	
	<div class="panel panel-default">

		<div class="panel-heading">

			Create Location

		</div>

		<div class="panel-body"> 

			<form action="{{ route('location.update', [$location->id]) }}" method="post" id="location-form"> 

				<div class="form-group"> 

					<label for="location" class="control-label">Location</label>

					<input type="text" name="location" class="form-control" id="location" value="{{$location->location}}">


				</div>

				<div class="form-group"> 

					<button class="btn btn-info" type="submit">Save</button>
				</div>

				{{ csrf_field() }}

				{{ method_field('PUT') }}
			</form>

		</div>
	</div>




	<script> 
		$(document).ready(function(){ 

			$('#location-form').on('submit', function(e){ 

				e.preventDefault();

				var form = $(this);

				$.ajax({ 

					url:'{{ route('location.update', [$location->id]) }}',

					type:'POST',

					dataType:'json',

					data:$('#location-form').serialize(),


					error:function(error){

						
						$.each(JSON.parse(error.responseText), function(index, value){ 

							$('#'+index).parents('.form-group').addClass('has-error').append('<p class="help-block">'+value+'</p>');
						});
					},

					beforeSend:function()
					{
						form.find('.form-group').removeClass('has-error');

						form.find('.help-block').remove();
					},

					success:function(result)
					{
						if(result.success){
							swal({
								title:'Success',
								text: result.message,
								type: "success",
								timer: 2000
							});

						}
					}

				});

			})
			



		});
	</script>

@stop