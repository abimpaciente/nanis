<div class="col s12">
    <div class="row" style="display: flex;
    justify-content: center;
    align-items: center;">
        <div class="col s6 m6 l6">
            <p class="flow-text" style="font-size: 35px;">Administrativos</p>
            <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Encuentra los administrativos registrados.</small></p>
        </div>
        <div class="col s6 m6 l6 right-align">
            <a class="tooltipped btn-floating btn-large modal-trigger waves-effect waves-light red" data-position="left" data-tooltip="Agregar nuevo administrativo" href="#addadministrativo"><i class="material-icons">add</i></a>
        </div>
    </div>
</div>
<div class="col s12">
    <div class="row" style="background: white; border-radius: 5px; box-shadow: 0px 1px 1px 1px  #c2c2c2; padding:10px;">
        <p class="flow-text">Administrativos registrado</p>
        <div class="col s12">
            <div class="row">
                <div class="input-field col s8 m12 l12">
                    <input id="first_name" type="text" class="validate">
                    <label for="first_name">Busqueda</label>
                </div>
                <div class="col s4">
                    
                </div>                
            </div>
        </div>
        <div class="col s12">
            <div class="row table-responsive">
                <table class="responsive-table striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Carrera</th>
                        <th>Teléfono</th>
                        <th>Fecha Nacimiento</th>
                        <th>Fecha Ingreso</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Status</th>
                    </tr>
                    </thead>
            
                    <tbody>              
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.tooltipped');
    });
    $(document).ready(function(){
        $('.tooltipped').tooltip();
    });
    </script>
@include('modals.add_administrativos')   