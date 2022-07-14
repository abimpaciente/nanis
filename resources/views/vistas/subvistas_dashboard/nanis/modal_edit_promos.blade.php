@foreach ($promos as $promo)
<div class="col s12 center-align">
    <input id="foto_front" type="file" accept="image/*" style="display: none;" />
    <div class="image-upload_update">
      <label for="file-input2_update">
        
        <style type="text/css">
          .image-upload_update>input 
          {
            display: none;
          }
          #foto_front_img_update
          {
            object-fit: cover;
            width:200px;
            height:200px;
            border-radius: 200px;
            margin-bottom:20px;
            cursor: pointer;
          }
          </style>
          <?php 
          if ($promo['image']!='') {
            ?>
            <img class="circle" src="{{$promo['image']}}?q=<?php echo microtime(); ?>" width="200px" style="cursor: pointer"  id="foto_front_img_update"/>
            <?php
          }else{
            ?>
            <img class="circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeeUl9IZDN97pBQNgeunx6dD1df-4g7vkPFw&usqp=CAU" width="200px" style="cursor: pointer"  id="foto_front_img_update"/>
            <?php
          }
          ?>
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
    <meta name="csrf-token-edit_promos" content="{{ csrf_token() }}">

    
  <div class="input-field col s12 m12 l4">
    <input id="codigo_edit_text" type="text" class="validate" disabled name="text" onkeyup="this.value = this.value.toUpperCase()" value="{{$promo['promo_code']}}">
    <label for="codigo_edit_text">Codigo</label>
  </div>
  <div class="input-field col s12 l4">
    <input id="descuento_edit_text" type="number" name="text" value="{{$promo['discount']}}" class="validate">
    <label for="descuento_edit_text">Descuento</label>
  </div>
  <div class="input-field col s12 l4">
    <select id="selectServicio_edit">
      <label>Servicio</label>
        <option value="" disabled selected>Seleccione Servicio</option>
        <?php
         foreach($servicios as $clave => $valor)  { 
            if ($promo['servicio']==$clave) {
                ?>
                <option value="{{$clave}}" selected>{{$valor}}</option>
                <?php
            }else{
                ?>
                <option value="{{$clave}}">{{$valor}}</option>
                <?php
            }
         }
        ?>
      </select>
  </div>
  <div class="input-field col s12 l6">
    <input id="fecha_inicio_edit_text" type="text" name="text" value="{{$promo['fecha_inicio']}}" class="validate datepicker">
    <label for="fecha_inicio_edit_text">Fecha de Inicio</label>
  </div>
  <div class="input-field col s12 l6">
    <input id="fecha_fin_edit_text" type="text" name="text" value="{{$promo['fecha_fin']}}" class="validate datepicker">
    <label for="fecha_fin_edit_text">Fecha de Fin</label>
  </div>
  <div class="input-field col s12 m12">
    <input id="descripcion_edit_text" type="text" name="text" value="{{$promo['descripcion']}}" class="validate" onkeyup="capitalizarLetter(this.value, this)">
    <label for="descripcion_edit_text">Descripcion</label>
  </div>
  @endforeach  

  <script>
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems, options);
});
$(document).ready(function(){

  $("input[name='text']")
      .each(function () {
        $("label[for='"+this.id+"']").addClass('active');
  });
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