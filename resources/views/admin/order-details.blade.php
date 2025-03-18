@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Pedidos</h5>

            <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="wg-box">
                        <div class="flex items-center justify-between gap10 flex-wrap">
                            <div class="wg-filter flex-grow">
                                <h5>Ordered Items</h5>
                            </div>
                            <a class="tf-button style-1 w208" href="{{route('admin.orders')}}">Back</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
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
                                <tbody>
                                    @foreach($order->orderItems as $item)
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

                        <div class="divider"></div>
                        <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                        {{-- {{$order->links('pagination::bootstrap-5')}} --}}
                        </div>
                    </div>

                    <div class="wg-box">
                        <div class="wg-box">
                            <h5>Direccion de envio</h5>
                            <div class="my-account__address-item">
                                <div class="my-account__address-item__detail">
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
    
                        <div class="wg-box">
                            <h5>Transactions</h5>
                            <table class="table table-striped table-bordered table-transaction">
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
                                            @if($transaction->status == 'completado')
                                                <span class="badge badge-success">Completado</span>
                                            @elseif($transaction->status == 'declinada')
                                                <span class="badge badge-success">Declinado</span>
                                            @elseif($transaction->status == 'reembolsado')
                                                <span class="badge badge-success">Reembolsado</span>
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
            </div>
        </div>
    </div>
</div>
    
@endsection

