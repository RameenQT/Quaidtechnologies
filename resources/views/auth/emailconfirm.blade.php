@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <b>Stambz</b>
    </div>
		<div class="row">
			<div class="col-md-10 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
					@if ($message = Session::get('success'))
						<!--Registration Confirmed !-->
						Registrering bekræftet
					@endif
					@if ($message = Session::get('warning'))
						<!--Registration Already Confirmed!-->
						Registrering allerede bekræftet
					@endif
					</div>
					<div class="panel-body">
						@if ($message = Session::get('success'))
							<div class="alert alert-success">
								<p>{{ $message }}</p>
							</div>
						@endif

						@if ($message = Session::get('warning'))
							<div class="alert alert-warning">
								<p>{{ $message }}</p>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>

   
    <!-- /.login-box-body -->
</div>
@endsection
