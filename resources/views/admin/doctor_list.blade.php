@extends('layouts.app')

@section('content')
	
	@if($doctors->count())

		<div class="panel panel-default"> 

			<div class="panel-heading"> 
				
				Doctor List
				<a href="{{ route('admin.create') }}" class="btn btn-info btn-xs pull-right">Add New</a>
			</div>

			@include('layouts.partials.flash_notification')
			
			<div class="panel-body table-responsive">
				
				<table class="table table-striped table-condensed"> 

					<thead>

						<tr>
							<th>Name</th>

							<th>Address</th>

							<th>Action</th>

						</tr>

					</thead>

					<tbody> 
						
						@foreach($doctors as $doctor)

							<tr> 
								<td>{{ $doctor->name }}</td>

								<td>{{ str_limit($doctor->address, 60) }}</td>

								<td> 
									<a href="{{ route('admin.edit', [$doctor->id]) }}" class="btn btn-info btn-xs">Edit</a>


									
									<a href="{{ route('admin.destroy', [$doctor->id]) }}" class="btn btn-warning btn-xs delete_form" >Delete</a>

									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{ $doctor->id }}">View</button>
									
									
									<div id="{{ $doctor->id }}" class="modal fade" role="dialog">

									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">

									      <div class="modal-header">

									        <button type="button" class="close" data-dismiss="modal">&times;</button>

									        <h3>{{ $doctor->name }}</h3>

									      </div>

									      <div class="modal-body">
									      	<div class="row">
											<div class="col-md-3">

											@if(!empty($doctor->image))
										     
												<img src="/uploads/{{ $doctor->image }}" alt="" class="img-responsive">
											@else

												<img src="/uploads/images/default.jpg" alt="" class="img-responsive">
											@endif
										      
									      </div>

									        <div class="col-md-9"> 

												

												<div class="doclist-specialty"> 

													<h4>Specialty:</h4>
													<p>{{ $doctor->specialties->implode('name', ', ') }}</p>
													
												</div>

												<div class="doclist-education"> 

													<h4>Education:</h4>
													<p>{{ $doctor->education->implode('title', ', ') }}</p>
												</div>

												<div class="doclist-hospital"> 
													<h4>Hospital:</h4>
													<p>{{ $doctor->hospital->implode('hospital_name', ', ') }}</p>

												</div>
									        </div>

											</div>

									      </div>

									    </div>

									  </div>
									</div>
								</td>
								
							</tr>

						@endforeach
						
					</tbody>

				</table>

			</div>

		</div>

	{{ $doctors->links() }}
	
		@else

		<div class="text-center"> 

			<h2>Sorry ! No content found.</h2>

			<p><a href="{{ url('/create')}}">Add new</a>Content</p>

		</div>
		

	@endif
	



	<script> 

			


				$(document).on('click', '.delete_form', function(e) {
			        e.preventDefault();
			        	var self = $(this);
			        

						swal({
							  title: "Ajax request example",
							  text: "Submit to run ajax request",
							  type: "info",
							  showCancelButton: true,
							  closeOnConfirm: false,
							  showLoaderOnConfirm: true,
						},

						function(){

						  
								 $.ajax({ 

			                        	url:self.attr('href'),

			                        	type: 'DELETE',

			                        	dataType:'json',

			                        	data:{
			                        		_token:'{{csrf_token()}}'
			                        	},

			                        	success: function(r){
			                        		if(r.success){

			                        			swal({ 
			                        				title:'Delete',
			                        				text: r.message,
			                        				type: 'success',
			                        				timer:2000

			                        			});

			                        			self.parents('tr').remove();

			                        		}
			                        		
			                        	},
			                        });

						});

			                       
			});
					

			                       
			

		</script>
@endsection