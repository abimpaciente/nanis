<div id="deletedocente" class="modal">
    <div class="modal-content">
      <h4>Eliminar</h4>
      <p class="flow-text">¿Quieres eliminar este docente?</p>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Eliminar</a>
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
</script>