{{-- <ul> --}}
	@if(Session::get('errors'))
	<div class="alert alert-danger">
        <div class="container">
          	<div class="alert-icon">
	            <i class="material-icons">error_outline</i>
	        </div>
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true"><i class="material-icons">clear</i></span>
	        </button>
          	<b>Alerta:</b>
			@foreach($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
        </div>
     </div>
	@endif
{{-- </ul> --}}