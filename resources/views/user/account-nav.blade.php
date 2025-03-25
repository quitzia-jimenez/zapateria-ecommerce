<!-- Sidebar -->

    <div class="slidebar-perfil-cliente">
        <div class="avatar-perfil-cliente">
            <img src="#" alt="Foto de perfil">
            <h4>{{Auth::user()->name}}</h4>
        </div>
        <ul class="menu-perfil-cliente">
            <li class="menu-perfil-cliente-item" data-section="dashboard">
                <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{route('user.index')}}"><i class="fas fa-tachometer-alt"></i> Inicio</a>
            </li>
            <li class="menu-perfil-cliente-item" data-section="orders">
                <a class="nav-link {{ request()->routeIs('user.orders') ? 'active' : '' }}" href="{{route('user.orders')}}"><i class="fas fa-shopping-bag"></i> Mis pedidos</a>
            </li>
            <li class="menu-perfil-cliente-item" data-section="wishlist">
                <a class="nav-link {{ request()->routeIs('user.wishlist') ? 'active' : '' }}" href="#"><i class="fas fa-heart"></i> Lista de deseos</a>
            </li>
            <li class="menu-perfil-cliente-item" data-section="address">
                <a class="nav-link {{ request()->routeIs('user.address') ? 'active' : '' }}" href="#"><i class="fas fa-map-marker-alt"></i> Direcciones</a>
            </li>
            <li class="menu-perfil-cliente-item" data-section="account">
                <a class="nav-link {{ request()->routeIs('user.account') ? 'active' : '' }}" href="#"><i class="fas fa-user-edit"></i> Detalles de la cuenta</a>
            </li>
            <li class="menu-perfil-cliente-item" data-section="notifications">
                <a class="nav-link {{ request()->routeIs('user.notifications') ? 'active' : '' }}" href="#"><i class="fas fa-bell"></i> Notificaciones</a>
            </li>
        
            <li><form method="POST" action="{{route('logout')}}" id="logout-form">
                @csrf
                <a href="{{route('logout')}}" class="text-decoration-none menu-perfil-cliente-item log-out  d-block" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Cerrar Sesión</a>
        
            </form></li>
        </ul>
    </div>


