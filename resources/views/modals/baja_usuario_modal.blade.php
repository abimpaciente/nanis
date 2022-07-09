<div id="bajausuario" class="modal">
    <div class="modal-content">
      <h4>Baja</h4>
      <meta name="csrf-token-baja" content="{{ csrf_token() }}">
      <p class="flow-text">Dar de baja {{$tipo}}?</p>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a class="modal-close waves-effect waves-green btn-flat" onclick="bajaUsuario('{{route('usuarios_change_status')}}', '0', '{{$tipo}}')">Dar baja</a>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });
// Or with jQuery

$(document).ready(function(){
  $('.modal').modal();
});

function downOutUsuario(id){
  id_usuario = id;
}
function bajaUsuario(url, status, tipo){
    if(url!='')
    {
      var data = {"_token": $("meta[name='csrf-token-baja']").attr("content"),
      'id':id_usuario, 
      'status':status,
      'tipo':tipo};
      
      
      $.ajax({
          url:url,
          type:'POST',
          data:data,
          dataType: 'html',
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
          /* console.log('progress', data);  */
          $('#loading-overlay').css({'width': '0%', 'background':'#EF0000'});
          $('#loading-overlay-text').html('');
          M.toast({html: data, outDuration: 300})
          // searchUsuarios('{{ route('usuarios_search') }}', '') 
          ViewMenu(tipo)
          offLoad()
        },
        complete: function (XMLHttpRequest, textStatus) {
            var headers = XMLHttpRequest.getAllResponseHeaders();
            id_usuario = "";
           /*  console.log('headers', headers); */
        }
        });
    }else{
      offLoad()
      M.toast({html: 'Vista en fabricación', outDuration: 300})
    }      
  }
</script>