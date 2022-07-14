<div class="input-field col s12 m12 l6">
    <input id="usuario_text" type="text" class="validate" >
    <label for="usuario_text">Usuario</label>
  </div>
  <div class="input-field col s12 m12 l6">
    <input id="pass_text" type="password" class="validate" >
    <label for="pass_text">Pass</label>
  </div>
  <div class="input-field col s6">
    <input id="email_text" type="email" class="validate">
    <label for="email_text">Correo</label>
    <span class="helper-text" data-error="Error, no es un correo" data-success="Correcto"></span>
  </div>
  <div class="input-field col s12 l6">
    <select id="selectTipo">
      <label>Tipo</label>
        <option value="" disabled selected>Seleccione Tipo</option>
        <?php
         foreach($tipo as $clave => $valor)  {             
                ?>
                <option value="{{$clave}}">{{$valor}}</option>
                <?php
         }
        ?>
      </select>
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