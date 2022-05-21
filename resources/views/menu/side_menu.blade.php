<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="navbar-fixed">
  <nav class="red darken-3">
      <div class="nav-wrapper">
      <a class="brand-logo"><img id="img_logo" src="https://gilauto.com/wp-content/uploads/2020/11/pngtree-house-location-icon-png-image_1701248.png" width="50px" style="margin:5px;filter: invert(100%);"></a>
      <a data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
          <li style="border-radius: 5px;display: none; margin-right:20px;padding-right:10px;" id="campoViewClima">
            <img class="tooltipped" src="" id="imageTemperatura" style="width: 25px; height: 25px;margin-bottom: 10px;" data-position="left" data-tooltip="Agregar nuevo alumno" >     
            <font style="font-weight: bold" id="textClima"></font>
            <font style="" id="temperaturaClima"></font>                              
          </li>
          <li><font id="hora-responsive"></font></li>
          <li><a  class="tooltipped" onclick="ViewMenu('inicio')"  data-position="bottom" data-tooltip="Inicio"><i class="material-icons">home</i></a></li>
          <li><a  class="tooltipped" onclick="ViewMenu('notificaciones')"  data-position="bottom" data-tooltip="Notificaciones"><i class="material-icons">notifications</i></a></li>
          <li><a  class="tooltipped" onclick="ViewMenu('mis_cursos')"  data-position="bottom" data-tooltip="Mis Cursos"><i class="material-icons">work</i></a></li>
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
            <a href=""><img class="circle" src="{{session('foto')}}"></a>
            <a ><span class="black-text text-darken-2">Hola {{session('nombre')}}, bienvenido a tu aula virtual.</span></a>
            <!--<a href="#email"><span class="black-text email">jdandturk@gmail.com</span></a>-->
        </div>
    </li>
    <li>
        <a onclick="ViewMenu('inicio')" style="cursor: pointer;"><i class="material-icons">home</i>Inicio</a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('ordenes')" style="cursor: pointer;"><i class="material-icons">shopping_cart</i>Ordenes</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('usuarios')" style="cursor: pointer;"><i class="material-icons">group</i>Usuarios</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('nanis')" style="cursor: pointer;"><i class="material-icons">face_retouching_natural</i>Nanis</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('servicio_cliente')" style="cursor: pointer;"><i class="material-icons">forum</i>Servicio al cliente</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('configuracion')" style="cursor: pointer;"><i class="material-icons">settings</i>Configuracion</a>
    </li>
    <li>
      <div class="divider"></div>
    <!-- </li>
    <li>
        <a onclick="ViewMenu('biblioteca_digital')" style="cursor: pointer;"><i class="material-icons">library_books</i>CID (Biblioteca Digital)</a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('panel_control')" style="cursor: pointer;"><i class="material-icons">edit</i>Panel de Control</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('calendario')" style="cursor: pointer;"><i class="material-icons">schedule</i>Calendario</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('educacion_continua')" style="cursor: pointer;"><i class="material-icons">cast_for_education</i>Educación Continua</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('foro')" style="cursor: pointer;"><i class="material-icons">forum</i>Foro</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('mis_dispositivos')" style="cursor: pointer;"><i class="material-icons">devices</i>Mis Dispositivos</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('notificaciones')" style="cursor: pointer;"><i class="material-icons">notifications</i>Notificaciones</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('ayuda')" style="cursor: pointer;"><i class="material-icons">help</i>Ayuda</a>
    </li>
   <li>
      <div class="divider"></div>
    </li>
    <li>
        <a onclick="ViewMenu('control_escolar')" style="cursor: pointer;"><i class="material-icons">school</i>Control Escolar</a>
    </li> 
    <li>
      <div class="divider"></div>
    </li>
    <li>
        <a data-target="modal1" class="modal-trigger"><i class="material-icons">exit_to_app</i>Salir</a>
    </li> -->
    <!--<li>
        <a class="waves-effect" href="#!">Third Link With Waves</a>
    </li>-->
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
