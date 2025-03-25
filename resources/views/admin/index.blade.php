@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Pagina del admin</h5>
            <p class="mb-0">ordenes recientes </p>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="row">
              <!-- Card 1 -->
                <div class="col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            
                            <p class="mb-9 fw-semibold">Ordenes totales</p>
                            <div class="row align-items-center">
                                <h4 class="fw-semibold mb-3">
                                    <i class="fa-solid fa-bag-shopping fa-lg" style="color: #63E6BE;"></i>
                                    {{$dashboardDatas[0]->Total}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 1 -->
                <div class="col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            
                            <p class="mb-9 fw-semibold">Completados</p>
                            <div class="row align-items-center">
                                <h4 class="fw-semibold mb-3">
                                    <i class="fa-solid fa-bag-shopping fa-lg" style="color: #63E6BE;"></i>
                                    {{$dashboardDatas[0]->TotalDelivered}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 1 -->
                <div class="col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            
                            <p class="mb-9 fw-semibold">Cantidad total</p>
                            <div class="row align-items-center">
                                <h4 class="fw-semibold mb-3">
                                    <i class="fa-solid fa-sack-dollar fa-lg" style="color: #63E6BE;"></i>
                                    ${{$dashboardDatas[0]->TotalAmount}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 1 -->
                <div class="col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            
                            <p class="mb-9 fw-semibold">Cantidad total completados</p>
                            <div class="row align-items-center">
                                <h4 class="fw-semibold mb-3">
                                    <i class="fa-solid fa-sack-dollar fa-lg" style="color: #63E6BE;"></i>
                                    ${{$dashboardDatas[0]->TotalDeliveredAmount}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 1 -->
                <div class="col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            
                            <p class="mb-9 fw-semibold">Ordenes Pendientes</p>
                            <div class="row align-items-center">
                                <h4 class="fw-semibold mb-3">
                                    <i class="fa-solid fa-clock fa-lg" style="color: #63E6BE;"></i>
                                    {{$dashboardDatas[0]->TotalOrdered}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 1 -->
                <div class="col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            
                            <p class="mb-9 fw-semibold">Ordenes canceladas</p>
                            <div class="row align-items-center">
                                <h4 class="fw-semibold mb-3">
                                    <i class="fa-solid fa-face-frown fa-lg" style="color: #63E6BE;"></i>
                                    {{$dashboardDatas[0]->TotalCanceled}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 1 -->
                <div class="col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            
                            <p class="mb-9 fw-semibold">Cantidad de pendientes</p>
                            <div class="row align-items-center">
                                <h4 class="fw-semibold mb-3">
                                    <i class="fa-solid fa-sack-dollar fa-lg" style="color: #63E6BE;"></i>
                                    ${{$dashboardDatas[0]->TotalOrderedAmount}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 1 -->
                <div class="col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            
                            <p class="mb-9 fw-semibold">Cantidad total cancelados</p>
                            <div class="row align-items-center">
                                <h4 class="fw-semibold mb-3">
                                    <i class="fa-solid fa-sack-dollar fa-lg" style="color: #63E6BE;"></i>
                                    ${{$dashboardDatas[0]->TotalCanceledAmount}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                

              
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-strech">
          <div class="card w-100">
            <div class="card-body">
              <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                <div class="mb-3 mb-sm-0">
                  <h5 class="card-title fw-semibold">Sales Overview</h5>
                </div>
                <div>
                  <select class="form-select">
                    <option value="1">March 2023</option>
                    <option value="2">April 2023</option>
                    <option value="3">May 2023</option>
                    <option value="4">June 2023</option>
                  </select>
                </div>
              </div>
              <div id="chart"></div>
            </div>
          </div>
        </div>
        
        
      </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Ordenes recientes</h5>
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
                                    <h6 class="fw-semibold mb-0">Fecha entrega</h6>
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
            </div>
        </div>
    </div>
</div>
    
@endsection