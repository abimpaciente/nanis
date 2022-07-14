<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="img/nanis1.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
              
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <style>
      
      #overlay {
          position: fixed;
          display: none;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: rgba(0,0,0,0.8);
          z-index: 30000000 !important;
      }

      #cargandoGIF{
          position: absolute;
          top: 50%;
          left: 50%;
          font-size: 20px;
          color: white;
          text-align: center;
          transform: translate(-50%,-50%);
          -ms-transform: translate(-50%,-50%);
      }  

      #overlayCheckStatus {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.8);
        z-index: 30000000 !important;
      }


  
  #checkSesion {
    position: fixed; 
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 400px;
    border-radius:5px 5px 5px 5px;
    color:white;
    padding: 10px;
    font-size: 15px;
    

  }

  #sessionBox
  {
    -webkit-transition: width 2s, height 4s; /* For Safari 3.1 to 6.0 */
    transition: width 2s, height 4s;
    transition: all .2s ease-in-out;
  }
  #sessionBox:hover
  {
    transform: scale(1.1); z-index: 2;
  }

  </style> 
  <style>
    .input-field input:focus + label {
        color: #c62828 !important;
    }
    
    .input-field textarea:focus + label {
        color: #c62828 !important;
    }
    
    .row .input-field input:focus {
        border-bottom: 1px solid #c62828 !important;
        box-shadow: 0 1px 0 0 #c62828 !important
    }
    
    .row .input-field textarea:focus {
        border-bottom: 1px solid #c62828 !important;
        box-shadow: 0 1px 0 0 #c62828 !important
    }

    .red{
            background-color:#972a7a !important
        }
        .darken-1{
            background-color:#b94f9d !important
        }
        .red.darken-1{
            background-color:#972a7a !important
        }
        .red.darken-2{
            background-color:#972a7a !important
        }
        .red.darken-3{
            background-color:#972a7a !important
        }
        .red.darken-4{
            background-color:#F90404 !important
        }
    
    </style>

<script type="text/javascript" src="js/pagination.js"></script>

</head>
<body  onload="estado()"style="background:   #ecebeb  ;" id="page-top">

<div id="overlayCheckStatus">
  <div id="checkSesion" style="z-index: 50;">
    <div class="row" style="box-shadow: 0px 0px 5px #7D7D7D;border-radius: 3px;background: white;" id="sessionBox">
      <div class="col s12" >
        <div class="row" style="background: #00417A;border-radius: 3px 3px 0px 0px;display: flex;justify-content: center;align-items: center;padding: 10px;">
          <div class="col s8 left-align">
            <div style="cursor:pointer;margin:10px;font-size: 20px;">
              <font id="text_header_session">Sesión Expirada</font>
            </div>
          </div>
          <div class="col s4 right-align">
            <font style="cursor:pointer;margin:10px;" onclick="onClickRefresh()">×</font>
          </div>            
        </div>          
      </div>
      <div class="col s12" >
        <div class="row" style="display: flex;justify-content: center;align-items: center;">
          <div class="col s4 right-align">
            <i class="material-icons" >schedule</i>
          </div>
          <div class="col s8 text-center">
            <div class="row">
              <div class="col s12 center-align">
                <div style="cursor:pointer;margin:10px;color: #607d8b;font-size: 17px;" onclick="onClickRefresh()">
                  <font id="text_message_1_session">Tu sesion ha expirado.</font>
                </div>
              </div>
              <div class="col s12 center-align">
                <div style="cursor:pointer;margin:10px;color: #607d8b;font-size: 17px;" >
                  <font id="text_message_2_session">¿Quieres actualizar la pagina?</font>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
      <div class="col s6 text-center">              
      </div>
      <div class="col s6 ">
        <div class="row center-align blue darken-3" style="background: #00417A;border-radius: 3px;cursor: pointer; color:white;margin:10px;" onclick="onClickRefresh()">
          <div class="col s12 waves-effect waves-light" style="padding: 10px;">
            OK
          </div>
        </div>              
      </div>                
    </div>      
  </div>    
</div>


  <div id="overlay">
    <div id="loading-overlay" style="height:5px; border-radius: 0px 0px 5px 0px;  box-shadow: 0px 1px 1Rpx #FFFFFF;">      
    </div>
    <div id="loading-overlay-text" style="color:white; margin-top:0px;text-align: right;font-size:25px;"> 
    </div>
    <div id="cargandoGIF">
        <img src="img/loading.gif" width="100px"><br>
        <div id="mensaje_overlay"></div>
        <div id="progress_bar_ovelay" style="display: none;">
          <div id="porcentaje"></div>
          <div id="subiendo"></div>
          <!--<div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>-->
        </div>
    </div>  
  </div>
  <script script>
    
  
    $(document).ready(function(){
      
         /* var onresize = function() {
    //your code here
    //this is just an example
    width = document.body.clientWidth;
    height = document.body.clientHeight;
    console.log(width)
    }
    window.addEventListener("resize", onresize); */
      
    });
 </script>
 
  @yield('content')      
  @include('modals.logout_modal')   

