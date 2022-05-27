<div id="addadministrativo" class="modal">
    <div class="modal-header red darken-3 center-align" style="color:white;">
      <h4>Agregar Administrativo</h4></div>
    <div class="modal-content">
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s4">
              <input id="first_name" type="text" class="validate">
              <label for="first_name">Nombre(s)</label>
            </div>
            <div class="input-field col s4">
              <input id="last_name" type="text" class="validate">
              <label for="last_name">Apellido Parteno</label>
            </div>
            <div class="input-field col s4">
              <input id="other_last_name" type="text" class="validate">
              <label for="other_last_name">Apellido Materno</label>
            </div>
          </div>          
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate">
              <label for="email">Email</label>
              <span class="helper-text" data-error="Error, no es un correo" data-success="Correcto">Helper text</span>
            </div>
          </div>
          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });
// Or with jQuery

$(document).ready(function(){
  $('.modal').modal();
});
$(document).ready(function(){
    $('select').formSelect();
  });
</script>