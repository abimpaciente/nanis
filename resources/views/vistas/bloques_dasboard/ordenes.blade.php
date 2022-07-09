{{-- <style>
  .tabs .tab a {
  color: rgba(38, 166, 154, 0.7);
  /*Custom Text Color*/
}

.tabs .tab a:hover {
  color:#26a69a;
  /*Custom Color On Hover*/
}

.tabs .tab a:focus.active {
  color:#26a69a;
  /*Custom Text Color While Active*/
  background-color: rgba(38, 166, 154, 0.2);
  /*Custom Background Color While Active*/
}

.tabs .indicator {
  background-color:#26a69a;
  /*Custom Color Of Indicator*/
}
</style> --}}

<style>
.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar;
} 
   
   #tabOrdenes{
    position: fixed; 
    width:79%; 
    z-index:2;
  }
   /* Small devices (portrait tablets and large phones, 600px and up) */
   @media only screen and (min-width: 100px) 
  {
    #tabOrdenes{
      width: 95%;
    }
   
  }

   /* Small devices (portrait tablets and large phones, 600px and up) */
   @media only screen and (min-width: 200px) 
  {
    #tabOrdenes{
      width: 95%;
    }
   
  }
   /* Small devices (portrait tablets and large phones, 600px and up) */
   @media only screen and (min-width: 300px) 
  {
    #tabOrdenes{
      width: 95%;
    }
   
  }
   /* Small devices (portrait tablets and large phones, 600px and up) */
   @media only screen and (min-width: 400px) 
  {
    #tabOrdenes{
      width: 95%;
    }
   
  }
  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (min-width: 500px) 
  {
    #tabOrdenes{
      width: 95%;
    }
   
  }
  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (min-width: 600px) 
  {
    #tabOrdenes{
      width: 95%;
    }
   
  }
  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (min-width: 700px) 
  {
    #tabOrdenes{
      width: 95%;
    }
   
  }
  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (min-width: 800px) 
  {
    #tabOrdenes{
      width: 95%;
    }
   
  }
  
  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (min-width: 900px) 
  {
    #tabOrdenes{
      width: 95%;
    }
   
  }
  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (min-width: 1000px) 
  {
    #tabOrdenes{
      width: 75%;
    }
  }
  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 1100px) 
  {
    #tabOrdenes{
      width: 70%;
    }
  }	
  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 1200px) 
  { 
    #tabOrdenes{
      width: 70%;
    }
  } 
  @media only screen and (min-width: 1300px) 
  { 
    #tabOrdenes{
      width: 75%;
    }
  } 

  @media only screen and (min-width: 1400px) 
  { 
    #tabOrdenes{
      width: 80%;
    }
  } 

  @media only screen and (min-width: 1500px) 
  { 
    #tabOrdenes{
      width: 80%;
    }
  } 

  @media only screen and (min-width: 1600px) 
  { 
    #tabOrdenes{
      width: 80%;
    }
  } 
 
  
  
  </style>
<meta name="csrf-token-control_escolar" content="{{ csrf_token() }}">

<ul id="tabOrdenes" class="tabs tabs-fixed tab-demo z-depth-1 scrollbar-primary"  style="">
    <li class="tab col s1.9"><a class="active red-text text-darken-4" href="#servicios-swipe-1" onclick="ViewServicios('solicitando', 'servicios-swipe-1')">Solicitando</a></li>
    <li class="tab col s1.9"><a class="red-text text-darken-4" href="#servicios-swipe-2" onclick="ViewServicios('aceptado', 'servicios-swipe-2')">aceptado</a></li>
    <li class="tab col s1.9"><a class="red-text text-darken-4" href="#servicios-swipe-3" onclick="ViewServicios('cancelado', 'servicios-swipe-3')">cancelado</a></li>
    <li class="tab col s1.9"><a class="red-text text-darken-4" href="#servicios-swipe-4" onclick="ViewServicios('en camino', 'servicios-swipe-4')">en camino</a></li>
    <li class="tab col s1.9"><a class="red-text text-darken-4" href="#servicios-swipe-5" onclick="ViewServicios('prorroga', 'servicios-swipe-5')">prorroga</a></li>
    <li class="tab col s1.9"><a class="red-text text-darken-4" href="#servicios-swipe-6" onclick="ViewServicios('finalizado', 'servicios-swipe-6')">finalizado</a></li>
    <li class="tab col s1.9"><a class="red-text text-darken-4" href="#servicios-swipe-7" onclick="ViewServicios('iniciado', 'servicios-swipe-7')">iniciado</a></li>
    <li class="tab col s1.9"><a class="red-text text-darken-4" href="#servicios-swipe-7" onclick="ViewServicios('help', 'servicios-swipe-7')">Nanny Help</a></li>
</ul>
<div id="servicios-swipe-1" class="col s12" style="margin-top: 50px;">
</div>
<div id="servicios-swipe-2" class="col s12" style="margin-top: 50px;">
</div>
<div id="servicios-swipe-3" class="col s12" style="margin-top: 50px;">
</div>
<div id="servicios-swipe-4" class="col s12" style="margin-top: 50px;">
</div>
<div id="servicios-swipe-5" class="col s12" style="margin-top: 50px;">
</div>
<div id="servicios-swipe-6" class="col s12" style="margin-top: 50px;">
</div>
<div id="servicios-swipe-7" class="col s12" style="margin-top: 50px;">
</div>


  <script>
   $(document).ready(function(){
    $('.tabs').tabs();
    ViewServicios('solicitando', 'servicios-swipe-1');
  });
   </script>

<script>

function ViewServicios(view, id){

  if(view!='')
  {
    var data = new FormData();
    data.append('_token', $("meta[name='csrf-token-control_escolar']").attr("content"));
    data.append('view',view);
    $.ajax({
      url:'{{route('servicios.store')}}',
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

  $('.tooltipped').tooltip(); 
}
</script>

@include('modals.add_orden')
@include('modals.edit_orden')