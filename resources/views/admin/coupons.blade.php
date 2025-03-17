@extends('layouts.admin')
@section('content')

<main>
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
                                    <form class="form-search d-flex">
                                        <input type="text" id="searchInput" class="form-control me-2 w-30" placeholder="Buscar..." name="name" tabindex="2" value="" aria-required="true">
                                        <button class="btn btn-primary d-flex align-items-center m-1"">
                                            <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i> Buscar
                                        </button>
                                    </form>
                                    <a href="{{route('admin.coupon.add')}}" class="btn btn-outline-primary d-flex align-items-center m-1"><i class="fa-solid fa-plus" style="color: #d63384;"></i>Agregar nuevo</a>
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
                                                <h6 class="fw-semibold mb-0">Codigo</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Type</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Valor</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Valor carrito</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Fecha expiracion</h6>
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
                                            @foreach($coupons as $coupon)
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">{{$coupon->id}}</h6>                       
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">{{$coupon->code}}</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{$coupon->type}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{$coupon->value}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">${{$coupon->cart_value}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{$coupon->expiry_date}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="list-icon-function">
                                                        <a href="{{route('admin.coupon.edit', ['id' => $coupon->id])}}">
                                                            <i class="fa-solid fa-pen" style="color: #FFD43B;"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <form action="{{route('admin.coupon.delete',['id'=>$coupon->id])}}" method="POST">
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
                                    {{$coupons->links('pagination::bootstrap-5')}}
                                </div>
    
                            
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    
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

