@extends('layouts.app')
@section('content')

<section class="seccion-perfil-cliente">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                @include('user.account-nav')
            </div>

            <div class="col-lg-9">
                <!-- Orders Section -->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <h2>Mis Pedidos</h2>
                        <p>Historial completo de tus compras.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pedido #</th>
                                    <th>Nombre</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Fecha de pedido</th>
                                    <th>Productos</th>
                                    <th>Fecha de envio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>${{$order->total}}</td>
                                    <td>
                                        @if($order->status == 'enviado')
                                            <span >Enviado</span>
                                        @elseif($order->status == 'cancelado')
                                            <span>Cancelado</span>
                                        @else
                                            <span>Ordenado</span>
                                        @endif
                                    </td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->orderItems->count()}}</td>
                                    <td>{{$order->delivered_date}}</td>
                                    <td>
                                        <a href="{{route('user.order.details',['order_id'=>$order->id])}}" class="order-action"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap-10 wgp-pagination">
                        {{$orders->links('pagination::bootstrap-5')}} </div>
                </div>
                
                
            </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')
    <script src="{{asset('recursos/user/js/index.js')}}"></script>
@endsection