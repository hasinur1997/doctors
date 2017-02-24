@if(session()->has('flash_notification.message'))

	{{--<div class="alert alert-{{ session('flash_notification.level') }}"> 
		
		{{ session('flash_notification.message') }}
		
	</div>--}}


	<script> 
		swal({ 

			title: "{{ session('flash_notification.level') }}",

			text: "{{ session('flash_notification.message') }}",

			type:  "{{ session('flash_notification.level') }}"
		});
	</script>

@endif