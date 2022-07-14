
<meta name="csrf-token-config" content="{{ csrf_token() }}">
<ul id="tabOrdenes" class="tabs tabs-fixed tab-demo z-depth-1" style="">
    <li class="tab col s6"><a class="active red-text text-darken-4" href="#control-swipe-1" onclick="ViewConfig('settings', 'control-swipe-1')">Settings</a></li>
    <li class="tab col s6"><a class="red-text text-darken-4" href="#control-swipe-2" onclick="ViewConfig('empleados', 'control-swipe-2')">Empleados</a></li>
</ul>
<div id="control-swipe-1" class="col s12">
</div>
<div id="control-swipe-2" class="col s12">
</div>
  <script>
   $(document).ready(function(){
    $('.tabs').tabs();
    ViewConfig('settings', 'control-swipe-1');

    $('.tooltipped').tooltip(); 

  });


  function searchEmpleados(url)        
  {
      var value = $('#first_name').val();
      var data = new FormData();
      data.append('_token', $("meta[name='csrf-token-config']").attr("content"));
      data.append('busqueda',value);
      $.ajax({
          url:url,
          type:'POST',
          contentType:false,
          data:data,
          dataType: "html",
          processData:false,
          cache:false,
          beforeSend: function(){
          },
          error: function(request, status, error)
          {
          console.log(request);
          },
          success:function (data) {

              $('#table_content_empleados').html(data)
              updateTable('table_empleados', 'table_pager_empleados');
          },
          complete: function (XMLHttpRequest, textStatus) {
              var headers = XMLHttpRequest.getAllResponseHeaders();
              /* console.log(headers) */
          }
      })      
  }

function ViewConfig(view, id){

  if(view!='')
  {
    var data = new FormData();
    data.append('_token', $("meta[name='csrf-token-config']").attr("content"));
    data.append('view',view);
    $.ajax({
      url:'{{route('config.store')}}',
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
      $("#"+id).html(data)
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


function updateTable(table, id_pager){
  $('#'+id_pager).html('')
  $('#'+table).pageMe({
      pagerSelector:'#'+id_pager,
      activeColor: 'red darken-2',
      prevText:'Anterior',
      nextText:'Siguiente',
      showPrevNext:true,
      hidePageNumbers:false,
      perPage:5
  });
}
</script>

@include('modals.baja_switch_modal')
@include('modals.alta_switch_modal')