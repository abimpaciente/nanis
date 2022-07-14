<div id="addempleado" class="modal modal-fixed-footer">
  <div class="modal-header red darken-3 center-align" style="color:white;"><h4>Agregar Empleado</h4></div>

    <div class="modal-content">
      <meta name="csrf-token-modal_empleado_add" content="{{ csrf_token() }}">   
      <div class="row" id="content_add_empleado_modal">
            
          
        
      </div>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a id="btn_guardar" class="waves-effect waves-green btn-flat" onclick="InsertEmpleado('{{route('empleados_insert')}}')">Guardar</a>
    </div>
  </div>
  <style>
    #toast-container {
        min-width: 10%;
        top: 80%;
        right: 50%;
        transform: translateX(50%) translateY(50%);
    }
</style>
  <script>
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
});
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems, options);
});

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.datepicker');
  var instances = M.Datepicker.init(elems, options);
});

  // Or with jQuery

$(document).ready(function(){
  $('.datepicker').datepicker({
    "format":'yyyy-mm-dd',
    container: 'body' //this will append to body
  });
  $('.modal').modal();
  $('select').formSelect();
});
// Or with jQuery

  function AddEmpleado(){

    var data = new FormData();
    data.append('_token', $("meta[name='csrf-token-modal_empleado_add']").attr("content"));


    $.ajax({
        url:'{{route('empleados_addmodal')}}',
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
        console.log(request);
        },
        success:function (data) {
            $('#content_add_empleado_modal').html(data)
            offLoad()
        },
        complete: function (XMLHttpRequest, textStatus) {
            var headers = XMLHttpRequest.getAllResponseHeaders();
        }
    }) 
  } 



function InsertEmpleado(url){
    if(url!='')
    {
      
      var usuario = $('#usuario_text').val();
      var pass = $('#pass_text').val();
      var email = $('#email_text').val();
      var tipo = $('#selectTipo').val();
      var message = "";

      if(usuario === ""){
        message+="usuario, ";
          $('#usuario_text').focus();
      }
      if(usuario === ""){
        message+="password, ";
          $('#pass_text').focus();
      }
      if(email === ""){
        message+="correo, ";
          $('#email_text').focus();
      }
      if(tipo === null){
        message+="tipo, ";
      }
      if(message!==""){
          M.toast({html: "Valida los campos " + message, outDuration: 300});
          return;
      }

      $( "#btn_guardar" ).addClass("modal-close");

      var data = new FormData();
      data.append('_token', $("meta[name='csrf-token']").attr("content"));
      data.append('usuario',usuario);
      data.append('pass',pass);
      data.append('email',email);
      data.append('tipo',tipo);
      
      $.ajax({
          url:url,
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
                /* console.log('progress', percentComplete);console.log('progress', progress); */
                if (percentage === 100)
                {
                }
            }
        }, 
        success: function(data)
        {
          //console.log('progress', data);
          $('#loading-overlay').css({'width': '0%', 'background':'#EF0000'});
          $('#loading-overlay-text').html('');
          M.toast({html: data, outDuration: 300})
          $("#btn_guardar").removeClass("modal-close");

          searchEmpleados('{{ route('empleados_search') }}') 
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