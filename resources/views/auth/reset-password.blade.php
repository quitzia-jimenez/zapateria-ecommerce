@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Restablecer contraseña</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('recuperacion.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                        readonly>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nueva contraseña</label>

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

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar
                                    contraseña</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Restablecer contraseña
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const passwordConfirm = document.getElementById('password-confirm');
            const form = document.querySelector('form');
            const submitButton = form.querySelector('button[type="submit"]');
            const emailError = document.createElement('div');
            const passwordError = document.createElement('div');
            const passwordConfirmError = document.createElement('div');

            emailError.className = 'invalid-feedback';
            passwordError.className = 'invalid-feedback';
            passwordConfirmError.className = 'invalid-feedback';

            email.parentNode.appendChild(emailError);
            password.parentNode.appendChild(passwordError);
            passwordConfirm.parentNode.appendChild(passwordConfirmError);

            function validateEmail() {
                if (!email.value) {
                    emailError.textContent = 'El correo electrónico es requerido';
                    email.classList.add('is-invalid');
                    return false;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
                    emailError.textContent = 'Ingresa un correo electrónico válido';
                    email.classList.add('is-invalid');
                    return false;
                } else {
                    emailError.textContent = '';
                    email.classList.remove('is-invalid');
                    return true;
                }
            }

            function validatePassword() {
                if (!password.value) {
                    passwordError.textContent = 'La contraseña es requerida';
                    password.classList.add('is-invalid');
                    return false;
                } else if (password.value.length < 8) {
                    passwordError.textContent = 'La contraseña debe tener al menos 8 caracteres';
                    password.classList.add('is-invalid');
                    return false;
                } else {
                    passwordError.textContent = '';
                    password.classList.remove('is-invalid');
                    return true;
                }
            }

            function validatePasswordConfirm() {
                if (!passwordConfirm.value) {
                    passwordConfirmError.textContent = 'Confirma tu contraseña';
                    passwordConfirm.classList.add('is-invalid');
                    return false;
                } else if (password.value !== passwordConfirm.value) {
                    passwordConfirmError.textContent = 'Las contraseñas no coinciden';
                    passwordConfirm.classList.add('is-invalid');
                    return false;
                } else {
                    passwordConfirmError.textContent = '';
                    passwordConfirm.classList.remove('is-invalid');
                    return true;
                }
            }

            function validateForm() {
                const isEmailValid = validateEmail();
                const isPasswordValid = validatePassword();
                const isPasswordConfirmValid = validatePasswordConfirm();

                submitButton.disabled = !(isEmailValid && isPasswordValid && isPasswordConfirmValid);
            }

            email.addEventListener('input', validateForm);
            password.addEventListener('input', validateForm);
            passwordConfirm.addEventListener('input', validateForm);

            validateForm();
        });
    </script>
@endpush