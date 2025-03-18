@extends('layouts.app')
@section('content')

<section class="seccion-perfil-cliente">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="slidebar-perfil-cliente">
                    <div class="avatar-perfil-cliente">
                        <img src="#" alt="Foto de perfil">
                        <h4>{{Auth::user()->name}}</h4>
                    </div>
                    @include('user.account-nav')
                </div>
            </div>

            <div class="col-lg-9">
                <!-- Orders Section -->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <h2>Mis Pedidos</h2>
                        <p>Detalle de mi pedido.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No. Orden</th>
                                    <td>{{$order->id}}</td>
                                    <th>Telefono</th>
                                    <td>{{$order->phone}}</td>
                                    <th>Codigo Postal</th>
                                    <td>{{$order->postcode}}</td>
                                </tr>
                                <tr>
                                    <th>Fecha de Pedido</th>
                                    <td>{{$order->created_at}}</td>
                                    <th>Fecha Entrega</th>
                                    <td>{{$order->delivered_date}}</td>
                                    <th>Fecha de Cancelacion</th>
                                    <td>{{$order->canceled_date}}</td>
                                </tr>
                                <tr>
                                    <th>Estado de Pedido</th>
                                    <td colspan="5">
                                        @if($order->status == 'enviado')
                                            <span class="badge badge-success">Enviado</span>
                                        @elseif($order->status == 'cancelado')
                                            <span class="badge badge-danger">Cancelado</span>
                                        @else
                                            <span class="badge badge-warning">Ordenado</span>
                                        @endif
                                    </td>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                    

                </div>
                
                
            </div>
            <div class="col-lg-9">
                <!-- Orders Section -->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <p>Detalle de mi pedido.</p>
                    </div>
                    

                </div>
                
                
            </div>

            <div class="col-lg-9">
                <!-- Orders Section -->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <p>Detalle de mis productos</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            
                            
                        </table>
                    </div>
                    

                </div>
                
                
            </div>

            <div class="col-lg-9">
                <!-- Orders Section -->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <p>Detalle de mi pedido.</p>
                    </div>
                    

                </div>
                
                
            </div>

            <div class="col-lg-9">
                <!-- Orders Section -->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <p>Detalle de mi pedido.</p>
                    </div>
                    

                </div>
                
                
            </div>

        </div>
    </div>
</section>


@endsection

@section('scripts')
    <script src="{{asset('recursos/user/js/index.js')}}"></script>
@endsection