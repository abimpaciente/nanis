<meta name="csrf-token-panel_control" content="{{ csrf_token() }}">

<div class="col s12">
  <div class="row">

    <div class="col s12">
      <div class="row" style="display: flex;
      justify-content: center;
      align-items: center;">
          <div class="col s12">
              <p class="flow-text" style="font-size: 35px;">Mi Panel de Control</p>
              <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Revisa y modifica tus datos desde esta area.</small></p>
          </div>
      </div>
  </div>

    <div class="col s12 m6 l4">
      <h2 class="header"><h4>Mis Datos</h4></h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/icons/alumno/mis_datos.png" style="padding:10px;width:70px;" >
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>Observa o edita tus datos desde este apartados.</p>
          </div>
          <div class="card-action">
            <a onclick="ViewPanelControl('mis_datos')" style="cursor: pointer">VER</a>
          </div>
        </div>
      </div>
    </div>

    
    <div class="col s12 m6 l4">
      <h2 class="header"><h4>Mis Materias</h4></h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/icons/alumno/mis_materias.png" style="padding:10px;width:70px;" >
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>Tus materias en curso o ya cursadas.</p>
          </div>
          <div class="card-action">
            <a onclick="ViewPanelControl('mis_materias')" style="cursor: pointer">VER</a>
          </div>
        </div>
      </div>
    </div>
            
    <div class="col s12 m6 l4">
      <h2 class="header"><h4>Historial Académico</h4></h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/icons/alumno/mi_historial.png" style="padding:10px;width:70px;" >
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>Revisa las materias que estas cursando y sus docentes.</p>
          </div>
          <div class="card-action">
            <a onclick="ViewPanelControl('mi_historial_academico')" style="cursor: pointer">VER</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col s12 m6 l4">
      <h2 class="header"><h4>Pagos</h4></h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/icons/alumno/mis_pagos.png" style="padding:10px;width:70px;" >
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>Revisa tus Pagos aprobados y pendientes.</p>
          </div>
          <div class="card-action">
            <a onclick="ViewPanelControl('mis_pagos')" style="cursor: pointer">VER</a>
          </div>
        </div>
      </div>
    </div>


    <div class="col s12 m6 l4">
      <h2 class="header"><h4>Directorio Escolar</h4></h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/icons/alumno/mi_directorio.png" style="padding:10px;width:70px;" >
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>Observa la información de tus docentes.</p>
          </div>
          <div class="card-action">
            <a onclick="ViewPanelControl('mi_directorio_escolar')" style="cursor: pointer">VER</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col s12 m6 l4">
      <h2 class="header"><h4>Materias/Cursos</h4></h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/icons/alumno/mis_materias.png" style="padding:10px;width:70px;" >
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>Agrega o administra tus materias o cursos.</p>
          </div>
          <div class="card-action">
            <a onclick="ViewPanelControl('materias_cursos')" style="cursor: pointer">VER</a>
          </div>
        </div>
      </div>
    </div>   
  </div>        
</div>

<script>

function ViewPanelControl(view)
{
  if(view!='')
  {
    var data = new FormData();
    data.append('_token', $("meta[name='csrf-token-panel_control']").attr("content"));
    data.append('view',view);
    $.ajax({
      url:'{{route('panel_control.store')}}',
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
        $("#contenedor_data").html(data)
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