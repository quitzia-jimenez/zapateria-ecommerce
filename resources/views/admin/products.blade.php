@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Productos</h5>

            <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <!-- Barra de búsqueda -->

                            <div class="d-flex align-items-right mb-4">
                                <a href="{{route('admin.product.add')}}" class="btn btn-outline-primary d-flex align-items-center m-1"><i class="fa-solid fa-plus" style="color: #d63384;"></i>Agregar nuevo</a>
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
                                            <h6 class="fw-semibold mb-0">Precio</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">C/Descuento</h6>
                                        </th>

                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">SKU</h6>
                                        </th>

                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Categoria</h6>
                                        </th>
                                        
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Caracteristica</h6>
                                        </th>

                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Stock</h6>
                                        </th>

                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Cantidad</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tallas</h6>
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
                                        @foreach ($products as $product)
                                            
                                        
                                        <tr>
                                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$product->id}}</h6></td>
                                            <td  class="pname">
                                                <div>
                                                    <img src="{{asset('uploads/products/thumbnails')}}/{{$product->image}}" alt="{{$product->name}}" class="image">
                                                    <a href="#" class="fw-semibold mb-1">{{$product->name}}</a>
                                                    <div class="text-tiny">{{$product->slug}}</div>
                                                    
                                                </div>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">{{$product->regular_price}}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">{{$product->sale_price}}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">{{$product->SKU}}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">{{$product->category->name}}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">{{$product->featured == 0 ? "No":"Si"}}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">{{$product->stock_status}}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">{{$product->quantity}}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    @foreach ($product->sizes as $size)
                                                        {{ $size->size }} ({{ $size->pivot->quantity }})<br>
                                                    @endforeach
                                                </h6>
                                            </td>
                                            <td>
                                                <div class="list-icon-function">
                                                    <a href="#">
                                                    <i class="fa-solid fa-eye" style="color: #5074e2;"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="list-icon-function">
                                                    <a href="{{route('admin.product.edit', ['id'=>$product->id])}}">    
                                                    <i class="fa-solid fa-pen" style="color: #FFD43B;"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{route('admin.product.delete',['id'=>$product->id])}}" method="POST">
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
                            <div class="divider"></div>
                            <div class="flex items-center justify-between flex-wrap gap-10 wgp-pagination">
                                {{$products->links('pagination::bootstrap-5')}}
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