<?php
$new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
//print("<pre>".print_r($new_arr,true)."</pre>");
?>
<script>


$(document).ready(function(){
  //onLoad()
  //onLoadPageCheckStatus();
  ViewMenu('inicio')
});

var timerStart=false;
var chechSesion = true;
var latitude = <?= json_encode($new_arr[0]['geoplugin_latitude'])?>;
var longitude = <?= json_encode($new_arr[0]['geoplugin_longitude'])?>;
function estado() {

  var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
  var semana = ["Domingo","Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
  var today = new Date();
  var day = today.getDate();
  var month = months[today.getMonth()];
  var semana = semana[today.getDay()];
  var year = today.getFullYear();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);

  var hora = h;
  var time = "A.M.";
  if(h>12){
    hora = h - 12;
    time = "P.M.";
  }
  
  $('#hora-responsive').html(semana + " " + day + " de " + month + " del " + year + ", "+ hora + ":" + m+" "+time)
  /* if (document.getElementById('hora')!=null) 
  {
        document.getElementById('hora').innerHTML = semana + " " + day + " de " + month + " del " + year + " , "+ h + ":" + m + ":" + s;
  }
  if (document.getElementById('hora-cardview1')!=null) 
  {
        document.getElementById('hora-cardview1').innerHTML = semana + " " + day + " de " + month + " del " + year + " , "+ h + ":" + m + ":" + s;
  } */
  if (chechSesion) 
  {
    Check_Sesion();
  }
  
  var t = setTimeout(estado, 10000);
}
function checkTime(i) {
  if (i < 10) 
  {
  i = "0" + i
  };  // add zero in front of numbers < 10
  return i;
}
function Check_Sesion() 
{
  var data = new FormData();
  data.append('_token', $("meta[name='csrf-token']").attr("content"));
  data.append('view','check_session');    
  $.ajax({
    url:'{{route('views.store')}}',
    type:'POST',
    contentType:false,
    data:data,
    dataType: "json",
    processData:false,
    cache:false,
    beforeSend: function(){},
    error: function()
    {

    },
    success: function(data)
    {   
      if (data==1) 
      {
        chechSesion = true
      } else if (data==2)
      {
        $('#text_header_session').html('Usuario dado de baja')
        $('#text_message_1_session').html('Fuiste dado de baja.')
        $('#text_message_2_session').html('Comunicate con Administracion')
        chechSesion = false;
        onLoadPageCheckStatus();
      } 
      else if (data==0)
      {
        $('#text_header_session').html('Sesión Expirada')
        $('#text_message_1_session').html('Tu sesion ha expirado.')
        $('#text_message_2_session').html('¿Quieres actualizar la pagina?')
        chechSesion = false;
        onLoadPageCheckStatus();
      } 
    },
  });    
  var gpsSunccuss = function(currentPosition) 
  {
    showPosition(currentPosition) 

  };
  var gpsFailed = function(error) {

    // GetClima(parseFloat(latitude), parseFloat(longitude)); 
  };
  // navigator.geolocation.getCurrentPosition(gpsSunccuss, gpsFailed, {maximumAge:60000, timeout:2000, enableHighAccuracy:true});
}

function getLatLng()
{
  var gpsSunccuss = function(currentPosition) 
  {
    showPosition(currentPosition) 

  };
  var gpsFailed = function(error) {

    // GetClima(parseFloat(latitude), parseFloat(longitude)); 
  };
  // navigator.geolocation.getCurrentPosition(gpsSunccuss, gpsFailed, {maximumAge:60000, timeout:2000, enableHighAccuracy:true});
}

function showPosition(position) 
{
  latitude = position.coords.latitude;
  longitude = position.coords.longitude;
  // GetClima(parseFloat(latitude), parseFloat(longitude)); 
} 
function GetClima(lat, lng) 
{
  var data = new FormData();
  data.append('_token', $("meta[name='csrf-token']").attr("content"));
  data.append('view','check_wheater');   
  data.append('lat',lat);   
  data.append('lng',lng);   
  $.ajax({
    url:'{{route('views.store')}}',
    type:'POST',
    contentType:false,
    data:data,
    dataType: "json",
    processData:false,
    cache:false,
    beforeSend: function(){},
    error: function(error)
    {
      console.log(error);
    },
    success: function(response)
    {
      /* console.log(response) */
      var imageTemperatura = document.getElementById('imageTemperatura');
      imageTemperatura.src = "http://openweathermap.org/img/wn/"+response.weather[0].icon+"@2x.png";
      $('#imageTemperatura').attr('data-position', "left");
      $('#imageTemperatura').attr('data-tooltip', toTitleCaseWheaterDescription(response.weather[0].description));
      //imageTemperatura.title = response.weather[0].description;
      if (response.weather[0].id>=800) 
      {
        //$('#campoViewClima').css({'background':'#1FA953'})
      }else if (response.weather[0].id>=700 && response.weather[0].id<=799) 
      {

        //$('#campoViewClima').css({'background':'#FF5722'})

      }else if (response.weather[0].id>=600 && response.weather[0].id<=699) 
      {

        //$('#campoViewClima').css({'background':'#FF5722'})

      }else if (response.weather[0].id>=500 && response.weather[0].id<=599) 
      {
        //$('#campoViewClima').css({'background':'#D81322'})

      }else if (response.weather[0].id>=300 && response.weather[0].id<=399) 
      {
        //$('#campoViewClima').css({'background':'#D81322'})
      }
      else if (response.weather[0].id>=200 && response.weather[0].id<=299) 
      {
        //$('#campoViewClima').css({'background':'#D81322'})
      }
      $('#textClima').html("Clima en: "+response.name)
      $('#temperaturaClima').html(Math.ceil( response.main.temp)+" °C")
      $('#campoViewClima').show()
    },
  }); 
}
function toTitleCaseWheaterDescription( str )
{
    return str.split(/\s+/).map( s => s.charAt( 0 ).toUpperCase() + s.substring(1).toLowerCase() ).join( " " );
}

