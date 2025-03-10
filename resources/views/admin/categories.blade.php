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
                            <form class="form-search d-flex">
                                <input type="text" id="searchInput" class="form-control me-2 w-30" placeholder="Buscar..." name="name" tabindex="2" value="" aria-required="true">
                                <button class="btn btn-primary d-flex align-items-center m-1"">
                                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i> Buscar
                                </button>
                            </form>
                            <a href="{{route('admin.category.add')}}" class="btn btn-outline-primary d-flex align-items-center m-1"><i class="fa-solid fa-plus" style="color: #d63384;"></i>Agregar nuevo</a>
                        </div>
                        

                        <div class="table-responsive">
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
                                            <a href="#">
                                            <i class="fa-solid fa-pen" style="color: #FFD43B;"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4">Pendiente</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <button type="button" class="btn btn-warning">Editar</button>
                                    </td>
                                    <td class="border-bottom-0">
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                    </td>

                                </tr> 
                            @endforeach
                                                
                            </tbody>
                        </table>
                        </div>


        </div>
    </div>
</div>
    
@endsection