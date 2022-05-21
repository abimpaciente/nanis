<div id="deletealumno" class="modal">
    <div class="modal-content">
      <h4>Eliminar</h4>
      <p class="flow-text">¿Quieres eliminar este alumno?</p>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a class="modal-close waves-effect waves-green btn-flat" onclick="deleteAlumno('{{route('alumnos_delete')}}')">Eliminar</a>
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

function eliminarAlumno(id){
  id_alumno = id;
}
function deleteAlumno(url){
    if(url!='')
    {
      var data = {"_token": $("meta[name='csrf-token-baja']").attr("content"),
      'id':id_alumno};
      
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
          M.toast({html: data, outDuration: 300})
          $('#loading-overlay').css({'width': '0%', 'background':'#EF0000'});
          $('#loading-overlay-text').html('');
          searchAlumnos('{{ route('alumnos_search') }}', '') 
          offLoad()
        },
        complete: function (XMLHttpRequest, textStatus) {
            var headers = XMLHttpRequest.getAllResponseHeaders();
            id_alumno = "";
           /*  console.log('headers', headers); */
        }
        });
    }else{
      offLoad()
      M.toast({html: 'Vista en fabricación', outDuration: 300})
    }      
  }
</script>