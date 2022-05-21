<!-- Modal Structure -->
<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Cerrar Sesión</h4>
      <p>Estas a punto de cerrar sesión, ¿estas seguro?</p>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-green btn-flat">No</a>
        <a href="{{route('login.logout')}}"  class="modal-close waves-effect waves-green btn-flat">Si</a>
    </div>
  </div>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.modal').modal();
  });
  </script>