@if (session()->has('flash_notification'))
	<script>
		swal({
			title: 'Awok.com',  
			text: "{{ session('flash_notification.message') }}",  
			type: "{{ session('flash_notification.level') == 'danger' ? 'error' : session('flash_notification.level') }}", 
			showConfirmButton: true,
			confirmButtonText: 'Okay'
		});
	</script>
@endif