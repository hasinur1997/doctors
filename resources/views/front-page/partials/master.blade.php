<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Doc Template</title>
	<!-- Latest compiled and minified CSS -->
	<!-- Latest compiled and minified CSS -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
	
	<!--<link rel="stylesheet" type="text/css" href="/css/app.css" media="all" />-->

	<link rel="stylesheet" href="/css/font-awesome.css">
	
	

	<link rel="stylesheet" href="/css/select2.min.css">

	<link rel="stylesheet" href="/css/front.css">
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	
</head>
<body>
	
	<!-- Header Section -->
	
	<header> 
	
		<nav class="navbar navbar-default">
		
			<div class="container"> 
				
				<div class="navbar-header"> 
				
					<a href="{{ url('/') }}" class="navbar-brand">ডাক্তার ডিরেক্টরি</a>
					
					
				</div>
				
				
			</div>
			
		</nav>
		
	</header>

	<!-- Content -->
	@yield('content')





	<!-- Doctor Specialty Section -->
	@include('front-page.partials.specialty');
	
	<!-- Section Footer  -->
	<div class="footer"> 
		
		<div class="container"> 
			
			<div class="row"> 
				
				<div class="col-md-6"> 
				
					<p>&copy;All right reserved</p>
					
				</div>
				
				<div class="col-md-6"> 
				
					<ul class="nav navbar-nav navbar-right footer-nav">
					
						<li><a href="#">হোম</a></li>
						
						<li><a href="#">ব্লগ</a></li>
						
						<li><a href="#">আমাদের সেবা</a></li>
						
					</ul>
					
				</div>
			</div>
			
		</div>
	</div>
	
	<!-- JS -->
	
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<script type="text/javascript" src="/js/select2.full.min.js"></script>
	
	<script type="text/javascript">
	
		$(document).ready(function() {
		
		  $(".s1, .s2").select2();
		  
		});
		
	</script>
	
</body>
</html>