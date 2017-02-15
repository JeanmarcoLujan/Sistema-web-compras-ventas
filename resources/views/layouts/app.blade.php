<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LCSG</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/_all-skins.css') }}"> 
   <!-- <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <!--<link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">-->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .contenido-inicial{
          padding-top: 100px;
          background-color: white;
        }
        .acceso{
          margin-right: 10px;
        }
        .main-header{
          background-color: #6495ED;

        }
        .main-sidebar{
          background-color: #B0C4DE;
        }
        .userr{
          margin-bottom: 10px;
          padding-bottom: 10px;
        }
        
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">


        <a href="{{ url('/') }}" class="logo">
          <span class="logo-mini"><b>LCSG</b>V</span>
          <span class="logo-lg"><b>SISTEMA LCSG</b></span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav navbar-right acceso">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar Sesión</a></li>
                        <li><a href="{{ url('/registeruser') }}">Registro</a></li>
                    @else
                        <li>
                           
                              <a href="{{ url('/help') }}" target="_blank" ><img width="25px" height="25x" title="Ayuda"  src="{{ asset('img/ayuda.png') }}" alt="imagen"></a>
                            

                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="{{ asset('imagenes/users/'.Auth::user()->foto)}}" class="user-image" alt="User Image">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <!-- User image -->
                                <li class="user-header">
                                  <img src="{{ asset('imagenes/users/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
                                  <p>
                                    {{ Auth::user()->first_name }}
                                    <small>Miembro de la empresa</small>
                                  </p>
                                </li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
          </div>

        </nav>
      </header>

      @if (Auth::guest())
          <div class="contenido-inicial">
            @yield('content')
          </div>
          
      @else
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel ">
            <div class="pull-left image userr">
              <img src="{{ asset('imagenes/users/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info " >
              <p>{{ Auth::user()->first_name }}</p>
              <i class="fa fa-circle text-success"></i> Online
            </div>
          </div>

          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>         

          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/almacen/articulo') }}"><i class="fa fa-circle-o text-aqua"></i> Productos</a></li>
                <li><a href="{{ url('/almacen/categoria') }}"><i class="fa fa-circle-o text-aqua"></i> Categorías</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Compras</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/compras/ingreso')}}"><i class="fa fa-circle-o  text-aqua"></i> Ingresos</a></li>
                <li><a href="{{ url('/compras/proveedor')}}"><i class="fa fa-circle-o text-aqua"></i> Proveedores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/ventas/venta')}}"><i class="fa fa-circle-o text-aqua"></i> Ventas</a></li>
                <li><a href="{{ url('/ventas/cliente')}}"><i class="fa fa-circle-o text-aqua"></i> Clientes</a></li>
              </ul>
            </li>       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/registeruser')}}"><i class="fa fa-circle-o text-aqua"></i> Usuarios</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/reportes/productos')}}"><i class="fa fa-circle-o text-aqua"></i> Reporte Productos</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="{{ url('/reportes/compras')}}"><i class="fa fa-circle-o text-aqua"></i> Reporte Compras</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="{{ url('/reportes/ventas')}}"><i class="fa fa-circle-o text-aqua"></i> Reporte Ventas</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="{{ url('/reportes/grafica_ventas')}}"><i class="fa fa-circle-o text-aqua"></i> Grafica ventas</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="{{ url('/reportes/grafica_compras')}}"><i class="fa fa-circle-o text-aqua"></i> Grafica compras</a></li>
              </ul>
              
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema</h3>
                  <div class="box-tools pull-right">
                    @if(Session::has('segundos'))
                         <div>Timer (segundos) :<label>{{ Session::get('segundos') }}</label></div>
                    @endif 
                  </div>
                </div>
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              @yield('contenido')
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.0.1
        </div>
        <strong>Copyright &copy; 2016 <a href=" {{ url('/')}}">LCSG</a>.</strong> All rights reserved.
      </footer>

      @endif

    <script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
    @stack('scripts')

    @section('scripts')
    @show

    @section('highcharts')
    @show

    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>

  </body>
</html>
