<div>
    <aside>
        <h2>Mi Cuenta</h2>
        <ul>
            <li><a href="#pedidos">Mis Pedidos</a></li>
            <li><a href="#carrito">Mi Carrito</a></li>
            <li><a href="#perfil">Mi Perfil</a></li>

            
            <li><form method="POST" action="{{route('logout')}}" id="logout-form">
                @csrf
                <a href="{{route('logout')}}" class="btn btn-outline-primary mx-3 mt-2 d-block" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Cerrar Sesión</a>

            </form></li>
        </ul>

    </aside>

    {{-- esto va adentro el contenido del el supuesto slidebar --}}

</div>