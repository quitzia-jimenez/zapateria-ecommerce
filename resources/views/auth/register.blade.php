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
        <div class="encabezadoFormulario">
            <h2 class="tituloFormulario" style="color:#FFFF">¡Bienvenido!</h2>
            <p class="subtituloFormulario" style="color:#FFFF; position: absolute;">Crear cuenta</p>
        </div>
    </div>

    <div class="ladoDerecho">
        <div class="encabezadoFormulario"></div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            {{-- campo de nombre --}}
            <div class="grupoEntrada">
                <label for="name" class="etiqueta">Usuario</label>

                <input id="name" type="text" class="entradaTexto" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ingresa tu nombre de usuario">
                <i class="fa fa-user icono"></i>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
            </div>
            {{-- campo de email --}}
            <div class="grupoEntrada">
                <label for="email" class="etiqueta">Correo Electronico</label>

                <input id="email" type="email" class="entradaTexto @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresa tu email">
                <i class="fa-solid fa-envelope icono"></i>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
            </div>

             {{-- campo de telefono --}}
             <div class="grupoEntrada">
                <label for="mobile" class="etiqueta">Número de celular</label>

                <input id="mobile" type="mobile" class="entradaTexto @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" placeholder="Ingresa tu número celular">
                <i class="fa-solid fa-phone icono"></i>
                @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
            </div>

            {{-- campo de contrasenia --}}
            <div class="grupoEntrada">
                <label for="password" class="etiqueta">Contraseña</label>
                <input id="password" type="password" class="entradaTexto @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Ingresa tu contraseña">
                <i class="fa fa-lock icono"></i>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            {{-- campo de  verificar contrasenia --}}
            <div class="grupoEntrada">
                <label for="password-confirm" class="etiqueta">Contraseña</label>
                <input id="password-confirm" type="password" class="entradaTexto" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma tu contraseña">
                <i class="fa fa-lock icono"></i>
                

            </div>

            <button type="submit" class="botonIniciar">CREAR CUENTA</button>

            <div class="opciones">
                <span class="etiqueta"> Ya tienes cuenta?</span>
                <a href="{{route('login')}}" class="olvidoContrasena">Iniciar Sesión</a>
            </div>
        </form>
    </div>
</div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
