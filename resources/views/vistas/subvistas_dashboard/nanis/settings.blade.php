<meta name="csrf-token-settings" content="{{ csrf_token() }}">

<div class="col s12">

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
                <input id="sid" type="text"  name="text" value="{{$config[0]['stripe_Publishable_Key_live']}}" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="sid">SID</label>
            </div>
            <div class="input-field col s12 m12 l6">
                <input id="auth_token"  name="text" value="{{$config[0]['stripe_Secret_Key_live']}}" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="auth_token">Auth token</label>
            </div>
            <div class="input-field col s12 m12 l6">
                <input id="sid_test"  name="text" value="{{$config[0]['stripe_Publishable_Key_test']}}" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="sid_test">SID Test</label>
            </div>
            <div class="input-field col s12 m12 l6">
                <input id="auth_test"  name="text" value="{{$config[0]['stripe_Secret_Key_test']}}" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="auth_test">Auth Test</label>
            </div>
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
                <input id="msg1" name="text" value="{{$config[0]['twilio_SID']}}" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="msg1">SID</label>
            </div>
            <div class="input-field col s12 m12 l12">
                <input id="msg2" name="text" value="{{$config[0]['twilio_Auth_Token']}}" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="msg2">Auth Token</label>
            </div>
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
                <input id="token" name="text" value="{{$config[0]['firebase_Token']}}" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
                <label for="token">Token</label>
            </div>
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
            <center>
              <div class="input-field col s12 m12 l12"><?php
                  if ($config[0]['main_switch']=='1') {
                  ?>
                      <a class="tooltipped btn-floating btn-large waves-effect waves-light green darken-2 modal-trigger " href="#bajaswitch"  onclick="downOutSwitch('{{$config[0]['id']}}')" data-position="left" data-tooltip="Apagar"><i class="material-icons">done</i></a>
                  <?php
                  }else{
                  ?>
                      <a class="tooltipped btn-floating btn-large red darken-4 modal-trigger " href="#altaswitch" onclick="downOutSwitch('{{$config[0]['id']}}')"  data-position="left" data-tooltip="Prender"><i class="material-icons">remove</i></a>
                  <?php
                  }
                  ?>  
              </div>
            </center>
          </div>
        </div>
      </div>
    </div> 
  </div>  
  
  <center>
      <button id="btnActualiza" onclick="updateConfig('{{route('config_update')}}')" class="btn waves-effect waves-light red darken-1 btn-large" type="submit">Actualizar<i class="material-icons right">update</i></button>
    </center>      
</div>

<script>

$(document).ready(function(){

$("input[name='text']")
    .each(function () {
      $("label[for='"+this.id+"']").addClass('active');
});
$('select').formSelect();

$('.tooltipped').tooltip(); 
});

function updateConfig(url){
  if(url!='')
  {
    var id = '{{$config[0]['id']}}';
    var sid = $('#sid').val();
    var auth_token = $('#auth_token').val();
    var sid_test = $('#sid_test').val();
    var auth_test = $('#auth_test').val();
    var msg1 = $('#msg1').val();
    var msg2 = $('#msg2').val();
    var token = $('#token').val();

    var data = new FormData();
    data.append('_token', $("meta[name='csrf-token-settings']").attr("content"));
    data.append('id',id);
    data.append('sid',sid);
    data.append('auth_token',auth_token);
    data.append('sid_test',sid_test);
    data.append('auth_test',auth_test);
    data.append('msg1',msg1);
    data.append('msg2',msg2);
    data.append('token',token);

    $.ajax({
      url:url,
      type:'POST',
      contentType:false,
      data:data,
      dataType: "html",
      processData:false,
      cache:false,
      beforeSend: function(){
        $('#loading-overlay').css({'width': '0%', 'background':'#EF0000'});
        $('#loading-overlay-text').html('');
        onLoad()
      },
      error: function(request, status, error)
      {
        $('#loading-overlay').css({'width': '0%', 'background':'#EF0000'});
        $('#loading-overlay-text').html('');
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
              $('#loading-overlay').css({'width': percentComplete + '%', 'background':'lightgreen'});
            }
            else 
            {
              if (percentComplete>50 && percentComplete<100)
              {
                $('#loading-overlay').css({'width': percentComplete + '%', 'background':'#EFC300'});
              }
              else
              {
                $('#loading-overlay').css({'width': percentComplete + '%', 'background':'#EF0000'});
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
          M.toast({html: data, outDuration: 300})
          ViewConfig('settings', 'control-swipe-1')
        offLoad()
      },
      complete: function (XMLHttpRequest, textStatus) {
          var headers = XMLHttpRequest.getAllResponseHeaders();
          id_servicio = "";
          /*  console.log('headers', headers); */
      }
      });
  }else{
    offLoad()
    M.toast({html: 'Vista en fabricación', outDuration: 300})
  }      
}

</script>