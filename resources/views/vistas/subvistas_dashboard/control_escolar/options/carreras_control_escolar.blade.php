<div class="col s12">
    <div class="row" style="display: flex;
    justify-content: center;
    align-items: center; margin-top:10px;">
        <div class="col s12">
            <a class="tooltipped waves-effect waves-teal btn-flat" data-position="bottom" data-tooltip="Regresar" onclick="ViewControlEscolar('control_escolar', 'test-swipe-4')"><i class="material-icons" style="font-size: 40px;">keyboard_return</i></a>
        </div>
    </div>
</div>
<div class="col s12">
    <div class="row" style="display: flex;
    justify-content: center;
    align-items: center;">
        <div class="col s6 m6 l6">
            <p class="flow-text" style="font-size: 35px;">Carreras</p>
            <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Encuentra las carreras registrados.</small></p>
        </div>
        <div class="col s6 m6 l6 right-align">
            <a class="tooltipped btn-floating btn-large modal-trigger waves-effect waves-light red" data-position="left" data-tooltip="Agregar nueva carrera" href="#addcarrera" onclick="AddCarrera()"><i class="material-icons">add</i></a>
        </div>
    </div>
</div>
<div class="col s12">
    <div class="row">
      <p class="flow-text">Carreras registradas</p>
        <div class="col s12">
            <div class="row">
                <div class="input-field col s8 m12 l12">
                    @csrf 
                    <input id="busqueda" type="text" class="validate" onkeyup="searchAlumnos('{{ route('alumnos_search') }}')">
                    <label for="busqueda">Busqueda</label>
                </div>
                <div class="col s4 m12 l12">
                    
                </div>                
            </div>
        </div>
        <div class="col s12">
            <div class="row">
                <table class="responsive-table striped" id="table_carreras">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Clave</th>
                        <th>Carrera</th>
                        <th>Descripción</th>
                        <th>Semestres</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
            
                    <tbody id="table_content_carreras">
                        @foreach ($carreras as $carrera)
                        <tr>
                            <td></td>
                            <td style="font-weight: bold">{{$carrera->clave}}</td>
                            <td>{{$carrera->nombre_carrera}}</td>
                            <td>{{$carrera->descripcion}}</td>
                            <td class="center-align">{{$carrera->semestres}}</td>

                            <td><a class="waves-effect waves-light btn-small modal-trigger light-blue darken-1" href="#editcarrera" onclick="UpdateCarrera('{{$carrera->id}}')">Editar</a></td>
                            <td><a class="waves-effect waves-light btn-small modal-trigger red darken-2" href="#deletealumno" onclick="eliminarAlumno('{{$carrera->id}}')">Eliminar</a></td>
                        </tr>
                    @endforeach     
                    </tbody>
                </table>                
                <div class="col-md-12 center text-center">
                    <span class="left" id="total_reg"></span>
                    <ul class="pagination pager" id="table_pager_carreras"></ul>
                </div>
                <script>
                $(document).ready(function(){
                    updateTable('table_carreras', 'table_pager_carreras');
                });
                </script>
            </div>
        </div>
    </div>
</div>
@include('modals.add_carrera_modal')
@include('modals.edit_carrera_modal')  

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.tooltipped');
    });
    $(document).ready(function(){
        $('.tooltipped').tooltip();
    });
</script>
