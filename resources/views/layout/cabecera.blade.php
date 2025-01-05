<style>
  .bg-custom-green {
    background-color: #2ecc71;
    /* You can change this to any green color you prefer */
  }
</style>

<nav class="app-header navbar bg-success text-white navbar-expand bg-body"> <!--begin::Container-->
  <div class="container-fluid"> <!--begin::Start Navbar Links-->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/home')}}">
          <span> <strong>Ortimed</strong> </span>
        </a>
      </li>
      <!-- Ventas Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="ventasDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Ventas
        </a>
        <ul class="dropdown-menu" aria-labelledby="ventasDropdown">
          <li><a class="dropdown-item" href="{{route('ventas.vender')}}">Nueva Venta</a></li>
          <li><a class="dropdown-item" href="{{route('ventas.index')}}">Historial</a></li>
        </ul>
      </li>

      <!-- Compras Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="comprasDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Compras
        </a>
        <ul class="dropdown-menu" aria-labelledby="comprasDropdown">
          <li><a class="dropdown-item" href="{{route('compras.comprar')}}">Nueva Compra</a></li>
          <li><a class="dropdown-item" href="{{route('compras.index')}}">Historial</a></li>
        </ul>
      </li>
      @if(Auth::user()->hasRole('superAdmin'))
      <!-- Productos Link -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="monedaDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Productos
        </a>
        <ul class="dropdown-menu" aria-labelledby="productoDropdown">
          <li><a class="dropdown-item" href="{{ route('productos.create') }}">Nuevo Producto</a></li>
          <li><a class="dropdown-item" href="{{ route('almacen') }}">Inventario</a></li>
        </ul>
      </li>
@endif
      <!-- Clasificador Dropdown -->


      <!-- Transacciones Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="transaccionesDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Pagos
        </a>
        <ul class="dropdown-menu" aria-labelledby="transaccionesDropdown">
          <li><a class="dropdown-item" href="{{route('pagos.index')}}">Pagos</a></li>
          {{-- <li><a class="dropdown-item" href="{{route('cuentas-por-cobrar.index')}}">Cuentas Por Cobrar</a></li>
          <li><a class="dropdown-item" href="{{route('cuentas-por-pagar.index')}}">Cuentas Por Pagar</a></li>

          <li><a class="dropdown-item" href="{{route(name: 'proveedores.create')}}">Nuevo Proveedor</a></li>

          <li><a class="dropdown-item" href="{{route('proveedores.index')}}">Proveedores</a></li>--}}
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="transaccionesDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Caja
        </a>
        <ul class="dropdown-menu" aria-labelledby="transaccionesDropdown">
          <li><a class="dropdown-item" href="{{route('cajas.index')}}">Cajas</a></li>
          <li><a class="dropdown-item" href="{{route('caja.aperturas')}}">Aperturas</a></li>
          <li><a class="dropdown-item" href="{{route('caja.cierres')}}">Cierres</a></li>

        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="transaccionesDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Finanzas
        </a>
        <ul class="dropdown-menu" aria-labelledby="transaccionesDropdown">
          <li><a class="dropdown-item" href="{{route('cuentas-por-cobrar.index')}}">Cuentas Por Cobrar</a></li>
          <li><a class="dropdown-item" href="{{route('cuentas-por-pagar.index')}}">Cuentas Por Pagar</a></li>


        </ul>
      </li>
      @if(Auth::user()->hasRole('superAdmin'))
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="transaccionesDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Proveedores
        </a>
        <ul class="dropdown-menu" aria-labelledby="transaccionesDropdown">

          <li><a class="dropdown-item" href="{{route(name: 'proveedores.create')}}">Nuevo Proveedor</a></li>

          <li><a class="dropdown-item" href="{{route('proveedores.index')}}">Proveedores</a></li>
        </ul>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="transaccionesDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Usuarios
        </a>
        <ul class="dropdown-menu" aria-labelledby="transaccionesDropdown">
          <li><a class="dropdown-item" href="{{route('usuarios.create')}}">Nuevo Usuario</a></li>
          <li><a class="dropdown-item" href="{{route('usuarios.index')}}">Lista</a></li>

        </ul>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="ventasDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Mesas
        </a>
        <ul class="dropdown-menu" aria-labelledby="ventasDropdown">
          <li><a class="dropdown-item" href="{{route('mesas.create')}}">Mesas</a></li>
          <li><a class="dropdown-item" href="{{route('mesas.index')}}">Nueva Mesa</a></li>
        </ul>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="ventasDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Empleados
        </a>
        <ul class="dropdown-menu" aria-labelledby="ventasDropdown">
          <li><a class="dropdown-item" href="{{route('empleados.create')}}">Empleados</a></li>
          <li><a class="dropdown-item" href="{{route('empleados.index')}}">Nuevo Empleado</a></li>
        </ul>
      </li>
   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="ventasDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Nomina
        </a>
        <ul class="dropdown-menu" aria-labelledby="ventasDropdown">
          <li><a class="dropdown-item" href="{{route('pagos_empleados.create')}}">Pagos</a></li>
          <li><a class="dropdown-item" href="{{route('pagos_empleados.index')}}">Nuevo Pago</a></li>
        </ul>
      </li>
      @endif
    </ul>
    <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->

      <!--begin::Messages Dropdown Menu-->




      <!--begin::User Menu Dropdown-->
      <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <span class="d-none d-md-inline">{{Auth::user()->name}}</span> </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->


          <li class="user-footer"> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
              Salir
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li> <!--end::Menu Footer-->
        </ul>
      </li> <!--end::User Menu Dropdown-->
    </ul> <!--end::End Navbar Links-->
  </div> <!--end::Container-->
</nav> <!--end::Header--> <!--begin::Sidebar-->
@include('layout.script')
<script>
  // Escucha el evento 'input' en todos los campos de tipo text y textareas y convierte a mayúsculas
  document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los inputs de tipo text y los textareas
    const textInputs = document.querySelectorAll('input[type="text"], textarea');

    // Itera sobre cada input y textarea y agrega el listener
    textInputs.forEach(function (input) {
      input.addEventListener('input', function () {
        // Convierte el valor del input o textarea a mayúsculas
        this.value = this.value.toUpperCase();
      });
    });
  });
</script>