function ViewMenu(view){
  if(view!='')
  {
    var data = new FormData();
    data.append('_token', $("meta[name='csrf-token']").attr("content"));
    data.append('view',view);
    $.ajax({
      url:'{{route('views.store')}}',
      type:'POST',
      contentType:false,
      data:data,
      dataType: "html",
      processData:false,
      cache:false,
      beforeSend: function(){
        onLoad()
      },
      error: function(request, status, error)
      {
        offLoad()
        console.log(error);
      },
      xhr: function (request)
      {          
        var jqXHR = null;
        if (window.ActiveXObject)
        {
          jqXHR = new window.ActiveXObject("Microsoft.XMLHTTP");
        }
        else
        {
          jqXHR = new window.XMLHttpRequest();
        }
        //Upload progress                   
        jqXHR.upload.addEventListener( "progress", function (evt)
        {
          if (evt.lengthComputable)
          {
            var percent = (evt.loaded / evt.total) * 100;
            var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
            //Do something with upload progress
            if (percentComplete>=100) 
            {
              //$('#loading-overlay').css({'width': percentComplete + '%', 'background':'linear-gradient(to top, rgba(52, 124, 55, 0.7) 1%,rgba(67, 160, 71, 1) 100%) 100%', 'border-radius':'0px'});
              //$('#loading-overlay').css({'width': percentComplete + '%', 'background':'#43a047', 'border-radius':'0px'});
              $('#loading-overlay').css({'width': percentComplete + '%', 'background':'lightgreen'});
            }
            else 
            {
              if (percentComplete>50 && percentComplete<100)
              {
                $('#loading-overlay').css({'width': percentComplete + '%', 'background':'#EFC300'});
                //$('#loading-overlay').css({'width': percentComplete + '%', 'background':'linear-gradient(to top, rgba(242, 144, 0, 0.7) 1%,rgba(255, 167, 38, 1) 100%'});
              }
              else
              {
                $('#loading-overlay').css({'width': percentComplete + '%', 'background':'#EF0000'});
                //$('#loading-overlay').css({'width': percentComplete + '%', 'background':'linear-gradient(to top, rgba(226, 35, 30, 0.7) 1%,rgba(229, 57, 53, 1) 100%)'});
              }                      
            }
            $('#loading-overlay-text').css({'width': percentComplete + '%'});
            $('#loading-overlay-text').html(percentComplete + '%');
            if (Math.round(evt.loaded*0.001)>=1024) 
            {
              var formatMb = parseFloat(evt.loaded*0.000001).toFixed(2);
              var formatMbTotal = parseFloat(evt.total*0.000001).toFixed(2);
              $('#subiendo').html(formatMb + " Mb de " + formatMbTotal + " Mb");
            }
            else
            {
              $('#subiendo').html(Math.round(evt.loaded*0.001) + " Kb de " + Math.round(evt.total*0.001) + " Kb");
            }
          }
        }, false );
        return jqXHR;
      }, 
      success: function(data)
      {          
        $('#loading-overlay').css({'width': '0%', 'background':'#EF0000'});
        $('#loading-overlay-text').html('');
        $("#contenedor_data").html(data)
        offLoad()
      }
    });
  }else{
    offLoad()
    M.toast({html: 'Vista en fabricación', outDuration: 300})
  }      
}
     
      function onLoad() {
        document.getElementById("overlay").style.display = "block";
        $('#mensaje_overlay').html("Cargando, espere...");
    }

    function offLoad() {
        document.getElementById("overlay").style.display = "none";

    }

    function onLoadPageCheckStatus() {
      document.getElementById("overlayCheckStatus").style.display = "block";
      $('#mensaje_overlay').html("");
    }

    function offLoadPageCheckStatus() {
        document.getElementById("overlayCheckStatus").style.display = "none";

    }

    function onClickRefresh() 
    {

    window.location.href = "dashboard";  
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script> 
</body>
</html>