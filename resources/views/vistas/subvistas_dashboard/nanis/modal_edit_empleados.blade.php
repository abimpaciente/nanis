@foreach ($empleados as $empleado)

    <meta name="csrf-token-edit_empleados" content="{{ csrf_token() }}">

  <div class="input-field col s12 m12 l6">
    <input id="usuario_edit" type="text" class="validate" name="text" value="{{$empleado['username']}}">
    <label for="usuario_edit">Usuario</label>
  </div>
  <div class="input-field col s12 m12 l6">
    <input id="pass_edit" type="password" class="validate" name="text" value="{{$empleado['password']}}" >
    <label for="pass_edit">Pass</label>
  </div>
  <div class="input-field col s6">
    <input id="email_text" type="email" class="validate" name="text" value="{{$empleado['correo']}}">
    <label for="email_text">Correo</label>
    <span class="helper-text" data-error="Error, no es un correo" data-success="Correcto"></span>
  </div>
  <div class="input-field col s12 l4">
    <select id="selectTipo_edit">
      <label>Tipo</label>
        <option value="" disabled selected>Seleccione Tipo</option>
        <?php
         foreach($tipos as $clave => $valor)  { 
            if ($empleado['tipo']==$clave) {
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