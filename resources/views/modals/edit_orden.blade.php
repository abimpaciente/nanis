
<div id="editservicio" class="modal modal-fixed-footer modal-fixed-header">
    <div class="modal-header red darken-3 center-align" style="color:white;"><h4>Editar Servicio</h4> </div>
    <div class="modal-content">        
      <meta name="csrf-token-modal_servicio_edit" content="{{ csrf_token() }}">   
      <div class="row" id="content_edit_servicio_modal">         
        
      </div>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a class="modal-close waves-effect waves-green btn-flat" onclick="updateServicio('{{route('servicios_update')}}')">Actualizar</a>
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
  $('select').formSelect();
});

  var id_servicio = "";
function EditServicio(id){
  id_servicio = id;
  var data = new FormData();
  data.append('_token', $("meta[name='csrf-token-modal_servicio_edit']").attr("content"));
  data.append('id_servicio',id);    
  $.ajax({
    url:'{{route('servicios_editmodal')}}',
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
        $('#content_edit_servicio_modal').html(data)
        offLoad()
    },
    complete: function (XMLHttpRequest, textStatus) {
        var headers = XMLHttpRequest.getAllResponseHeaders();
    }
  }) 
}   


function updateServicio(url){
  if(url!='')
  {
    var folio = $('#txtFolio').val();
    var nombre = $('#selectEstado_update').val();

    var data = new FormData();
    data.append('folio',folio);
    data.append('_token', $("meta[name='csrf-token']").attr("content"));
    data.append('status_pedido',nombre);

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
        searchServicios('{{ route('servicios_search') }}', '') 
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