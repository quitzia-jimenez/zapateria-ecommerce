@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Editar Usuario</h5>
            <div class="card">
                <div class="card-body">
                  <form action="{{route('admin.user.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$user->id}}">
        
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del usuario</label>
                        <input id="name" name="name" type="text" placeholder="Nombre del usuario" class="form-control"  tabindex="0" value="{{$user->name}}"  aria-required="true" required=""> 
                        <div class="text-tiny">Ingresa el nuevo nombre de usuario</div>
                    </div>
                    @error('name') <span class="alert alert-danger text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control" type="email" placeholder="Email del usuario" name="email" tabindex="0" value="{{$user->email}}"  aria-required="true" required="">
                        <div class="text-tiny">Ingresa el nuevo email de usuario</div>
                    </div>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Teléfono</label>
                        <input id="mobile" class="form-control" type="text" placeholder="Teléfono del usuario" name="mobile" tabindex="0" value="{{$user->mobile}}"  aria-required="true" required="">
                        <div class="text-tiny">Ingresa el nuevo teléfono de usuario</div>
                    </div>
                    @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="old_password" class="form-label">Contraseña Antigua</label>
                        <input id="old_password" class="form-control" type="password" placeholder="Ingresa la antigua contraseña" name="old_password" tabindex="0">
                        <div class="text-tiny">Ingresa la antigua contraseña de usuario</div>
                    </div>
                    @error('old_password') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nueva Contraseña</label>
                        <input id="new_password" class="form-control" type="password" placeholder="Ingresa la nueva contraseña" name="new_password" tabindex="0">
                        <div class="text-tiny">Ingresa la nueva contraseña de usuario</div>
                    </div>
                    @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmar Nueva Contraseña</label>
                        <input id="confirm_password" class="form-control" type="password" placeholder="Confirma la nueva contraseña" name="confirm_password" tabindex="0">
                        <div class="text-tiny">Confirma la nueva contraseña de usuario</div>
                    </div>
                    @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                        <label for="untype" class="form-label">Tipo de usuario</label>
                        <input id="untype" class="form-control" type="text" placeholder="Tipo de usuario" name="untype" tabindex="0" value="{{$user->untype}}"  aria-required="true" required="">
                        <div class="text-tiny">Selecciona el tipo de usuario ADM para administrador</div>
                    </div>
                    @error('untype') <span class="text-danger">{{ $message }}</span> @enderror

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection