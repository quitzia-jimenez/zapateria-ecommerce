@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Usuarios</h5>

            <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <!-- Barra de búsqueda -->

                            <div class="d-flex align-items-right mb-4">
                                <form class="form-search d-flex">
                                    <input type="text" id="searchInput" class="form-control me-2 w-30" placeholder="Buscar..." name="name" tabindex="2" value="" aria-required="true">
                                    <button class="btn btn-primary d-flex align-items-center m-1"">
                                        <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i> Buscar
                                    </button>
                                </form>
                                <a href="#" class="btn btn-outline-primary d-flex align-items-center m-1"><i class="fa-solid fa-plus" style="color: #d63384;"></i>Agregar nuevo</a>
                            </div>

                            

                            <div class="table-responsive">
                                @if(Session::has('status'))
                                    <p class = "alert alert-success">{{Session::get('status')}}</p>
                                @endif
                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">#</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nombre</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Correo</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Teléfono</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Contraseña</h6>
                                        </th>

                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tipo</h6>
                                        </th>

                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Visualizar</h6>
                                        </th>

                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Editar</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Eliminar</h6>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->mobile}}</td>
                                            <td>{{$user->password}}</td>
                                            <td>{{$user->untype}}</td>
                                            <td></td>
                                            <td>
                                                <div class="list-icon-function">
                                                    <a href="{{route('admin.user.edit', ['id'=>$user->id])}}">    
                                                    <i class="fa-solid fa-pen" style="color: #FFD43B;"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td></td>
                                            {{-- <td><a href="{{route('admin.user.view', ['id'=>$user->id])}}" class="btn btn-primary">Visualizar</a></td> --}}
                                            
                                            {{-- <td>
                                                <form method="POST" action="{{route('admin.user.delete', ['id'=>$user->id])}}">
                                                    @csrf
                                                    <button class="btn btn-danger delete">Eliminar</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="divider"></div>
                            <div class="flex items-center justify-between flex-wrap gap-10 wgp-pagination">
                                {{$users->links('pagination::bootstrap-5')}}
                            </div>

                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

@push('scripts')
<script>
    $(function(){
        $('.delete').on('click', function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title: "¿Estás seguro?",
                text: "Una vez eliminado, no podrás recuperar este archivo!",
                icon: "warning",
                buttons: ["Cancelar", "Sí, eliminar!"],
                confirmButtonColor: '#d33',
            }).then(function(result){
                    if(result){
                        form.submit();
                    }

                });
            });
        });
</script>
@endpush