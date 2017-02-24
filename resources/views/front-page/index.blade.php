@extends('front-page.partials.master')


@section('content')
	
	<!-- Search Section  -->
	<section class="doc-search-section"> 
	
		<div class="container"> 
			
			<h2 class="text-center search-title"> 
				ডাক্তার ডিরেক্টরি
			</h2>
			
			<div class="doc-search"> 
				
				<form action="{{ url('result') }}" method="GET"> 
					
					<div class="col-sm-4 search-left"> 
						
						<div class="form-group"> 

							
								
								<select name="location" id="search-location" class="form-control s1"/>
									<option value="">ঢাকায় অবস্থানরত ডাক্তার</option>
									@foreach($locations as $location)

										<option value="{{ $location->id }}">{{ $location->location }}</option>

									@endforeach

								</select>


							
						</div>
					
					</div>
					
					<div class="col-sm-8 search-right"> 
					
						
						
						<div class="form-group"> 
							<div class="input-group">

								<select name="specialty" id="search-specialty" class="form-control s2"/>
									<option value="">বিশেষত্বতার ভিত্তিতে ডাক্তার খোজ করুন</option>
									@foreach($specialties as $specialty)

										<option value="{{ $specialty->id }}">{{ $specialty->name }}</option>

									@endforeach
								</select>

								<span class="input-group-btn">
   								 <button class="btn btn-default search-btn" type="submit"><i class="glyphicon glyphicon-search icon"></i></button>
  								</span>
							</div>
						</div>
						
					</div>
					
				</form>
			
			</div>
		
		</div>
		
	</section>
	
	
@endsection