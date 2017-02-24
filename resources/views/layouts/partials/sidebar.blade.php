
	<nav class="col-md-2  sidebar">
	  <ul class="nav nav-pills flex-column">
		<li class="nav-item">
		  <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
		</li>
		
		
		<li class="dropdown nav-item">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Doctors <span class="caret"></span></a>

          <ul class="dropdown-menu">

            <li><a href="{{ route('admin.create') }}">Add new record</a></li>

            <li><a href="{{ route('admin.index') }}">All record</a></li>

         
            
 
          </ul>
        </li>


          <li class="dropdown nav-item">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hospital <span class="caret"></span></a>

            <ul class="dropdown-menu">

              <li><a href="{{ route('hospitals.create') }}">Add new record</a></li>

              <li><a href="{{ route('hospitals.index') }}">All record</a></li>

            
              
   
            </ul>
        </li>


        <li class="dropdown nav-item">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Education <span class="caret"></span></a>

          <ul class="dropdown-menu">

            <li><a href="{{ route('education.create') }}">Add new education</a></li>

            <li><a href="{{ route('education.index') }}">All record</a></li>

 
          </ul>
        </li>


        <li class="dropdown nav-item">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Specialty <span class="caret"></span></a>

          <ul class="dropdown-menu">

            <li><a href="{{ route('specialties.create') }}">Add new specialty</a></li>

            <li><a href="{{ route('specialties.index') }}">All record</a></li>

 
          </ul>
        </li>


        <li class="dropdown nav-item">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Location <span class="caret"></span></a>

          <ul class="dropdown-menu">

            <li><a href="{{ route('location.create') }}">Add new location</a></li>

            <li><a href="{{ route('location.index') }}">All record</a></li>

 
          </ul>
        </li>
	  </ul>
	</nav>
  