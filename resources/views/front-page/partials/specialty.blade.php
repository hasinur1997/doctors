<section class="doc-specialty-section"> 
		
		<div class="container"> 
		
			<div class="row"> 
				
				
				<div class="col-md-3"> 
				
					<h3 class="doc-specialty-title">বিশেষত্ব</h3>
					
				</div>
				
				<div class="col-md-9"> 
					
					<div class="doc-specialty-cat">
						
						<ul class="doc-specialty">
							@foreach($specialties as $specialty)

								<li><a href="{{ url('search/'.$specialty->id) }}">{{ $specialty->name }}</a></li>

							@endforeach
						</ul>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</section>