@extends('layouts.app')
@section('content')

<section class="seccion-perfil-cliente">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="slidebar-perfil-cliente">
                    <div class="avatar-perfil-cliente">
                        <img src="https://i.pinimg.com/280x280_RS/92/41/93/924193fa4ed5f20e03c3c38f3e8a0553.jpg"
                            alt="Foto de perfil">
                        <h4>Quitzia Arely Jimenez Sánchez</h4>
                        <p>Miembro desde: Enero 2023</p>
                    </div>
                    <ul class="menu-perfil-cliente">
                        <li class="menu-perfil-cliente-item active" data-section="dashboard">
                            <i class="fas fa-tachometer-alt"></i> Inicio
                        </li>
                        <li class="menu-perfil-cliente-item" data-section="orders">
                            <i class="fas fa-shopping-bag"></i> Mis pedidos
                        </li>
                        <li class="menu-perfil-cliente-item" data-section="wishlist">
                            <i class="fas fa-heart"></i> Lista de deseos
                        </li>
                        <li class="menu-perfil-cliente-item" data-section="address">
                            <i class="fas fa-map-marker-alt"></i> Direcciones
                        </li>
                        <li class="menu-perfil-cliente-item" data-section="account">
                            <i class="fas fa-user-edit"></i> Detalles de la cuenta
                        </li>
                        <li class="menu-perfil-cliente-item" data-section="notifications">
                            <i class="fas fa-bell"></i> Notificaciones
                        </li>

                        <li><form method="POST" action="{{route('logout')}}" id="logout-form">
                            @csrf
                            <a href="{{route('logout')}}" class="text-decoration-none menu-perfil-cliente-item log-out  d-block" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                Cerrar Sesión</a>
            
                        </form></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="contenido-perfil-cliente" id="dashboard-section">
                    <div class="section-header">
                        <h2>Inicio</h2>
                        <p>Bienvenida, Arely. Aquí puedes ver un resumen de tu actividad.</p>
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
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#BO-1452</td>
                                        <td>15 Feb, 2025</td>
                                        <td><span class="status-delivered">Entregado</span></td>
                                        <td>$2,498.00</td>
                                        <td><a href="#" class="view-order abrir-modal">Ver</a></td>
                                    </tr>
                                    <tr>
                                        <td>#BO-1398</td>
                                        <td>28 Ene, 2025</td>
                                        <td><span class="status-processing">En proceso</span></td>
                                        <td>$1,299.00</td>
                                        <td><a href="#" class="view-order">Ver</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Orders Section -->
                <div class="contenido-perfil-cliente hidden" id="orders-section">
                    <div class="section-header">
                        <h2>Mis Pedidos</h2>
                        <p>Historial completo de tus compras.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pedido #</th>
                                    <th>Fecha</th>
                                    <th>Productos</th>
                                    <th>Estado</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#BO-1452</td>
                                    <td>15 Feb, 2025</td>
                                    <td>Zapato casual elegante (1), Tenis deportivo ligero (1)</td>
                                    <td><span class="status-delivered">Entregado</span></td>
                                    <td>$2,498.00</td>
                                    <td>
                                        <a href="#" class="order-action"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="order-action"><i class="fas fa-download"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#BO-1398</td>
                                    <td>28 Ene, 2025</td>
                                    <td>Zapato formal de piel (1)</td>
                                    <td><span class="status-processing">En Proceso</span></td>
                                    <td>$1,299.00</td>
                                    <td>
                                        <a href="#" class="order-action"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="order-action"><i class="fas fa-download"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#BO-1245</td>
                                    <td>10 Dic, 2024</td>
                                    <td>Zapatilla urbana trendy (1)</td>
                                    <td><span class="status-delivered">Entregado</span></td>
                                    <td>$1,199.00</td>
                                    <td>
                                        <a href="#" class="order-action"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="order-action"><i class="fas fa-download"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#BO-1187</td>
                                    <td>15 Nov, 2024</td>
                                    <td>Zapato casual elegante (1)</td>
                                    <td><span class="status-delivered">Entregado</span></td>
                                    <td>$1,299.00</td>
                                    <td>
                                        <a href="#" class="order-action"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="order-action"><i class="fas fa-download"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#BO-1076</td>
                                    <td>2 Oct, 2024</td>
                                    <td>Zapato formal de piel (1)</td>
                                    <td><span class="status-cancelled">Cancelado</span></td>
                                    <td>$1,499.00</td>
                                    <td>
                                        <a href="#" class="order-action"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="contenido-perfil-cliente hidden" id="wishlist-section">
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
                </div>
            </div>
        </div>
    </div>
</section>

   
   

    
@endsection
@section('scripts')
    <script src="{{asset('recursos/user/js/index.js')}}"></script>