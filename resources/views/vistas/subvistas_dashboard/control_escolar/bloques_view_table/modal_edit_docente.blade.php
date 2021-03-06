@foreach ($docentes as $docente)

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
          if ($docente->foto!='') {
            ?>
            <img class="circle" src="{{$docente->foto}}?q=<?php echo microtime(); ?>" width="200px" style="cursor: pointer"  id="foto_front_img_update"/>
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
    <meta name="csrf-token-edit_docentes" content="{{ csrf_token() }}">

  <div class="input-field col s12 m12 l4">
    <input id="first_name_text_update" type="text" name="text" class="validate" onkeyup="capitalizarLetter(this.value, this)" value="{{$docente->nombre}}">
    <label for="first_name_text_update">Nombre(s)</label>
  </div>
  <div class="input-field col s12 m12 l4">
    <input id="last_name_text_update" type="text" name="text" class="validate" onkeyup="capitalizarLetter(this.value, this)" value="{{$docente->apellidoP}}">
    <label for="last_name_text_update">Apellido Parteno</label>
  </div>
  <div class="input-field col s12 m12 l4">
    <input id="other_last_name_text_update" type="text" name="text" class="validate" onkeyup="capitalizarLetter(this.value, this)" value="{{$docente->apellidoM}}">
    <label for="other_last_name_text_update">Apellido Materno</label>
  </div>
  <div class="input-field col s12">
    <select id="selectGenero_update">
      <label>G??nero</label>
        <option value="" disabled selected>Seleccione G??nero</option>
        <?php
         $arrayGeneroName = array('Hombre', 'Mujer');
         $arrayGeneroValue = array('H', 'M');
         for ($i=0; $i < count($arrayGeneroName); $i++) { 
            if ($docente->genero==$arrayGeneroValue[$i]) {
                ?>
                <option value="{{$arrayGeneroValue[$i]}}" selected>{{$arrayGeneroName[$i]}}</option>
                <?php
            }else{
                ?>
                <option value="{{$arrayGeneroValue[$i]}}">{{$arrayGeneroName[$i]}}</option>
                <?php
            }
         }
        ?>
      </select>
  </div>
  <div class="input-field col s12">
    <select id="selectEstadoCivil_update">
      <label>Estado Civil</label>
        <option value="" disabled selected>Seleccione Estado Civil</option>
        <?php
         $arrayEdoCivilName = array('Casado', 'Soltero', 'Divorciado');
         $arrayEdoCivilValue = array('C', 'S', 'D');
         for ($i=0; $i < count($arrayEdoCivilName); $i++) { 
            if ($docente->estado_civil==$arrayEdoCivilValue[$i]) {
                ?>
                <option value="{{$arrayEdoCivilValue[$i]}}" selected>{{$arrayEdoCivilName[$i]}}</option>
                <?php
            }else{
                ?>
                <option value="{{$arrayEdoCivilValue[$i]}}">{{$arrayEdoCivilName[$i]}}</option>
                <?php
            }
         }
        ?>
      </select>
  </div>
  <div class="input-field col s12">
    <input id="email_text_update" type="email" class="validate" name="text"  value="{{$docente->correo}}">
    <label for="email_text_update">Email</label>
    <span class="helper-text" data-error="Error, no es un correo" data-success="Correcto"></span>
  </div>
  <div class="input-field col s12">
    <input id="password_update" type="text" class="validate" name="text"  value="{{$docente->password}}">
    <label for="password_update">Contrase??a</label>
  </div>
  <div class="input-field col s12">
    <input id="phone_update" type="text" class="validate" name="text"  value="{{$docente->telefono}}">
    <label for="phone_update">Tel??fono</label>
  </div>
  <div class="input-field col s12">
    <input id="clave_profesional_update" type="text" class="validate" name="text"  value="{{$docente->clave_profesional}}">
    <label for="clave_profesional_update">Clave Profesional</label>
  </div>
  <div class="input-field col s12">
    <input id="cedula_fiscal_update" type="text" class="validate" name="text"  value="{{$docente->cedula_fiscal}}">
    <label for="cedula_fiscal_update">C??dula Fiscal</label>
  </div>
  <div class="input-field col s12">
    <input id="nss_update" type="text" class="validate" name="text"  value="{{$docente->nss}}">
    <label for="nss_update">NSS</label>
  </div>
  <div class="input-field col s12">
    <input id="fecha_ingreso_update" type="text" class="validate datepicker" name="text"  value="{{$docente->fecha_ingreso}}">
    <label for="fecha_ingreso_update">Fecha de Ingreso</label>
  </div>
  <div class="input-field col s12">
    <input id="fecha_nacimiento_update" type="text" class="validate datepicker" name="text"  value="{{$docente->fecha_nacimiento}}">
    <label for="fecha_nacimiento_update">Fecha de Nacimiento</label>
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