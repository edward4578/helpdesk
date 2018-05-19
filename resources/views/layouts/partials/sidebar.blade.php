<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }} </p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
            </div>
        </div>
        @endif
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Principal</li>
            <li class="treeview">
                <a href="{{ url('home') }}"><i class='fa fa-home'></i> Inicio</a>
            </li>
            <li class="header">Gestion De Incidencias</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> Ticket <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('ticket.create') }}"><i class='fa fa-plus-circle'></i> Crear Ticket</a></li>
                    <li><a href="{{ route('ticket.index') }}"><i class='fa fa-reorder'></i> Mis Ticket Pendientes</a></li>
                    <li><a href="{{ url('tickets/procesados') }}"><i class='fa fa-reorder'></i> Mis Tickets Procesados</a></li>
                    <li><a href="{{ url('tickets/rechazados') }}"><i class='fa fa-reorder'></i> Mis Tickets Rechazados</a></li>

                </ul>
            </li>
            <li class="header">ADMINISTRACIÓN</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> Usuarios <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('usuario.create') }}"><i class='fa fa-plus-circle'></i> Crear Usuarios</a></li>
                    <li><a href="{{ route('usuario.index') }}"><i class='fa fa-reorder'></i> Lista de Usuarios</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> Beneficiarios <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('beneficiario.create') }}"><i class='fa fa-plus-circle'></i> Crear Beneficiario</a></li>
                    <li><a href="{{ route('beneficiario.index') }}"><i class='fa fa-reorder'></i> Lista de Beneficiarios</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> Infocentros <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('infocentro.create') }}"><i class='fa fa-plus-circle'></i> Crear Infocentro</a></li>
                    <li><a href="{{ route('infocentro.index') }}"><i class='fa fa-reorder'></i> Lista de Infocentros</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i>Canaimas <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('canaima.create') }}"><i class='fa fa-plus-circle'></i> Crear Canaima </a></li>
                    <li><a href="{{ route('canaima.index') }}"><i class='fa fa-reorder'></i> Lista de Canaimas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i>Fallas <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('falla.create') }}"><i class='fa fa-plus-circle'></i>Crear Falla</a></li>
                    <li><a href="{{ route('falla.index') }}"><i class='fa fa-reorder'></i> Lista de Fallas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i>Soluciones <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('solucion.create') }}"><i class='fa fa-plus-circle'></i>Crear Solución</a></li>
                    <li><a href="{{ route('solucion.index') }}"><i class='fa fa-reorder'></i> Lista de Solución</a></li>
                </ul>
            </li>
            <li class="header"><i class="fa fa-area-chart"></i>Graficos</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i>Por ticket <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('reportes/mensual') }}"><i class='fa fa-area-chart'></i> Ticket Generados</a></li>
                    <li><a href="#"><i class='fa fa-area-chart'></i> Ticket Cerrados</a></li>
                    <li><a href="#"><i class='fa fa-area-chart'></i> Ticket por Procesar</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
