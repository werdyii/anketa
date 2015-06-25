	@if ($errors->any())
	
		<div class="alert alert-danger">
			
			@foreach($errors->all() as $error)
				<div class="row"><strong>POZOR !!! </strong> {{ $error }}</div>
			@endforeach
			
		</div>
		
	@endif