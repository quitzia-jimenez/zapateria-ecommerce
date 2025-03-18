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
                    

                </div>
                
                
            </div>
            <div class="col-lg-9">
                <!-- Orders Section -->
                <div class="contenido-perfil-cliente" id="orders-section">
                    <div class="section-header">
                        <h2>Mis Pedidos</h2>
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