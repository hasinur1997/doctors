@extends('layouts.app') 

@section('content')

@include('layouts.partials.flash_notification')

@if($specialties->count())
	
	<div class="panel panel-default"> 

		<div class="panel-heading"> 
			
			Specialty List

		</div>

		<div class="panel-body"> 
			
			<table class="table table-striped table-condensed"> 
				
				<thead> 
					
					<tr> 
						<th>Sl</th>

						<th>Specilty Name</th>

						<th>Action</th>

					</tr>

				</thead>

				<tbody> 

					@php 
						$i = 1;
					@endphp
					
					@foreach($specialties as $specilty)

					<tr> 
						<td> {{ $i }} </td>
						
						<td> {{ $specilty->name }} </td>

						<td> 
							

							<a href="{{ route('specialties.edit', [$specilty->id]) }}" class="btn btn-info btn-xs">Edit</a>
							
						 

						

							{{ Form::open(['route' => ['specialties.destroy', $specilty->id], 'method' => 'delete', 'style'=>'display:inline']) }}

							{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) }}

							{{ Form::close()  }}

							

						</td>
					</tr>

					@php
						$i++;
					@endphp

					@endforeach
			
				</tbody>

			</table>

		</div>

	</div>

@else

	<div class="text-center"> 
		
		<h3>Sorry ! No content were found.</h3>

		<p>Add New Content</p>

	</div>

@endif


@endsection