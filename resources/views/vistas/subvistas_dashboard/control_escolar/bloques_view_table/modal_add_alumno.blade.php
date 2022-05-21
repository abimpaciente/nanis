<div class="col s12 center-align">
    <input id="foto_front" type="file" accept="image/*" style="display: none;" />
    <div class="image-upload">
      <label for="file-input2">

        <style type="text/css">
         #galeryImage 
        {
          object-fit: cover;
          width:80px;
          height:80px;
           margin:10px;
           cursor: pointer;
        }
        </style>
        <style type="text/css">
          .image-upload>input 
          {
            display: none;
          }
          </style>
     <img class="circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeeUl9IZDN97pBQNgeunx6dD1df-4g7vkPFw&usqp=CAU" width="200px" style="cursor: pointer"  id="foto_front_img"/>
    </label>
      <input id="file-input2" type="file" accept="image/*" onchange="PreviewGalery(event)" />
    </div>
</div>
<script>
var PreviewGalery = function(event) 
{
  var blobText = "";
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('foto_front_img');
    output.src = reader.result;
    // Split the base64 string in data and contentType
    var block = reader.result.split(";");
    // Get the content type
    var contentType = block[0].split(":")[1];// In this case "image/gif"
    // get the real base64 content of the file
    var realData = block[1].split(",")[1];// In this case "iVBORw0KGg...."

    // Convert to blob
    var blob = b64toBlob(realData, contentType);


    let fileInputElement = document.getElementById('file-input2');
    let container = new DataTransfer();
    // Here load or generate data
    let file = new File([blob], "file-input2.png",{type:"image/jpeg", lastModified:new Date().getTime()});
    container.items.add(file);
    
    fileInputElement.files = container.files;
  };
  reader.readAsDataURL(event.target.files[0]);
  
};

function b64toBlob(b64Data, contentType, sliceSize) 
{
  contentType = contentType || '';
  sliceSize = sliceSize || 512;

  var byteCharacters = atob(b64Data);
  var byteArrays = [];

  for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) 
  {
    var slice = byteCharacters.slice(offset, offset + sliceSize);

    var byteNumbers = new Array(slice.length);
    for (var i = 0; i < slice.length; i++) {
        byteNumbers[i] = slice.charCodeAt(i);
    }

    var byteArray = new Uint8Array(byteNumbers);

    byteArrays.push(byteArray);
  }

  var blob = new Blob(byteArrays, {type: contentType});
  return blob;
}
</script>

  <div class="input-field col s12 m12 l4">
    <input id="first_name_text" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
    <label for="first_name_text">Nombre(s)</label>
  </div>
  <div class="input-field col s12 m12 l4">
    <input id="last_name_text" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
    <label for="last_name_text">Apellido Parteno</label>
  </div>
  <div class="input-field col s12 m12 l4">
    <input id="other_last_name_text" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
    <label for="other_last_name_text">Apellido Materno</label>
  </div>
  <div class="input-field col s12">
    <select id="selectCarrera">
        <option value="" disabled selected>Elige una carrera</option>
        @foreach ($carreras as $carrera)  
        <option value="{{$carrera->id}}">{{$carrera->nombre_carrera}}</option>        
        @endforeach  
      </select>
    <label>Carrera</label>
  </div>
  <div class="input-field col s12">
    <input id="email_text" type="email" class="validate">
    <label for="email_text">Email</label>
    <span class="helper-text" data-error="Error, no es un correo" data-success="Correcto"></span>
  </div>
  <div class="input-field col s12">
    <input id="password" type="text" class="validate">
    <label for="password">Contraseña</label>
  </div>
  <div class="input-field col s12">
    <input id="phone" type="text" class="validate">
    <label for="phone">Teléfono</label>
  </div>
  <div class="input-field col s12">
    <input id="fecha_ingreso" type="text" class="validate datepicker">
    <label for="fecha_ingreso">Fecha de Ingreso</label>
  </div>
  <div class="input-field col s12">
    <input id="fecha_nacimiento" type="text" class="validate datepicker">
    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
  </div>
  <script>
    
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });
$(document).ready(function(){
    $('select').formSelect();
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });

  // Or with jQuery
  $(document).ready(function(){
    $('.datepicker').datepicker({
      "format":'yyyy-mm-dd',
      container: "body"
      });
  });




    </script>