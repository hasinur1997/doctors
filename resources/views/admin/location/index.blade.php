@extends('layouts.app')


@section('content')

	@if($locations->count())

		<div class="panel panel-default">

			<div class="panel-heading">
				
				Location List

			</div>

			<div class="panel-body"> 
					
				<table class="table table-striped table-condensed"> 
					
					<thead>

						<tr>
							<th>Sl</th>

							<th>Location</th>

							<th>Action</th>

						</tr>

					</thead>
						@php 
							$i = 1
						@endphp
					<tbody>
						@foreach($locations as $location)

						<tr>
							<td>{{ $i }}</td>

							<td>{{ $location->location }}</td>

							<td> <a href="{{ route('location.edit', [$location->id]) }}" class="btn btn-info btn-xs">Edit</a>  <a href="{{ route('location.destroy', [$location->id]) }}" class="btn btn-warning btn-xs delete-form">Delete</a></td>
						</tr>
						@php 
							$i++
						@endphp

						@endforeach

					</tbody>

				</table>

			</div>

		</div>
	@else
		<div class="text-center"> 

			<h4>Sorry ! No content were found.</h4>
			<p><a href="{{ route('location.create') }}">Add new</a> location.</p>

		</div>
	@endif


	<script> 

		$(document).ready(function(){ 

			$(document).on('click', '.delete-form', function(e){ 

				e.preventDefault();

				var self = $(this);

				swal({ 
					  title: "Ajax request example",
					  text: "Submit to run ajax request",
					  type: "info",
					  showCancelButton: true,
					  closeOnConfirm: false,
					  showLoaderOnConfirm: true,

				}, function(){ 

					$.ajax({

						url:self.attr('href'),

						type:'DELETE',

						data:{
						 	_token:'{{csrf_token()}}'
						},

						dataType:'json',

						success:function(result){

							if(result.success){

								swal({ 
									title:'Deleted',
									text: result.message,
									type:"success",
									timer:2500
								});

								self.parents('tr').remove();
							}
						}
					});

				});

			});
		});

	</script>
@stop