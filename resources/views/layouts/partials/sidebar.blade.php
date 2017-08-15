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
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>Inicio</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> Usuarios <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('usuario.create') }}"><i class='fa fa-plus-circle'></i> Crear Usuarios</li>
                    <li><a href="{{ route('usuario.index') }}"><i class='fa fa-reorder'></i> Lista de Usuarios</li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> Beneficiarios <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('beneficiario.create') }}"><i class='fa fa-plus-circle'></i> Crear Beneficiario</li>
                    <li><a href="#"><i class='fa fa-edit'></i> Modificar Beneficiario</li>
                    <li><a href="{{ route('beneficiario.index') }}"><i class='fa fa-reorder'></i> Lista de Beneficiarios</li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> Infocentros <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('infocentro.create') }}"><i class='fa fa-plus-circle'></i> Crear Infocentro</li>
                    <li><a href="#"><i class='fa fa-edit'></i> Modificar Infocentros</li>
                    <li><a href="{{ route('infocentro.index') }}"><i class='fa fa-reorder'></i> Lista de Infocentros</li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i>Canaimas <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('canaima.create') }}"><i class='fa fa-plus-circle'></i> Crear Canaima </li>
                    <li><a href="#"><i class='fa fa-edit'></i> Modificar Canaima</li>
                    <li><a href="{{ route('canaima.index') }}"><i class='fa fa-reorder'></i> Lista de Canaimas</li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
