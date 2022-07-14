<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="navbar-fixed">
  <nav class="red darken-3">
      <div class="nav-wrapper">
      <a data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
          <li style="border-radius: 5px;display: none; margin-right:20px;padding-right:10px;" id="campoViewClima">
            <img class="tooltipped" src="" id="imageTemperatura" style="width: 25px; height: 25px;margin-bottom: 10px;" data-position="left" data-tooltip="Agregar nuevo alumno" >     
            <font style="font-weight: bold" id="textClima"></font>
            <font style="" id="temperaturaClima"></font>                              
          </li>
          <li><font id="hora-responsive"></font></li>
          <li><a  class="tooltipped" onclick="ViewMenu('inicio')"  data-position="bottom" data-tooltip="Inicio"><i class="material-icons">home</i></a></li>
          <!-- <li><a  class="tooltipped" onclick="ViewMenu('notificaciones')"  data-position="bottom" data-tooltip="Notificaciones"><i class="material-icons">notifications</i></a></li> -->
          <li><a   data-target="modal1" class="tooltipped modal-trigger" href=""  data-position="left" data-tooltip="Cerrar Sesión"><i class="material-icons">exit_to_app</i></a></li>

          
      </ul>
      </div>
  </nav>
</div>
<ul id="slide-out" class="sidenav sidenav-fixed">
        
    <li>
        <div class="user-view">
            <div class="background">
                {{-- <i class="material-icons">favorite_border</i> --}}
            </div>
            <a ><span class="black-text text-darken-2">Hola {{session('nombre')}}.</span></a>
        </div>
    </li>
    <li>
        <a onclick="ViewMenu('inicio')" style="cursor: pointer;"><i class="material-icons">home</i>Inicio</a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <?php
      if (session('tipo')=='encargado_promos' || session('tipo')=='admin') {
    ?>
    <li>
        <a onclick="ViewMenu('promos')" style="cursor: pointer;"><i class="material-icons">paid</i>Promos</a>
    </li>
    <li>
        <div class="divider"></div>
    </li> 
    <?php
      }
      if (session('tipo')=='encargado_servicios' || session('tipo')=='admin') {
    ?>
    <li>
        <a onclick="ViewMenu('ordenes')" style="cursor: pointer;"><i class="material-icons">shopping_cart</i>Servicios</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <?php
      }
      if (session('tipo')=='encargado_usuarios' || session('tipo')=='admin') {
    ?>
    <li>
        <a onclick="ViewMenu('Usuario')" style="cursor: pointer;"><i class="material-icons">group</i>Usuarios</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <?php
      }
      if (session('tipo')=='encargado_nannys' || session('tipo')=='admin') {
    ?>
    <li>
        <a onclick="ViewMenu('Nanny')" style="cursor: pointer;"><i class="material-icons">face_retouching_natural</i>Nannys</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <?php
      }
      if (session('tipo')=='encargado_servicio_cliente' || session('tipo')=='admin') {
    ?>
    <li>
        <a onclick="ViewMenu('servicio_cliente')" style="cursor: pointer;"><i class="material-icons">forum</i>Servicio al cliente</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <?php
      }
      if (session('tipo')=='admin') {
    ?>
    <li>
        <a onclick="ViewMenu('configuracion')" style="cursor: pointer;"><i class="material-icons">settings</i>Configuracion</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <?php
      }
    ?>
  </ul>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
     var elems = document.querySelectorAll('.sidenav');
     var instances = M.Sidenav.init(elems, {
       // specify options here
     });
   });
 
   $(document).ready(function(){
     $('.sidenav').sidenav({

       // specify options here
     });
   });

   document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.tooltipped');
    });

    // Or with jQuery

    $(document).ready(function(){
      $('.tooltipped').tooltip();
    });
   </script>
