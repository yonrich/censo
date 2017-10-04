<div id="wrapper">
  <div class="overlay"></div>
  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
      <li class="sidebar-brand"> 
        
      </li>
      <!--  Vehiculos  -->
      <?php $misroles = Session::get('roles'); ?>
        @foreach($misroles[0]->permisos as $permiso)
          <li><a  href="{{route($permiso->slug) }}">{{$permiso->name}}</span></a></li>
        @endforeach
    </ul>
  </nav>
  <!-- /#sidebar-wrapper -->
  <!-- Page Content -->
  <div id="page-content-wrapper">
    <button type="button" class="hamburger is-closed" data-toggle="offcanvas"> <span class="hamb-top"></span>
      <span class="hamb-middle"></span>
      <span class="hamb-bottom"></span>

    </button>
  </div>
  <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->
