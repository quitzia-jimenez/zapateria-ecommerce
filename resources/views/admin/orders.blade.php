@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Pedidos</h5>
    
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
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">

                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0"># Orden</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Nombre</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Telefono</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Subtotal</h6>
                                                </th>
                
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Tax</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Total</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Estatus</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Fecha de orden</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Total productos</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Fecha Envio</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Detalles</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$order->id}}</h6></td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">{{$order->name}}</h6>                       
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{$order->phone}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{$order->subtotal}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">${{$order->tax}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{$order->total}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{$order->status}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{$order->created_at}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{$order->orderItems->count()}}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{$order->delivered_date}}</h6>
                                                </td>
                                                <td>
                                                    <div class="list-icon-function">
                                                        <a href="{{route('admin.order.details',['order_id'=>$order->id])}}">
                                                        <i class="fa-solid fa-eye" style="color: #5074e2;"></i>
                                                        </a>
                                                    </div>
                                                </td>
                
                                            </tr> 
                                            @endforeach
                                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="divider"></div>
                                <div class="flex items-center justify-between flex-wrap gap-10 wgp-pagination">
                                    {{$orders->links('pagination::bootstrap-5')}}
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


    
@endpush