@extends('layouts.dashboard_plantilla')

@section('title', 'Dashboard')

  @section('content')
  <style>
    .contenedor {
      margin: 0 auto;
      width: 100%;
    }
    
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 500px) 
    {
      .contenedor {
        width: 100%;
      }
     
    }
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) 
    {
      .contenedor {
        width: 100%;
      }
     
    }
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 700px) 
    {
      .contenedor {
        width: 100%;
      }
     
    }
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 800px) 
    {
      .contenedor {
        width: 100%;
      }
     
    }
    
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 900px) 
    {
      .contenedor {
        width: 100%;
      }
     
    }
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 1000px) 
    {
      .contenedor {
        width: 70%;
      }
    }
    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 1100px) 
    {
      .contenedor {
        width: 73%;
      }
    }	
    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 1200px) 
    { 
      .contenedor {
        width: 75%;
      }
    } 
    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1400px) 
    {
      .contenedor {
        width: 78%;
      }
    }
    
    @media screen and (min-width: 1600px) 
    {
      .contenedor {
        width: 81%;
      }
    }
    
    @media screen and (min-width: 1900px) 
    {
      .contenedor {
        width: 83%;
      }
    }
    
    @media screen and (min-width: 2000px) 
    {
      .contenedor {
        width: 84%;
      }
    }
    
    @media screen and (min-width: 2100px) 
    {
      .contenedor {
        width: 86%;
      }
    }
    
    
    </style>
  
    @include('menu.side_menu')   
     
<div class="contenedor right">
  <div class="row" >     
      <div>
      </div>           
      <div class="col s12 m12 l12" id="contenedor_data" >
      </div>
  </div>
</div>
@endsection()
