@extends('layouts.login')
@section('css')
    <style>
        .contenedor {
            display: flex;
            max-width: 1000px;
            min-height: 600px;
            height: auto;
            overflow: visible;
        }

        .ladoDerecho {
            flex: 1;
            padding: 40px;
            height: auto;
            min-height: 100%;
            overflow-y: auto;
        }

        .ladoIzquierdo {
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            height: auto;
            min-height: 100%;
        }

        .grupoEntrada {
            position: relative;
            margin-bottom: 20px;
        }

        .entradaTexto:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .entradaTexto.is-invalid,
        .entradaTexto[style*="border-color: #dc3545"] {
            border-color: #dc3545 !important;
        }

        .entradaTexto[style*="border-color: #28a745"] {
            border-color: #28a745 !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(.375em + .1875rem) center;
            background-size: calc(.75em + .375rem) calc(.75em + .375rem);
        }

        .field-error-message {
            font-size: 12px;
            color: #dc3545;
            margin-top: 5px;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .entradaTexto {
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .botonIniciar {
            transition: opacity 0.3s ease, background-color 0.3s ease;
        }

        .botonIniciar:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            .contenedor {
                flex-direction: column;
                height: auto;
            }

            .ladoIzquierdo {
                width: 100%;
                padding: 30px 0;
            }

            .ladoDerecho {
                width: 100%;
            }
        }
    </style>
@endsection

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

                    <input id="name" type="text" class="entradaTexto" @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus
                        placeholder="Ingresa tu nombre de usuario">
                    <i class="fa fa-user icono"></i>
                    @if ($errors->has('name'))
                        <div class="d-flex align-items-center"
                            style="padding: 0.8rem; margin: 0.5rem 0; border-left: 4px solid #dc3545; border-radius: 0.3rem; background-color: rgba(220,53,69,0.1);">
                            <i class="fas fa-exclamation-triangle me-3" style="color: #dc3545; font-size: 1.2rem;"></i>
                            <span style="color: #dc3545; font-weight: 500;">Nombre de usuario no válido.</span>
                        </div>
                    @endif

                </div>
                {{-- campo de email --}}
                <div class="grupoEntrada">
                    <label for="email" class="etiqueta">Correo Electronico</label>

                    <input id="email" type="email" class="entradaTexto @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresa tu email">
                    <i class="fa-solid fa-envelope icono"></i>
                    @if ($errors->has('email'))
                        <div class="d-flex align-items-center"
                            style="padding: 0.8rem; margin: 0.5rem 0; border-left: 4px solid #dc3545; border-radius: 0.3rem; background-color: rgba(220,53,69,0.1);">
                            <i class="fas fa-exclamation-triangle me-3" style="color: #dc3545; font-size: 1.2rem;"></i>
                            <span style="color: #dc3545; font-weight: 500;">Por favor, ingresa un correo electrónico
                                válido.</span>
                        </div>
                    @endif
                </div>

                {{-- campo de telefono --}}
                <div class="grupoEntrada">
                    <label for="mobile" class="etiqueta">Número de celular</label>

                    <input id="mobile" type="mobile" class="entradaTexto @error('mobile') is-invalid @enderror"
                        name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile"
                        placeholder="Ingresa tu número celular">
                    <i class="fa-solid fa-phone icono"></i>
                    @if ($errors->has('mobile'))
                        <div class="d-flex align-items-center"
                            style="padding: 0.8rem; margin: 0.5rem 0; border-left: 4px solid #dc3545; border-radius: 0.3rem; background-color: rgba(220,53,69,0.1);">
                            <i class="fas fa-exclamation-triangle me-3" style="color: #dc3545; font-size: 1.2rem;"></i>
                            <span style="color: #dc3545; font-weight: 500;">Por favor, ingresa un número telefónico
                                válido. Por el momento este no lo es.</span>
                        </div>
                    @endif

                </div>

                {{-- campo de contrasenia --}}
                <div class="grupoEntrada">
                    <label for="password" class="etiqueta">Contraseña</label>
                    <input id="password" type="password" class="entradaTexto @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Ingresa tu contraseña">
                    <i class="fa fa-lock icono"></i>
                    @if ($errors->has('password'))
                        <div class="d-flex align-items-center"
                            style="padding: 0.8rem; margin: 0.5rem 0; border-left: 4px solid #dc3545; border-radius: 0.3rem; background-color: rgba(220,53,69,0.1);">
                            <i class="fas fa-exclamation-triangle me-3" style="color: #dc3545; font-size: 1.2rem;"></i>
                            <span style="color: #dc3545; font-weight: 500;">Por favor, ingresa una contraseña robusta
                                válida. Por el momento esta no lo es.</span>
                        </div>
                    @endif
                </div>

                {{-- campo de verificar contrasenia --}}
                <div class="grupoEntrada">
                    <label for="password-confirm" class="etiqueta">Contraseña</label>
                    <input id="password-confirm" type="password" class="entradaTexto" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Confirma tu contraseña">
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
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                    Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
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

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form[action*="register"]');
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;

            const validationRules = {
                name: {
                    pattern: /^[a-zA-Z0-9_]{3,20}$/,
                    message: 'El nombre de usuario debe tener entre 3 y 20 caracteres y solo puede contener letras, números y guiones bajos.'
                },
                email: {
                    pattern: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/,
                    message: 'Por favor, ingresa un correo electrónico válido.'
                },
                mobile: {
                    pattern: /^\d{10}$/,
                    message: 'El número de celular debe tener 10 dígitos numéricos.'
                },
                password: {
                    pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/,
                    message: 'La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una minúscula y un número.'
                },
                password_confirmation: {
                    message: 'Las contraseñas no coinciden.'
                }
            };

            function showFieldError(input, message) {
                const inputGroup = input.closest('.grupoEntrada');
                let errorElement = inputGroup.querySelector('.field-error-message');

                if (!errorElement) {
                    errorElement = document.createElement('div');
                    errorElement.className = 'field-error-message';
                    errorElement.style.color = '#dc3545';
                    errorElement.style.fontSize = '12px';
                    errorElement.style.marginTop = '5px';
                    errorElement.style.display = 'flex';
                    errorElement.style.alignItems = 'center';

                    const icon = document.createElement('i');
                    icon.className = 'fa fa-exclamation-circle';
                    icon.style.marginRight = '5px';
                    errorElement.appendChild(icon);

                    const textSpan = document.createElement('span');
                    textSpan.textContent = message;
                    errorElement.appendChild(textSpan);

                    inputGroup.appendChild(errorElement);
                } else {
                    const textSpan = errorElement.querySelector('span');
                    textSpan.textContent = message;
                    errorElement.style.display = 'flex';
                }
            }

            function hideFieldError(input) {
                const inputGroup = input.closest('.grupoEntrada');
                const errorElement = inputGroup.querySelector('.field-error-message');

                if (errorElement) {
                    errorElement.style.display = 'none';
                }
            }

            function validateField(input) {
                const fieldName = input.getAttribute('name');
                const value = input.value.trim();

                if (input.hasAttribute('required') && value === '') {
                    input.style.borderColor = '#dc3545';
                    showFieldError(input, 'Este campo es obligatorio.');
                    return false;
                }

                if (!validationRules[fieldName]) {
                    input.style.borderColor = '';
                    hideFieldError(input);
                    return true;
                }

                if (fieldName === 'password_confirmation') {
                    const password = document.getElementById('password').value;
                    if (value !== password) {
                        input.style.borderColor = '#dc3545';
                        showFieldError(input, validationRules[fieldName].message);
                        return false;
                    }
                    input.style.borderColor = '#28a745';
                    hideFieldError(input);
                    return true;
                }

                if (validationRules[fieldName].pattern && !validationRules[fieldName].pattern.test(value)) {
                    input.style.borderColor = '#dc3545';
                    showFieldError(input, validationRules[fieldName].message);
                    return false;
                }

                input.style.borderColor = '#28a745';
                hideFieldError(input);
                return true;
            }

            function checkFormValidity() {
                let isValid = true;

                form.querySelectorAll('input[required]').forEach(input => {
                    if (!validateField(input)) {
                        isValid = false;
                    }
                });

                submitButton.disabled = !isValid;

                if (isValid) {
                    submitButton.style.opacity = '1';
                    submitButton.style.cursor = 'pointer';
                } else {
                    submitButton.style.opacity = '0.6';
                    submitButton.style.cursor = 'not-allowed';
                }

                return isValid;
            }

            form.querySelectorAll('input').forEach(input => {
                input.addEventListener('input', function () {
                    validateField(this);
                    checkFormValidity();
                });

                input.addEventListener('blur', function () {
                    validateField(this);
                    checkFormValidity();
                });
            });

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                if (checkFormValidity()) {
                    const successAlert = document.createElement('div');
                    successAlert.style.backgroundColor = '#d4edda';
                    successAlert.style.color = '#155724';
                    successAlert.style.padding = '10px 15px';
                    successAlert.style.marginBottom = '15px';
                    successAlert.style.borderRadius = '4px';
                    successAlert.style.display = 'flex';
                    successAlert.style.alignItems = 'center';

                    const successIcon = document.createElement('i');
                    successIcon.className = 'fa fa-check-circle';
                    successIcon.style.marginRight = '10px';
                    successAlert.appendChild(successIcon);

                    const successText = document.createElement('span');
                    successText.textContent = 'Formulario enviado correctamente!';
                    successAlert.appendChild(successText);

                    form.insertBefore(successAlert, form.firstChild);

                    setTimeout(() => {
                        form.removeChild(successAlert);
                        this.submit();
                    }, 2000);
                }
            });

            checkFormValidity();
        });
    </script>
@endsection