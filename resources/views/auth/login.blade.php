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
                            <h4 class="mb-3 f-w-400">Ingresa los datos solicitados</h4>    
                        @endif
                        
                        

                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
						<div class="form-group mb-3">
							<label class="floating-label" for="Email"></label>
							<input type="text" class="form-control" id="Email" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						</div>
						<div class="form-group mb-4">
							<label class="floating-label" for="Password"></label>
							<input type="password" class="form-control" id="Password" placeholder="Contraseña" name="password" required autocomplete="current-password">
						</div>
						<div class="custom-control custom-checkbox text-left mb-4 mt-2">
							<input name="remember" type="checkbox" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<label class="custom-control-label" for="remember">Recordar</label>
						</div>
						<button type="submit" class="btn btn-block btn-primary mb-4">Comenzar</button>
                        </form>
						<p class="mb-2 text-muted">Olvidaste tú contraseña? <a href="{{ route('password.request') }}" class="f-w-400">Buscar</a></p>
						<p class="mb-0 text-muted">Crear nueva cuenta? <a href="{{ route('register')}}" class="f-w-400">Ir</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
