<div class="row">
  <style>

  #text {
    display: block; /* Fallback for non-webkit */
    display: -webkit-box;
    height: 3.8em; /* Fallback for non-webkit, line-height * 2 */
    line-height: 1.3em;
    -webkit-line-clamp: 3; /* if you change this, make sure to change the fallback line-height and height */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  </style>

    @for ($i = 0; $i< 5; $i++)
    <div class="col s6 m6 l4">
      <div class="row" >
        <div class="col s12 ">
          <div class="card">
            <div class="card-image">
              <img src="https://picsum.photos/500/300?random={{$i}}">
              <span class="card-title">Android desde Cero {{$i}}</span>
            </div>
            <div class="card-content">
              <p id="text">{{file_get_contents('http://loripsum.net/api/1/prude')}}</p>
            </div>
            <div class="card-action">
              <a href="{{route('curso.show', $i)}}" target="_blank">ENTRAR</a>
            </div>
          </div>
        </div>
      </div>            
    </div>
    @endfor
    

    <div class="col s12 m6 l4">
      <div class="row">
        <div class="col s12 ">
          <div class="card">
            <div class="card-image">
              <img src="https://media.istockphoto.com/photos/forest-picture-id514269220?k=20&m=514269220&s=170667a&w=0&h=ZBbhdav9VdFKOPDkSKA9Qh3jIIsF2MqaiFxLOAglmTM=">
              <span class="card-title">SwiftUI desde Cero</span>
            </div>
            <div class="card-content">
              <p id="text">Aprende el nuevo framework de Apple utilizando Swift y creando vistas con programacion declarativa.</p>
            </div>
            <div class="card-action">
              <a href="#">ENTRAR</a>
            </div>
          </div>
        </div>
      </div>            
    </div>


    <div class="col s12 m6 l4">
      <div class="row">
        <div class="col s12 ">
          <div class="card">
            <div class="card-image">
              <img src="https://image.winudf.com/v2/image/Y29tLmxpdWJlaS5TY2VuZXJ5X3NjcmVlbnNob3RzXzFfYTM2ODA5YmM/screen-0.jpg?fakeurl=1&type=.jpg">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p id="text">I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">ENTRAR</a>
            </div>
          </div>
        </div>
      </div>            
    </div>

    <div class="col s12 m6 l4">
      <div class="row">
        <div class="col s12 ">
          <div class="card">
            <div class="card-image">
              <img src="https://cdn.dribbble.com/users/518045/screenshots/15345672/media/075eef3d9b40a163b5bc5b62b92f5a96.png?compress=1&resize=400x300">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p id="text">I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">ENTRAR</a>
            </div>
          </div>
        </div>
      </div>            
    </div>


    <div class="col s12 m6 l4">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-image">
              <img src="https://d25rq8gxcq0p71.cloudfront.net/dictionary-images/324/9b315184-86f2-4ba3-954e-b4f16c4857a1.jpg">
              <span class="card-title">Card Title</span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">favorite</i></a>
            </div>
            <div class="card-content">
              <p id="text">I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">ENTRAR</a>
            </div>
          </div>
        </div>
      </div>            
    </div>


 </div>