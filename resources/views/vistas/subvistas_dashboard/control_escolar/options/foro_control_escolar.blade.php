<meta name="csrf-token-panel_control" content="{{ csrf_token() }}">

<div class="col s12">
  <div class="row">

    <div class="col s12">
      <div class="row" style="display: flex;
      justify-content: center;
      align-items: center;">
          <div class="col s12">
              <p class="flow-text" style="font-size: 35px;">Configuracion</p>
              <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Revisa tus datos desde esta area.</small></p>
          </div>
      </div>
  </div>

  <div class="col s12 m6 l6">
      <h2 class="header"><h4>Pagos</h4></h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/icons/alumno/mis_pagos.png" style="padding:10px;width:70px;" >
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>Revisa tus claves.</p>
          </div>
          <div class="card-action">
              
            <div class="input-field col s12 m12 l6">
                <input id="sid" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="sid">SID</label>
            </div>
            <div class="input-field col s12 m12 l6">
                <input id="auth_token" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="auth_token">Auth token</label>
            </div>
            <div class="input-field col s12 m12 l6">
                <input id="sid_test" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="sid_test">SID Test</label>
            </div>
            <div class="input-field col s12 m12 l6">
                <input id="a_test" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="a_test">A Test</label>
            </div>
            <!-- <a onclick="ViewPanelControl('mis_pagos')" style="cursor: pointer">VER</a> -->
          </div>
        </div>
      </div>
    </div>

    
    <div class="col s12 m6 l6">
      <h2 class="header"><h4>SMS</h4></h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/icons/alumno/mis_materias.png" style="padding:10px;width:70px;" >
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>Tus mensajes SMS.</p>
          </div>
          <div class="card-action">
            <div class="input-field col s12 m12 l12">
                <input id="msg1" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="msg1">MSG 1</label>
            </div>
            <div class="input-field col s12 m12 l12">
                <input id="msg2" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="msg2">MSG 2</label>
            </div>
            <!-- <a onclick="ViewPanelControl('mis_materias')" style="cursor: pointer">VER</a> -->
          </div>
        </div>
      </div>
    </div>
            
    <div class="col s12 m6 l6">
      <h2 class="header"><h4>Firebase</h4></h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/icons/alumno/mi_historial.png" style="padding:10px;width:70px;" >
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>Revisa tu token.</p>
          </div>
          <div class="card-action">
            <div class="input-field col s12 m12 l12">
                <input id="token" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="token">Token</label>
            </div>
            <!-- <a onclick="ViewPanelControl('mi_historial_academico')" style="cursor: pointer">VER</a> -->
          </div>
        </div>
      </div>
    </div>



    <div class="col s12 m6 l6">
      <h2 class="header"><h4>Switch</h4></h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/icons/alumno/mi_directorio.png" style="padding:10px;width:70px;" >
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>Prende o apaga.</p>
          </div>
          <div class="card-action">
            <div class="input-field col s12 m12 l12">
                <input id="turn" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="turn">Turn on</label>
            </div>
            <!-- <a onclick="ViewPanelControl('mi_directorio_escolar')" style="cursor: pointer">VER</a> -->
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