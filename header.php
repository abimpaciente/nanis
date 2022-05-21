
<?php 
session_start();
?>
<script type="text/javascript">
    $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
    
</script>
    <script type="text/javascript">
        
        function Go_Home()
{
    location.href = "lib/go_home";
}
function cerrar_sesion() {
   location.href = "lib/out";
}
    </script>
 <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header text-center">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div >
                <a style="cursor:pointer;" onclick="Go_Home()"><img id="img_logo" src="img/logo.png" width="250px" style="margin:5px;"></a>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                </ul>
                <ul class="nav navbar-nav navbar-right" id="textMenu">
                    <li>
                        <a class="page-scroll" style="cursor:pointer;" onclick="Go_Home()" id="menu_item_inicio">Inicio</a>
                    </li>
                    <li>
                        <a class="page-scroll" style="cursor:pointer;" href="#Recientes" id="menu_item_recientes">Recientes</a>
                    </li>
                    <li>
                        <a class="page-scroll" style="cursor:pointer;" href="#Ofertas" id="menu_item_ofertas">Ofertas</a>
                    </li>
                     <li>
                        <a class="page-scroll" style="cursor:pointer;" href="#Productos" id="menu_item_productos">Productos</a>
                    </li>
                     <li>
                        <a class="page-scroll" style="cursor:pointer;" href="?view=nosotros" id="menu_item_nosotros">Nosotros</a>
                    </li>
                    <li>
                        <a class="page-scroll" style="cursor:pointer;" href="#Apps" id="menu_item_app">App</a>
                    </li>
                    <li>
                        <a class="page-scroll" style="cursor:pointer;" href="laravel_test/public/login" id="menu_item_app">Moodle</a>
                    </li>
                    <li id="campoLoginShow" style="display: none;">
                    <?php
                    
                    if ($_SESSION['id_usuario_quick_cliente'] != "") 
                    {   
                        ?>
                         <ul class="nav navbar-nav">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;"  id="panelUsuarioMenu"><?php echo $_SESSION['nombre_quick_cliente']; ?> <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li><a href="view/view_cliente">Panel Principal</a></li>
                                <li class="divider"></li>

                                <li><a style="cursor:pointer;" onclick="cerrar_sesion()">Cerrar Sesión</a></li>
                              </ul>
                            </li>
                          </ul>
                         <?php
                    }
                    
                    else if ($_SESSION['id_usuario_quick_delivery'] != "") 
                    {
                    ?>
                         <ul class="nav navbar-nav">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;"  id="panelUsuarioMenu"><?php echo $_SESSION['nombre_quick_delivery']; ?> <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li><a href="view/view_repartidor">Panel Principal</a></li>
                                <li class="divider"></li>

                                <li><a style="cursor:pointer;" onclick="cerrar_sesion()">Cerrar Sesión</a></li>
                              </ul>
                            </li>
                          </ul>
                         <?php
                    }
                    else if ($_SESSION['id_usuario_quick_negocio'] != "") 
                    {
                    ?>
                         <ul class="nav navbar-nav">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;"  id="panelUsuarioMenu"><?php echo $_SESSION['nombre_quick_negocio']; ?> <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li><a href="view/view_negocio">Panel Principal</a></li>
                                <li class="divider"></li>
                                <li><a style="cursor:pointer;" onclick="cerrar_sesion()">Cerrar Sesión</a></li>
                              </ul>
                            </li>
                          </ul>
                    <?php
                    }
                    else
                    {
                    ?>
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;"  id="entrarMenu">ENTRAR<b class="caret"></b></a>
                              <ul class="dropdown-menu" >
                                <li>
                                    <a style="cursor: pointer;color: gray;" href="?view=reg&type=user">
                                        <div class="row" style="margin: 10px;">
                                            <div class="col-6 text-center">
                                                <img src="img/icons_index/quickapp.png" width="30px"  style="border-radius: 10px;">
                                            </div>
                                            <div class="col-6 text-center">
                                                Quick App
                                            </div>
                                        </div>  
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a style="cursor: pointer;color: gray;" href="?view=reg&type=delivery">
                                        <div class="row">
                                            <div class="col-6 text-center">
                                                <img src="img/icons_index/quickappbussiness.png" width="30px"  style="border-radius: 10px;">
                                            </div>
                                            <div class="col-6 text-center">
                                                 Quick Delivery
                                            </div>
                                        </div>  
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a style="cursor: pointer;color: gray;" href="?view=reg&type=business">
                                        <div class="row">
                                            <div class="col-6 text-center">
                                                <img src="img/icons_index/quickappbussiness.png" width="30px"  style="border-radius: 10px;">
                                            </div>
                                            <div class="col-6 text-center">
                                                 Quick Business
                                            </div>
                                        </div>  
                                    </a>
                                </li>
                              </ul>
                            </li>
                          </ul>
                    <?php
                    }
                    ?>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <script type="text/javascript">
    if ((/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()))) 
    {
      var campoLoginShow = document.getElementById('campoLoginShow');
      //campoLoginShow.style.display = "block";
    }
    //var campoLoginShow = document.getElementById('campoLoginShow');
    //campoLoginShow.style.display = "block";
    </script>
    <script src="js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 