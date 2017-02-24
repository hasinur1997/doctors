@extends('layouts.app')

@section('content')

	<div class="panel panel-default"> 

		<div class="panel-heading"> 
			
			Hospital List

			<button class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#modal"> Add new cord</button>


			<div id="modal" class="modal fade" role="dialog">

			  <div class="modal-dialog">

			    <!-- Modal content-->
				    <div class="modal-content">
				      
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Hostpital Create Form</h4>
     				 </div>
				      <div class="modal-body">
				       
						<div class="panel panel-default"> 

							<div class="panel-body"> 

								<form action="{{ route('hospitals.store') }}" method="post" id="hospital"> 

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

										<input type="text" name="location" id="location"  class="form-control">

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

												<select id="phone_number" name="phone_number[]"  class="number form-control" multiple="multiple">

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

				      </div>

				    </div>

			 	</div>
			</div>

		</div>

		@include('layouts.partials.flash_notification')
		
		<div class="panel-body">
			
			<table class="table table-striped table-condensed"> 

				<thead>

					<tr>
						<th>Sl</th>

						<th>Hospital Name</th>

						<th>Address</th>

						<th>Phone Number</th>

						<th>Action</th>

					</tr>

				</thead>

				<tbody> 
						
					@foreach($hospitals as $hospital)

						<tr> 

							<td> {{ $hospital->id }} </td>

							<td> {{ $hospital->hospital_name }} </td>

							<td> {{ $hospital->location }} </td>

							<td> {{ $hospital->phone_number }} </td>

							<td>  
								<a href="{{ route('hospitals.edit', [$hospital->id]) }}" class="btn btn-info btn-xs">Edit</a> 

								<a href="{{ route('hospitals.destroy', [$hospital->id]) }}" class="btn btn-warning btn-xs delete_form" >Delete</a>

							</td>

						</tr>

					@endforeach
					
				</tbody>

			</table>

		</div>

	</div>

	<script>

		$(document).ready(function(){ 

			$(".number").select2({

			  tags: true,

			  tokenSeparators: [',', ' ']

			})



			$('#hospital').on('submit', function(event){ 

				event.preventDefault();

				var form = $(this);



				$.ajax({  

					url: '{{ route('hospitals.store') }}',

					type: 'post',

					dataType: 'json',

					data:form.serialize(),

					success: function(res){ 
						if (res.success) {
							swal('Information!', res.message, 'success');
							$('#modal').modal('hide');
							form.get(0).reset();
							window.location.reload();
						}
					},

					error: function(error){

						

						$.each(JSON.parse(error.responseText), function(index, value){ 

							$('#'+index).parents('.form-group').addClass('has-error').append('<p class="help-block">'+value+'</p>');
						});
					},

					complete: function(){

						form.find('button').removeAttr('disabled');
					},

					beforeSend: function(){
						form.find('.form-group').removeClass('has-error');
						form.find('.help-block').remove();
						form.find('button').attr('disabled', true);
					}
				});

			});



			$(document).on('click', '.delete_form', function(e) {
			        e.preventDefault();
			        	var self = $(this);
			        

						swal({
							  title: "DELETE",
							  text: "Are you sure want to delete this ?",
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
			                   




		})

		


	</script>


@endsection