<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administração</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link  @if(request()->is('/')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('customers.index') }}" class="nav-link @if(request()->is('admin/customers')) active @endif ">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Clientes</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('os.index') }}" class="nav-link @if(request()->is('admin/os')) active @endif">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>Ordens de Serviço
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p> Relatório </p>
            </a>
          </li>
        
        
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @include('flash::message')


  @yield('content')
 
   
  </div>

 


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!--Scripts-->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>

