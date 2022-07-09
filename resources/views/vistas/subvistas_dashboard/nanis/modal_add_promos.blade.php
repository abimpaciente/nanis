
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
    <input id="codigo_text" type="text" class="validate" onkeyup="this.value = this.value.toUpperCase()">
    <label for="codigo_text">Codigo</label>
  </div>
  <div class="input-field col s12 l4">
    <input id="descuento_text" type="number" class="validate">
    <label for="descuento_text">Descuento</label>
  </div>
  <div class="input-field col s12 l4">
    <select id="selectServicio">
      <label>Servicio</label>
        <option value="" disabled selected>Seleccione Servicio</option>
        <option value="Eventual">Eventual</option>
        <option value="Semanal">Semanal</option>
        <option value="Especial">Especial</option>
      </select>
  </div>
  <div class="input-field col s12 l6">
    <input id="fecha_inicio" type="text" class="validate datepicker">
    <label for="fecha_inicio">Fecha de Inicio</label>
  </div>
  <div class="input-field col s12 l6">
    <input id="fecha_fin" type="text" class="validate datepicker">
    <label for="fecha_fin">Fecha de Fin</label>
  </div>
  <div class="input-field col s12 m12">
    <input id="descripcion_text" type="text" class="validate" onkeyup="capitalizarLetter(this.value, this)">
    <label for="descripcion_text">Descripcion</label>
  </div>
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
     <i class="small material-icons">cloud_upload</i></br>
     <img class="rectangle" height="200px" width="400px" style="cursor: pointer"  id="foto_front_img"/>
       
    </label>
      <input id="file-input2" type="file" accept="image/*" onchange="PreviewGalery(event)" />
    </div>
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