@if(Session::get('success'))
	<div class="alert alert-success">
		<div class="container">
          <div class="alert-icon">
            <i class="material-icons">check</i>
          </div>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
          </button>
          <b>Bien hecho!</b>
          	{{-- {{dd(Session::get('success'))}} --}}
     		{{-- @foreach(Session::get('success') as $success) --}}
				{{ Session::get('success') }}
			{{-- @endforeach --}}
        </div>
     </div>
@endif