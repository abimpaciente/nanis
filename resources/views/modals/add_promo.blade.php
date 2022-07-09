<div id="addpromo" class="modal modal-fixed-footer">
  <div class="modal-header red darken-3 center-align" style="color:white;"><h4>Agregar Promo</h4></div>

    <div class="modal-content">
      <meta name="csrf-token-modal_promo_add" content="{{ csrf_token() }}">   
      <div class="row" id="content_add_promo_modal">
            
          
        
      </div>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a id="btn_guardar" class="waves-effect waves-green btn-flat" onclick="InsertPromo('{{route('promos_insert.store')}}')">Guardar</a>
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

  function AddPromo(){

    var data = new FormData();
    data.append('_token', $("meta[name='csrf-token-modal_promo_add']").attr("content"));


    $.ajax({
        url:'{{route('promos_addmodal')}}',
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
            $('#content_add_promo_modal').html(data)
            offLoad()
        },
        complete: function (XMLHttpRequest, textStatus) {
            var headers = XMLHttpRequest.getAllResponseHeaders();
        }
    }) 
  } 



function InsertPromo(url){
    if(url!='')
    {
      
      var codigo = $('#codigo_text').val();
      var descuento = $('#descuento_text').val();
      var servicio = $('#selectServicio').val();
      var descripcion = $('#descripcion_text').val();
      var fecha_inicio = $('#fecha_inicio').val();
      var fecha_fin = $('#fecha_fin').val();
      var message = "";

      if(fecha_fin === ""){
        message+="fecha fin, ";
          $('#fecha_fin').focus();
      }
      if(fecha_inicio === ""){
        message+="fecha inicio, ";
          $('#fecha_inicio').focus();
      }
      if(servicio === null){
        message+="servicio, ";
      }
      if(descuento === ""){
        message+="descuento, ";
          $('#descuento_text').focus();
      }
      if(codigo === ""){
        message+="servicio ";
          $('#codigo_text').focus();
      }
      if(message!==""){
          M.toast({html: "Valida los campos " + message, outDuration: 300});
          return;
      }

      $( "#btn_guardar" ).addClass("modal-close");

      var data = new FormData();
      if(document.getElementById('file-input2').value!=''){
        var inputFileImage = document.getElementById('file-input2');
        var fileFoto = inputFileImage.files[0];
        data.append('foto', fileFoto);
      }
      data.append('_token', $("meta[name='csrf-token']").attr("content"));
      data.append('codigo',codigo);
      data.append('descuento',descuento);
      data.append('descripcion',descripcion);
      data.append('servicio',servicio);
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

          searchPromos('{{ route('promos_search') }}', '') 
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