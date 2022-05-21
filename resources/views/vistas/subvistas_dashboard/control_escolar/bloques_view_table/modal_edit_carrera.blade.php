@foreach ($carreras as $carrera)
<div class="col s12 center-align">
    <input id="foto_front" type="file" accept="image/*" style="display: none;" />
    <div class="image-upload">
      <label for="file-input2_update">

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
     <img class="circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeeUl9IZDN97pBQNgeunx6dD1df-4g7vkPFw&usqp=CAU" width="200px" style="cursor: pointer"  id="foto_front_img_update"/>
    </label>
      <input id="file-input2_update" type="file" accept="image/*" onchange="PreviewGaleryUpdate(event)" />
    </div>
</div>
<script>
var PreviewGaleryUpdate = function(event) 
{
  var blobText = "";
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('foto_front_img_update');
    output.src = reader.result;
    // Split the base64 string in data and contentType
    var block = reader.result.split(";");
    // Get the content type
    var contentType = block[0].split(":")[1];// In this case "image/gif"
    // get the real base64 content of the file
    var realData = block[1].split(",")[1];// In this case "iVBORw0KGg...."

    // Convert to blob
    var blob = b64toBlobUpdate(realData, contentType);

    let fileInputElement = document.getElementById('file-input2_update');
    let container = new DataTransfer();
    // Here load or generate data
    let file = new File([blob], "file-input2_update.png",{type:"image/jpeg", lastModified:new Date().getTime()});
    container.items.add(file);
    
    fileInputElement.files = container.files;
  };
  reader.readAsDataURL(event.target.files[0]);
  
};

function b64toBlobUpdate(b64Data, contentType, sliceSize) 
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

  <div class="input-field col s6">
    <input id="clave_carrera_update" type="text" name='text' class="validate" value="{{$carrera->clave}}">
    <label for="clave_carrera_update">Clave Carrera</label>
  </div>
  <div class="input-field col s6">
    <input id="nombre_carrera_update" type="text" class="validate" name='text' onkeyup="capitalizarLetter(this.value, this)" value="{{$carrera->nombre_carrera}}">
    <label for="nombre_carrera_update">Nombre de Carrera</label>
  </div>  
  <div class="input-field col s12">
    <textarea class="materialize-textarea" id="descripcion_carrera_update" style="height: 100px;" name='text' onkeyup="capitalizarLetter(this.value, this)">{{$carrera->descripcion}}</textarea>
    <label for="descripcion_carrera_update">Descripción de Carrera</label>
  </div>
  <div class="input-field col s12">
    <input id="area_update" type="text" class="validate" name='text' onkeyup="capitalizarLetter(this.value, this)" value="{{$carrera->area}}">
    <label for="area_update">Area</label>
  </div>
  <div class="input-field col s12">
    <input id="semestres_update" type="text" class="validate" name='text' onkeyup="capitalizarLetter(this.value, this)" value="{{$carrera->semestres}}">
    <label for="semestres_update">Semestres</label>
  </div>
  @endforeach  

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

  $("input[name='text']")
      .each(function () {
        $("label[for='"+this.id+"']").addClass('active');
  });

  $("input[id='descripcion_carrera_update']")
      .each(function () {
        $("label[for='"+this.id+"']").addClass('active');
  });
  $('select').formSelect();
  // Or with jQuery
  $(document).ready(function(){
    $('.datepicker').datepicker({
      "format":'yyyy-mm-dd',
      container: "body"
      });
  });
</script>
