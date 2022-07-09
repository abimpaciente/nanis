
@foreach ($servicios as $servicio)
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="input-field col s12">
    <select id="selectEstado_update">
      <label>Estado </label>
        <option value="" disabled selected>Seleccione Estado</option>
        <?php
         $arrayStatus= array("Solicitando", "Aceptado","Cancelado","En camino","Prorroga","Iniciado","Finalizado");
         $arrayStatuslValue = array("solicitando", "aceptado","cancelado","en camino","prorroga","iniciado","finalizado");
         for ($i=0; $i < count($arrayStatus); $i++) { 
            if ($servicio['status']==$arrayStatuslValue[$i]) {
                ?>
                <option value="{{$arrayStatuslValue[$i]}}" selected>{{$arrayStatus[$i]}}</option>
                <?php
            }else{
                ?>
                <option value="{{$arrayStatuslValue[$i]}}">{{$arrayStatus[$i]}}</option>
                <?php
            }
         }
        ?>
      </select>
  </div>
  <div style="display:none" class="input-field col s12 m12 l12">
    <input id="txtFolio" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['folio']}}"onkeyup="capitalizarLetter(this.value, this)">
  </div>
  <div class="input-field col s12 m3 l3">
    <input id="txtNombre" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['name']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtNombre">Nombre</label>
  </div>
  <div class="input-field col s12 m3 l3">
    <input id="txtFecha" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['fecha_servicio']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtFecha">Fecha</label>
  </div>
  <div class="input-field col s12 m3 l3">
    <input id="txtHoraInicio" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['horario_inicial']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtHoraInicio">Horario inicial</label>
  </div>
  <div class="input-field col s12 m3 l3">
    <input id="txtHoraFin" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['horario_final']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtHoraFin">Horario final</label>
  </div>
  <div class="input-field col s12 m2 l2">
    <input id="txtCantidad" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['cantidad_ninos']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtCantidad">Cantidad</label>
  </div>
  <div class="input-field col s12 m4 l4">
    <input id="txtNinios" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['nombre_ninos']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtNinios">Niños</label>
  </div>
  <div class="input-field col s12 m2 l2">
    <input id="txtHermanos" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['son_hermanos']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtHermanos">Hermanos</label>
  </div>
  <div class="input-field col s12 m4 l4">
    <input id="txtExtra" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['nino_extra']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtExtra">Niño Extra</label>
  </div>
  <div class="input-field col s12 m3 l4">
    <input id="txtPersonalidad" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['personalidad_nino']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtPersonalidad">Personalidad Niño</label>
  </div>
  <div class="input-field col s12 m4 l4">
    <input id="txtActividades" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['actividades_preferencia']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtActividades">Actividades</label>
  </div>
  <div class="input-field col s12 m4 l4">
    <input id="txtMascotas" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['mascotas_descrpcion']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtMascotas">Mascotas</label>
  </div>
  <div class="input-field col s12 m6 l6">
    <input id="txtAlergias" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['alergias_descripcion']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtAlergias">Alergias</label>
  </div>
  <div class="input-field col s12 m6 l6">
    <input id="txtMedicamentos" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['toma_medicamento_indicaciones']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtMedicamentos">Indicaciones Medicamentos</label>
  </div>
  <div class="input-field col s12 m5 l5">
    <input id="txtTranstornos" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['tiene_transtorno_explicar']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtTranstornos">Transtornos</label>
  </div>
  <div class="input-field col s12 m5 l5">
    <input id="txtPrioritarias" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['indicaciones_prioritarias']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtPrioritarias">Indicaciones Prioritarias</label>
  </div>
  <div class="input-field col s12 m2 l2">
    <input id="txtSeguro" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['tiene_seguro_medico']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtSeguro">Seguro</label>
  </div>
  <div class="input-field col s12 m4 l4">
    <input id="txtEmergencia" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['a_donde_hablar_en_emergecia']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtEmergencia">En caso de emergencia llamar a</label>
  </div>
  <div class="input-field col s12 m4 l4">
    <input id="txtPersonalidadNanny" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['personalidad_de_la_nanny']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtPersonalidadNanny">Personalidad Nanny</label>
  </div>
  <div class="input-field col s12 m4 l4">
    <input id="txtPromo" disabled type="text" name="text" class="validate" value="{{$servicio['details'][0]['codigo_promo']}}"onkeyup="capitalizarLetter(this.value, this)">
    <label for="txtPromo">Promo</label>
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