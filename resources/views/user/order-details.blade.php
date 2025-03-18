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
                        @if(Session::has('status'))
                            <p class='alert alert-success'>{{Session::get('status')}}</p>

                        @endif
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
                                            <span >Enviado</span>
                                        @elseif($order->status == 'cancelado')
                                            <span>Cancelado</span>
                                        @else
                                            <span>Ordenado</span>
                                        @endif
                                    </td>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                    

                </div>

                <!--Productos-->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <p>Detalle de mis productos</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach($orderItems as $item)
                                <tr>

                                    <td class="pname">
                                        <div class="image">
                                            <img src="{{asset('uploads/products/thumbnails')}}/{{$item->product->image}}" alt="{{$item->product->name}}" class="image">
                                        </div>
                                        <div class="name">
                                            <a href="{{route('shop.product.details',['product_slug'=>$item->product->slug])}}" target="_blank"
                                                class="body-title-2">{{$item->product->name}}</a>
                                        </div>
                                    </td>
                                    <td class="text-center">{{$item->price}}</td>
                                    <td class="text-center">{{$item->quantity}}</td>
                                    <td class="text-center">{{$item->product->SKU}}</td>
                                    <td class="text-center">{{$item->product->category->name}}</td>
                                    <td class="text-center">{{$item->options}}</td>
                                    <td class="text-center">{{$item->rstatus == 0 ? "No": "Si"}}</td>
                                    <td class="text-center">
                                        <div class="list-icon-function view-icon">
                                            <div class="item eye">
                                                <i class="icon-eye"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            
                            
                        </table>
                    </div>
                    

                </div>

                <!-- direccion section -->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <p>Direccion de envio</p>
                    </div>
                    <div class="row">
                        <div class="address-body">
                            <p>{{$order->name}}</p>
                            <p>{{$order->address}}</p>
                            <p>{{$order->locality}}</p>
                            <p>{{$order->city}},{{$order->country}}</p>
                            <p>{{$order->landmark}}</p>
                            <p>{{$order->postcode}}</p>
                            <br>
                            <p>{{$order->phone}}</p>
                        </div>
                    </div>    
                </div>

                <!-- Estado Section -->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <p>Estado de mi pedido.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>${{$order->subtotal}}</td>
                                    <th>Tax</th>
                                    <td>${{$order->tax}}</td>
                                    <th>Discount</th>
                                    <td>${{$order->discount}}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>{{$order->total}}</td>
                                    <th>Payment Mode</th>
                                    <td>{{$transaction->mode}}</td>
                                    <th>Estatus</th>
                                    <td>
                                        @if($transaction->status == 'completada')
                                            <span class="">Completado</span>
                                        @elseif($transaction->status == 'declinada')
                                            <span class="">Declinado</span>
                                        @elseif($transaction->status == 'reembolsado')
                                            <span class="">Reembolsado</span>
                                        @else
                                            <span class="">Pendiente</span>
                                        @endif  
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    
                    </div>
                    

                </div>

                @if($order->status == 'ordenado')
                <!-- Editar Estado Section -->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <p>Cancelar mi pedido.</p>
                    </div>
                    <form action="{{route('user.order.cancel')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="order_id" value="{{$order->id}}"/>
                            <div class="row">
                                 <button type="submit" class="btn btn-danger cancel-order">Cancelar pedido</button>
                            </div>
                    </form>
                </div>
                @endif
                
                
            </div>

         

        </div>
    </div>
</section>


@endsection
@push('scripts')
<script>
    $(function(){
        $('.cancel-order').on('click', function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title: "¿Estás seguro?",
                text: "Quieres cancelar el pedido!?",
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

@section('scripts')
    <script src="{{asset('recursos/user/js/index.js')}}"></script>
@endsection
