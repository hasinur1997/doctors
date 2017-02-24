@extends('layouts.app')

@section('content')

	@if($edu_lists->count())

		<div class="panel panel-default"> 
		
			<div class="panel-heading"> 

				Education List
				<a href="{{ route('education.create') }}" class="btn btn-info btn-xs pull-right">Add new</a>
			</div>

			
			@include('layouts.partials.flash_notification')

			<div class="panel-body"> 
				
				<table class="table table-striped table-condensed"> 
					
					<thead> 

						<tr> 

							<th>Sl</th>

							<th>Name</th>

							<th>Action</th>

						</tr>

					</thead>

					<tbody> 

						@foreach($edu_lists as $edu_list)

						<tr> 
							
							<td> {{ $edu_list->id }}</td>

							<td> {{ $edu_list->title }}</td>

							<td>  
								
								<a href="{{ route('education.edit', [$edu_list->id]) }}" class="btn btn-info btn-xs">Edit</a>

								
								<a href="{{ route('education.destroy', [$edu_list->id]) }}" class="btn btn-danger btn-xs delete_btn">Delete</a>

							</td>

						</tr>

						@endforeach
						
					</tbody>

				</table>

			</div>
			
		</div>

		@else

		<div class="text-center"> 
			
			<h3>Sorry ! No, content were found.</h3>

			<p>Please, add some content</p>

		</div>

	@endif


	<script> 

		$(document).ready(function(){ 

			$(document).on('click', '.delete_btn', function(e){

				e.preventDefault();

				var self = $(this);

				swal({

					  title: "DELETE",
					  text: "Are you sure want to delete this ?",
					  type: "warning",
					  showCancelButton: true,
					  closeOnConfirm: false,
					  showLoaderOnConfirm: true,
				},

				function(){

					$.ajax({ 

						url:'{{ route('education.destroy', [$edu_list->id]) }}',

						type:'DELETE',

						dataType:'json',

						data:{ 
							_token:'{{ csrf_token() }}'
						},


						success:function(result)
						{
							if(result.success){

								swal({ 

									title:'Deleted',

									text:result.message,

									type:'success',

									timer:2500

								});
							}

							self.parents('tr').remove();
						}
					});
				})
			});
		});

	</script>
@endsection