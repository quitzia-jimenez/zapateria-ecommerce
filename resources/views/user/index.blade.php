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
                <div class="contenido-perfil-cliente" id="dashboard-section">
                    <div class="section-header">
                        <h2>Inicio</h2>
                        <p>Bienvenida, {{Auth::user()->name}}. Aquí puedes ver un resumen de tu actividad.</p>
                    </div>
                    <div class="inicio-stats-perfil-cliente">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-inicio-stats">
                                    <div class="stat-icon">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                    <div class="stat-info">
                                        <h3>5</h3>
                                        <p>Pedidos Totales</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-inicio-stats">
                                    <div class="stat-icon">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <div class="stat-info">
                                        <h3>12</h3>
                                        <p>Lista de Deseos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-inicio-stats">
                                    <div class="stat-icon">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    <div class="stat-info">
                                        <h3>2</h3>
                                        <p>Cupones Disponibles</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recent-orders">
                        <h4>Pedidos Recientes</h4>
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
                    </div>
                </div>

                {{-- <div class="contenido-perfil-cliente hidden" id="wishlist-section">
                    <div class="section-header">
                        <h2>Mi Lista de Deseos</h2>
                        <p>Productos que te han gustado.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="wishlist-item">
                                <div class="wishlist-img">
                                    <img src="https://florsheimshoes.com.mx/wp-content/uploads/2022/10/00046pri.jpg"
                                        alt="Zapato casual">
                                    <div class="wishlist-actions">
                                        <a href="#" class="wishlist-action-btn add-to-cart"><i
                                                class="fas fa-shopping-cart"></i></a>
                                        <a href="#" class="wishlist-action-btn remove-from-wishlist"><i
                                                class="fas fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="wishlist-info">
                                    <h5>Zapato casual elegante</h5>
                                    <p class="wishlist-price">$1,299.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="wishlist-item">
                                <div class="wishlist-img">
                                    <img src="https://www.varugu.com/cdn/shop/files/tenis-zapatos-formales.jpg?v=1722296599&width=1445"
                                        alt="Zapato deportivo">
                                    <div class="wishlist-actions">
                                        <a href="#" class="wishlist-action-btn add-to-cart"><i
                                                class="fas fa-shopping-cart"></i></a>
                                        <a href="#" class="wishlist-action-btn remove-from-wishlist"><i
                                                class="fas fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="wishlist-info">
                                    <h5>Tenis deportivo ligero</h5>
                                    <p class="wishlist-price">$999.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="wishlist-item">
                                <div class="wishlist-img">
                                    <img src="https://arantzaonline.com/cdn/shop/files/040316_7.jpg?v=1713826676"
                                        alt="Zapato formal">
                                    <div class="wishlist-actions">
                                        <a href="#" class="wishlist-action-btn add-to-cart"><i
                                                class="fas fa-shopping-cart"></i></a>
                                        <a href="#" class="wishlist-action-btn remove-from-wishlist"><i
                                                class="fas fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="wishlist-info">
                                    <h5>Zapato formal de piel</h5>
                                    <p class="wishlist-price">$1,499.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Section -->
                <div class="contenido-perfil-cliente hidden" id="address-section">
                    <div class="section-header">
                        <h2>Mis Direcciones</h2>
                        <p>Gestiona tus direcciones de envío y facturación.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="address-card">
                                <div class="address-header">
                                    <h4>Dirección de Envío</h4>
                                    <div class="address-actions">
                                        <a href="#" class="address-edit"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="address-delete"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                                <div class="address-body">
                                    <p><strong>Arely Jimenez</strong></p>
                                    <p>Calle Primavera #123</p>
                                    <p>Col. Jardines</p>
                                    <p>Puebla, Puebla 72000</p>
                                    <p>México</p>
                                    <p>Tel: (222) 123-4567</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="address-card">
                                <div class="address-header">
                                    <h4>Dirección de Facturación</h4>
                                    <div class="address-actions">
                                        <a href="#" class="address-edit"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="address-delete"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                                <div class="address-body">
                                    <p><strong>Arely Jimenez</strong></p>
                                    <p>Calle Primavera #123</p>
                                    <p>Col. Jardines</p>
                                    <p>Puebla, Puebla 72000</p>
                                    <p>México</p>
                                    <p>RFC: GARA901010ABC</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-address-btn">
                        <button class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Nueva Dirección</button>
                    </div>
                </div>

                <!-- Account Section -->
                <div class="contenido-perfil-cliente hidden" id="account-section">
                    <div class="section-header">
                        <h2>Detalles de la Cuenta</h2>
                        <p>Actualiza tu información personal.</p>
                    </div>
                    <div class="account-form">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">Nombre</label>
                                        <input type="text" class="form-control" id="firstName" value="Arely">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName">Apellido</label>
                                        <input type="text" class="form-control" id="lastName" value="García">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" value="arely.jimenez@email.com">
                            </div>
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input type="tel" class="form-control" id="phone" value="(222) 123-4567">
                            </div>
                            <div class="password-change">
                                <h5>Cambiar Contraseña</h5>
                                <div class="form-group">
                                    <label for="currentPassword">Contraseña Actual</label>
                                    <input type="password" class="form-control" id="currentPassword">
                                </div>
                                <div class="form-group">
                                    <label for="newPassword">Nueva Contraseña</label>
                                    <input type="password" class="form-control" id="newPassword">
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Confirmar Nueva Contraseña</label>
                                    <input type="password" class="form-control" id="confirmPassword">
                                </div>
                            </div>
                            <div class="account-actions">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Notifications Section -->
                <div class="contenido-perfil-cliente hidden" id="notifications-section">
                    <div class="section-header">
                        <h2>Notificaciones</h2>
                        <p>Administra tus preferencias de comunicación.</p>
                    </div>
                    <div class="notifications-preferences">
                        <div class="notification-option">
                            <div class="notification-info">
                                <h5>Actualizaciones de Pedidos</h5>
                                <p>Recibe notificaciones sobre el estado de tus pedidos.</p>
                            </div>
                            <div class="custom-switch">
                                <input type="checkbox" class="custom-control-input" id="orderUpdates" checked>
                                <label class="custom-control-label" for="orderUpdates"></label>
                            </div>
                        </div>
                        <div class="notification-option">
                            <div class="notification-info">
                                <h5>Ofertas y Promociones</h5>
                                <p>Mantente informado sobre descuentos exclusivos.</p>
                            </div>
                            <div class="custom-switch">
                                <input type="checkbox" class="custom-control-input" id="promoOffers" checked>
                                <label class="custom-control-label" for="promoOffers"></label>
                            </div>
                        </div>
                        <div class="notification-option">
                            <div class="notification-info">
                                <h5>Newsletter Semanal</h5>
                                <p>Recibe actualizaciones sobre nuevas colecciones.</p>
                            </div>
                            <div class="custom-switch">
                                <input type="checkbox" class="custom-control-input" id="newsletter">
                                <label class="custom-control-label" for="newsletter"></label>
                            </div>
                        </div>
                        <div class="notification-option">
                            <div class="notification-info">
                                <h5>Recordatorios de Carrito</h5>
                                <p>Te recordamos los productos en tu carrito de compras.</p>
                            </div>
                            <div class="custom-switch">
                                <input type="checkbox" class="custom-control-input" id="cartReminders" checked>
                                <label class="custom-control-label" for="cartReminders"></label>
                            </div>
                        </div>
                    </div>
                    <div class="notification-actions">
                        <button class="btn btn-primary">Guardar Preferencias</button>
                    </div>
                    <button class="abrir-modal">Abrir modal</button>
                </div> --}}
            </div>
        </div>
    </div>
</section>

   
   

    
@endsection
@section('scripts')
    <script src="{{asset('recursos/user/js/index.js')}}"></script>