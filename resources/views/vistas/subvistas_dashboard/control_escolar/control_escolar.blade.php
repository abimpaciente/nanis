<meta name="csrf-token-control_escolar_view" content="{{ csrf_token() }}">

<div class="col s12">
    <div class="row" style="display: flex;
    justify-content: center;
    align-items: center;">
        <div class="col s12">
            <p class="flow-text" style="font-size: 35px;">Control Escolar</p>
            <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Administra todo desde aqui.</small></p>
        </div>        
    </div>
</div>


<div class="col s12 m6 l4">
    <h2 class="header"><h4>Expedientes</h4></h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="img/icons/control_escolar/expendientes.png" style="padding:10px;width:70px;" >
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Observa o edita tus datos desde este apartados.</p>
        </div>
        <div class="card-action">
          <a onclick="ViewPanelControl('expendiente_control_escolar')" style="cursor: pointer">VER</a>
        </div>
      </div>
    </div>
  </div>

  
  <div class="col s12 m6 l4">
    <h2 class="header"><h4>Biblioteca Digital</h4></h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="img/icons/control_escolar/biblioteca.png" style="padding:10px;width:70px;" >
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Tus materias en curso o ya cursadas.</p>
        </div>
        <div class="card-action">
          <a onclick="ViewPanelControl('biblioteca_digital_control_escolar')" style="cursor: pointer">VER</a>
        </div>
      </div>
    </div>
  </div>
          
  <div class="col s12 m6 l4">
    <h2 class="header"><h4>Formatos de Pago</h4></h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="img/icons/control_escolar/formatos_pago.png" style="padding:10px;width:70px;" >
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Revisa las materias que estas cursando y sus docentes.</p>
        </div>
        <div class="card-action">
          <a onclick="ViewPanelControl('formatos_pago_control_escolar')" style="cursor: pointer">VER</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col s12 m6 l4">
    <h2 class="header"><h4>Horarios Escolares</h4></h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="img/icons/control_escolar/horario_escolares.png" style="padding:10px;width:70px;" >
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Revisa tus Pagos aprobados y pendientes.</p>
        </div>
        <div class="card-action">
          <a onclick="ViewPanelControl('horarios_escolares_control_escolar')" style="cursor: pointer">VER</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col s12 m6 l4">
    <h2 class="header"><h4>Periodos</h4></h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="img/icons/control_escolar/periodos.png" style="padding:10px;width:70px;" >
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Administra los periodos escolares desde aqui.</p>
        </div>
        <div class="card-action">
          <a onclick="ViewPanelControl('periodos_control_escolar')" style="cursor: pointer">VER</a>
        </div>
      </div>
    </div>
  </div>


  <div class="col s12 m6 l4">
    <h2 class="header"><h4>Materias</h4></h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="img/icons/control_escolar/materias.png" style="padding:10px;width:70px;" >
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Observa la información de tus docentes.</p>
        </div>
        <div class="card-action">
          <a onclick="ViewPanelControl('materias_control_escolar')" style="cursor: pointer">VER</a>
        </div>
      </div>
    </div>
  </div>



  <div class="col s12 m6 l4">
    <h2 class="header"><h4>Carreras</h4></h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="img/icons/control_escolar/carreras.png" style="padding:10px;width:70px;" >
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Observa la información de tus docentes.</p>
        </div>
        <div class="card-action">
          <a onclick="ViewPanelControl('carrera_control_escolar')" style="cursor: pointer">VER</a>
        </div>
      </div>
    </div>
  </div>


  <div class="col s12 m6 l4">
    <h2 class="header"><h4>Foro</h4></h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="img/icons/control_escolar/foro.png" style="padding:10px;width:70px;" >
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Administra el foro desde aqui.</p>
        </div>
        <div class="card-action">
          <a onclick="ViewPanelControl('foro_control_escolar')" style="cursor: pointer">VER</a>
        </div>
      </div>
    </div>
  </div>



  <div class="col s12 m6 l4">
    <h2 class="header"><h4>Notificaciones</h4></h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="img/icons/control_escolar/notification.png" style="padding:10px;width:70px;" >
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Envia notificaciones a los alumnos, docentes o global.</p>
        </div>
        <div class="card-action">
          <a onclick="ViewPanelControl('notificaciones_control_escolar')" style="cursor: pointer">VER</a>
        </div>
      </div>
    </div>
  </div>

  <script>
function ViewPanelControl(view){

  if(view!='')
  {
  var data = new FormData();
  data.append('_token', $("meta[name='csrf-token-control_escolar_view']").attr("content"));
  data.append('view',view);
  $.ajax({
    url:'{{route('control_escolar.store')}}',
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
    if ( window.ActiveXObject )
    {
      jqXHR = new window.ActiveXObject( "Microsoft.XMLHTTP" );
    }
    else
    {
      jqXHR = new window.XMLHttpRequest();
    }
    //Upload progress
    jqXHR.upload.addEventListener( "progress", function (evt)
    {
      if ( evt.lengthComputable )
      {
        var percent = (evt.loaded / evt.total) * 100;
        var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
        //Do something with upload progress
        if (percentComplete>=100) 
        {
          $('#loading-overlay').css({'width': percentComplete + '%', 'background':'#43a047', 'border-radius':'0px'});
        }
        else 
        {
          if (percentComplete>50 && percentComplete<100)
          {
            $('#loading-overlay').css({'width': percentComplete + '%', 'background':'#ffa726'});
          }
          else
          {
            $('#loading-overlay').css({'width': percentComplete + '%', 'background':'#e53935'});
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
  xhrFields:
  { 
      onprogress: function(progress)
      {
          var percentComplete = Math.round( (progress.loaded * 100) / progress.total );
          var percentage = Math.floor((progress.total / progress.totalSize) * 100);
          /* console.log('progress', percentComplete);
          console.log('progress', progress); */
          if (percentage === 100)
          {
              /*   */
          }
      }
  }, 
  success: function(data)
  {          
    $('#loading-overlay').css({'width': '0%', 'background':'#EF0000'});
    $('#loading-overlay-text').html('');
    $('#test-swipe-4').html(data)
    offLoad()
  },
  complete: function (XMLHttpRequest, textStatus) {
      var headers = XMLHttpRequest.getAllResponseHeaders();
  }
  });
  }else{
  offLoad()
  M.toast({html: 'Vista en fabricación', outDuration: 300})
  }      
}
  </script>