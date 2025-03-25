@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Categorias</h5>

            <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="card w-100">
                    <div class="card-body p-4">
                         <!-- Barra de búsqueda -->

                         <div class="d-flex align-items-right mb-4">
                            <a href="{{route('admin.category.add')}}" class="btn btn-outline-primary d-flex align-items-center m-1"><i class="fa-solid fa-plus" style="color: #d63384;"></i>Agregar nuevo</a>
                        </div>
                        

                        <div class="table-responsive">
                            @if(Session::has('status'))
                                <p class = "alert alert-success">{{Session::get('status')}}</p>
                            @endif
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Imagen</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nombre</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">*SLUG*</h6>
                                    </th>

                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Producto</h6>
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

                                @foreach($categories as $category)
                                    <tr>
                                        <td class="border-bottom-0">{{$category->id}}</td>

                                        <td class="border-bottom-0">
                                            <div class="image">
                                                <img src="{{asset('uploads/categories')}}/{{$category->image}}" alt="{{$category->name}}" class="img-fluid">
                                            </div>                       
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="name">
                                                <a href="#" class="fw-semibold mb-0 fs-4">{{$category->name}}</a>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            {{$category->slug}}
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="#" target="_blank">0</a>
                                        </td>
                                        <td>
                                            <div class="list-icon-function">
                                                <a href="{{route('admin.category.edit', ['id' => $category->id])}}">
                                                <i class="fa-solid fa-pen" style="color: #FFD43B;"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.category.delete',['id'=>$category->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="list-icon-function delete ">
                                                    <button type="submit" class="btn btn-link p-0 m-0" style="border: none; background: none;">
                                                        <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                                    </button>
                                                    
                                                </div>
                                                    
                                                
                                            </form>
                                        </td>

                                    </tr> 
                                @endforeach
                                                    
                                </tbody>
                            </table>
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