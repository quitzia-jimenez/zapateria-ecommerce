@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Pedidos</h5>
                <p>Detalle de pedidos</p>
    
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        {{-- Detalles de pedido --}}
                        <div class="card w-100">

                            {{-- Detalles de pedido --}}
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold mb-4">Detalles de Pedido</h5>
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

                            
    
                        </div>
                    </div>
                    {{-- Detalles de productos --}}
                    <div class="card w-100">
                            
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-4">Detalles de Productos</h5>
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
                    </div>

                    {{-- Detalles de envio y estatus --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Direccion</h5>
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
                            </div>
                        </div>
                    </div>
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-4">Estatus del pedido</h5>
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
                    
                    </div>

                    {{-- Actualizar pedido --}}
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-4">Actualizar estatus del pedido</h5>
                            <form action="{{route('admin.order.status.update')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="order_id" value="{{$order->id}}"/>
                                <div class="row">
                                    <div class="col-md-3">
                                        <select class="form-select" name="order_status" id="order_status">
                                            <option value="ordenado" {{$order->status == 'ordenado' ? "selected":""}}>Ordenado</option>
                                            <option value="enviado" {{$order->status == 'enviado' ? "selected":""}}>Enviado</option>
                                            <option value="cancelado" {{$order->status == 'cancelado' ? "selected":""}}>Cancelado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Actualizar Estatus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
    
@endsection

