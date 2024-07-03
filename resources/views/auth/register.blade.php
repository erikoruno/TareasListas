@extends('layouts.form')

@section('content')

<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">

					<div class="card-body">
						<img src="{{ asset('images/logo-dark.png')}}" alt="" class="img-fluid mb-4">
						@if ($errors->any())
                            <h4 class="mb-3 f-w-400">Ufff algo salió mal. Intenta de nuevo</h4>    
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first()}}
                            </div>
                        @else
                            <h4 class="mb-3 f-w-400">Ingresa tus datos</h4>    
                        @endif

                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf

						<div class="form-group mb-3">
							<label class="floating-label" for="Username"></label>
							<input type="text" class="form-control" id="Username" placeholder="Nombre" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
						</div>
						<div class="form-group mb-3">
							<label class="floating-label" for="Email"></label>
							<input type="text" class="form-control" id="Email" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required autocomplete="email">
						</div>
						<div class="form-group mb-4">
							<label class="floating-label" for="Password"></label>
							<input type="password" class="form-control" id="Password" placeholder="Contraseña" name="password" required autocomplete="new-password">
						</div>

                        <div class="form-group mb-4">
							<label class="floating-label" for="Password"></label>
							<input type="password" class="form-control" id="Password" placeholder="Repetir Contraseña" name="password_confirmation" required autocomplete="new-password">
						</div>

						
						<button type="submit" class="btn btn-primary btn-block mb-4">Registrese</button>
						<p class="mb-2">Ya tienes una cuenta? <a href="{{ route('login') }}" class="f-w-400">Empieza</a></p>
					</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
