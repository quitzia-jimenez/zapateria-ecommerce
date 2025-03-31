@extends('layouts.login')

@section('content')


    <div class="contenedor">
        <div class="ladoIzquierdo">
            <div class="logoBurbujas">
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
            </div>
            <h1 class="logo">BOMU</h1>
        </div>

        <div class="ladoDerecho">
            <div class="encabezadoFormulario">
                <h2 class="tituloFormulario">¡Bienvenido de nuevo!</h2>
                <p class="subtituloFormulario">Inicia sesión nuevamente</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if ($errors->has('email'))
                    <div class="d-flex align-items-center"
                        style="padding: 0.8rem; margin: 0.5rem 0; border-left: 4px solid #dc3545; border-radius: 0.3rem; background-color: rgba(220,53,69,0.1);">
                        <i class="fas fa-exclamation-triangle me-3" style="color: #dc3545; font-size: 1.2rem;"></i>
                        <span style="color: #dc3545; font-weight: 500;">Por favor, revisa nuevamente tus datos. No encontramos
                            los anteriores</span>
                    </div>
                @endif

                <div class="grupoEntrada">
                    <label for="email" class="etiqueta">Email</label>

                    <input id="email" type="email" placeholder="Ingresa tu email"
                        class="entradaTexto @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>
                    <i class="fa-solid fa-envelope icono"></i>
                </div>

                <div class="grupoEntrada">
                    <label for="password" class="etiqueta">Contraseña</label>
                    <input id="password" type="password" class="entradaTexto @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Ingresa tu contraseña">
                    <i class="fa fa-lock icono"></i>
                    @if ($errors->has('password'))
                        <div class="d-flex align-items-center"
                            style="padding: 0.8rem; margin: 0.5rem 0; border-left: 4px solid #dc3545; border-radius: 0.3rem; background-color: rgba(220,53,69,0.1);">
                            <i class="fas fa-exclamation-triangle me-3" style="color: #dc3545; font-size: 1.2rem;"></i>
                            <span style="color: #dc3545; font-weight: 500;">Contraseña no coincidente</span>
                        </div>
                    @endif

                </div>

                <div class="opciones">
                    <div class="recordar">
                        <input type="checkbox" name="remember" id="remember" class="casilla" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="textoRecordar">Recordarme</label>
                    </div>
                    @if (Route::has('recuperacion.solicitud'))
                        <a href="{{ route('recuperacion.solicitud') }}" class="olvidoContrasena">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>

                <button type="submit" class="botonIniciar">INICIAR SESIÓN</button>

                <div class="opciones">
                    <span class="etiqueta"> Aun no tienes cuenta?</span>
                    <a href="{{route('register')}}" class="olvidoContrasena">Registarme</a>
                </div>

            </form>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection