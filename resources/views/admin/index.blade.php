@extends('layouts.admin')
@push('css')

@endpush
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Pagina del admin</h5>
                <p class="mb-0">ordenes recientes </p>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-6 col-lg-12 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted small">Órdenes totales</span>
                                        <h3 class="mb-0 fw-bold">{{$dashboardDatas[0]->Total}}</h3>
                                    </div>
                                    <div class="bg-soft-primary rounded p-3">
                                        <i class="fa-solid fa-bag-shopping fa-lg text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Completed Orders -->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted small">Completadas</span>
                                        <h3 class="mb-0 fw-bold">{{$dashboardDatas[0]->TotalDelivered}}</h3>
                                        <small class="text-success">
                                            <i class="fa-solid fa-arrow-up"></i>
                                            {{ $dashboardDatas[0]->Total > 0 ? round(($dashboardDatas[0]->TotalDelivered / $dashboardDatas[0]->Total) * 100, 2) : 0 }}%
                                        </small>
                                    </div>
                                    <div class="bg-soft-success rounded p-3">
                                        <i class="fa-solid fa-check-circle fa-lg text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Orders -->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted small">Pendientes</span>
                                        <h3 class="mb-0 fw-bold">{{$dashboardDatas[0]->TotalOrdered}}</h3>
                                    </div>
                                    <div class="bg-soft-warning rounded p-3">
                                        <i class="fa-solid fa-clock fa-lg text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Canceled Orders -->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted small">Canceladas</span>
                                        <h3 class="mb-0 fw-bold">{{$dashboardDatas[0]->TotalCanceled}}</h3>
                                    </div>
                                    <div class="bg-soft-danger rounded p-3">
                                        <i class="fa-solid fa-xmark-circle fa-lg text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Amounts Cards -->
            <div class="col-lg-4">
                <div class="row">
                    <!-- Total Amount -->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted small">Monto total</span>
                                        <h3 class="mb-0 fw-bold">${{ number_format($dashboardDatas[0]->TotalAmount, 2) }}
                                        </h3>
                                    </div>
                                    <div class="bg-soft-info rounded p-3">
                                        <i class="fa-solid fa-dollar-sign fa-lg text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Completed Amount -->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted small">Monto completado</span>
                                        <h3 class="mb-0 fw-bold">
                                            ${{ number_format($dashboardDatas[0]->TotalDeliveredAmount, 2) }}</h3>
                                    </div>
                                    <div class="bg-soft-success rounded p-3">
                                        <i class="fa-solid fa-circle-check fa-lg text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Amount -->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted small">Monto pendiente</span>
                                        <h3 class="mb-0 fw-bold">
                                            ${{ number_format($dashboardDatas[0]->TotalOrderedAmount, 2) }}</h3>
                                    </div>
                                    <div class="bg-soft-warning rounded p-3">
                                        <i class="fa-solid fa-hourglass-half fa-lg text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Canceled Amount -->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted small">Monto cancelado</span>
                                        <h3 class="mb-0 fw-bold">
                                            ${{ number_format($dashboardDatas[0]->TotalCanceledAmount, 2) }}</h3>
                                    </div>
                                    <div class="bg-soft-danger rounded p-3">
                                        <i class="fa-solid fa-ban fa-lg text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Chart -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Distribución de órdenes</h5>
                        <div class="chart-container" style="position: relative; height: 300px;">
                            <canvas id="ordersChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title fw-semibold mb-0">Órdenes recientes</h5>
                            <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-outline-primary">Ver todas</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th># Orden</th>
                                        <th>Cliente</th>
                                        <th>Teléfono</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Productos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="fw-bold">{{$order->id}}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-3">
                                                        <h6 class="mb-0">{{$order->name}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$order->phone}}</td>
                                            <td>${{ number_format($order->total, 2) }}</td>
                                            <td class="text-center">
                                                @if($order->status == 'completado')
                                                    <span class="badge bg-success">Completado</span>
                                                @elseif($order->status == 'ordenado')
                                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                                @elseif($order->status == 'cancelado')
                                                    <span class="badge bg-danger">Cancelado</span>
                                                @elseif($order->status == 'enviado')
                                                    <span class="badge bg-success">Completado</span>
                                                @else
                                                    <span class="badge bg-info">{{$order->status}}</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                                            <td class="text-center">{{$order->orderItems->count()}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin.order.details', ['order_id' => $order->id])}}"
                                                    class="btn btn-sm btn-icon btn-outline-primary">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
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
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('ordersChart').getContext('2d');
            const ordersChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Completadas', 'Pendientes', 'Canceladas'],
                    datasets: [{
                        data: [
                                {{$dashboardDatas[0]->TotalDelivered}},
                                {{$dashboardDatas[0]->TotalOrdered}},
                            {{$dashboardDatas[0]->TotalCanceled}}
                        ],
                        backgroundColor: [
                            '#63E6BE',
                            '#FFB347',
                            '#dc3545'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12,
                                padding: 20
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    let label = context.label || '';
                                    let value = context.raw || 0;
                                    let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    let percentage = Math.round((value / total) * 100);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    cutout: '70%'
                }
            });
        });
    </script>
@endpush

<style>
    .card {
        border-radius: 12px;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .bg-soft-primary {
        background-color: rgba(13, 110, 253, 0.1);
    }

    .bg-soft-success {
        background-color: rgba(25, 135, 84, 0.1);
    }

    .bg-soft-warning {
        background-color: rgba(255, 193, 7, 0.1);
    }

    .bg-soft-danger {
        background-color: rgba(220, 53, 69, 0.1);
    }

    .bg-soft-info {
        background-color: rgba(13, 202, 240, 0.1);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .badge {
        padding: 5px 10px;
        font-weight: 500;
    }

        .chart-palette-1 {
        --chart-color-1: #63E6BE; 
        --chart-color-2: #FF9E9E; 
        --chart-color-3: #FFD6A5;
        --chart-color-4: #CBFFA9; 
        --chart-color-5: #A0C4FF; 
    }

    .chart-palette-2 {
        --chart-color-1: #63E6BE; 
        --chart-color-2: #FFB3C6; 
        --chart-color-3: #FFDAC1; 
        --chart-color-4: #E2F0CB; 
        --chart-color-5: #B5EAD7; 
    }

    .chart-palette-3 {
        --chart-color-1: #63E6BE;
        --chart-color-2: #FF8B94;
        --chart-color-3: #FFB347;
        --chart-color-4: #A78AFF;
        --chart-color-5: #7AE7FF;
    }

    .chart-palette-4 {
        --chart-color-1: #63E6BE;
        --chart-color-2: #FF9BB3; 
        --chart-color-3: #B8B8FF;
        --chart-color-4: #A5FFD6;
        --chart-color-5: #C7CEEA;
    }

    .chart-palette-5 {
        --chart-color-1: #63E6BE;
        --chart-color-2: #8CEEBE;
        --chart-color-3: #B5F6C3;
        --chart-color-4: #FFC4D0;
        --chart-color-5: #FF9BB3;
    }
</style>