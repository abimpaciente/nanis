<div id="editpromo" class="modal modal-fixed-footer">
  <div class="modal-header red darken-3 center-align" style="color:white;"><h4>Editar Promo</h4> </div>
  <div class="modal-content">
    <meta name="csrf-token-modal_promo_edit" content="{{ csrf_token() }}"> 
    <div class="row" id="content_edit_promo_modal">         
      
    </div>
  </div>
  <div class="modal-footer">
    <a class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    <a id="btn_editar" class="waves-effect waves-green btn-flat" onclick="updatePromo('{{route('promos_update')}}')">Actualizar</a>
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

var id_promo = "";
function EditPromo(id){
  id_promo = id;
  var data = new FormData();
  data.append('_token', $("meta[name='csrf-token-modal_promo_edit']").attr("content"));
  data.append('id_promo',id);    
  $.ajax({
    url:'{{route('promos_editmodal')}}',
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
        $('#content_edit_promo_modal').html(data)
        offLoad()
    },
    complete: function (XMLHttpRequest, textStatus) {
        var headers = XMLHttpRequest.getAllResponseHeaders();
    }
  }) 
}   

function updatePromo(url){
  if(url!='')
  {
      
      var codigo = $('#codigo_edit_text').val();
      var descuento = $('#descuento_edit_text').val();
      var servicio = $('#selectServicio_edit').val();
      var descripcion = $('#descripcion_edit_text').val();
      var fecha_inicio = $('#fecha_inicio_edit_text').val();
      var fecha_fin = $('#fecha_fin_edit_text').val();
      var message = "";

      if(fecha_fin === ""){
        message+="fecha fin, ";
          $('#fecha_fin_edit_text').focus();
      }
      if(fecha_inicio === ""){
        message+="fecha inicio, ";
          $('#fecha_inicio_edit_text').focus();
      }
      if(servicio === null){
        message+="servicio, ";
      }
      if(descuento === ""){
        message+="descuento, ";
          $('#descuento_edit_text').focus();
      }
      if(codigo === ""){
        message+="servicio ";
          $('#codigo_edit_text').focus();
      }
      if(message!==""){
          M.toast({html: "Valida los campos " + message, outDuration: 300});
          return;
      }

      $("#btn_editar").addClass("modal-close");

    var data = new FormData();
    if(document.getElementById('file-input2_update').value!=''){
      var inputFileImage = document.getElementById('file-input2_update');
      var fileFoto = inputFileImage.files[0];
      data.append('foto', fileFoto);
    }

    data.append('_token', $("meta[name='csrf-token-edit_promos']").attr("content"));
      data.append('codigo',codigo);
      data.append('descuento',descuento);
      data.append('servicio',servicio);
      data.append('descripcion',descripcion);
      data.append('fecha_inicio',fecha_inicio);
      data.append('fecha_fin',fecha_fin);
    
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
        }else
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
        $('#loading-overlay').css({'width': '0%', 'background':'#EF0000'});
        $('#loading-overlay-text').html('');
        M.toast({html: data, outDuration: 300})
      $("#btn_editar").removeClass("modal-close");
        searchPromos('{{ route('promos_search') }}')
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