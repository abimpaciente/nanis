@foreach ($docentes as $docente)
    <tr>
        <td></td>
        <td>{{$docente->nombre." ".$docente->apellidoP." ".$docente->apellidoM}}</td>
        <td>{{$docente->correo}}</td>
        <td>{{$docente->telefono}}</td>
        <td>{{$docente->fecha_nacimiento}}</td>
        <td>{{$docente->fecha_ingreso}}</td>

        <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger light-blue darken-1" href="#editdocente" onclick="EditDocente('{{$docente->id}}')" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a></td>
        <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger red darken-2" href="#deletedocente" data-position="bottom" data-tooltip="Eliminar"><i class="material-icons">delete</i></a></td>
        <td>
        <?php
        if ($docente->status=='1') {
        ?>
            <a class="tooltipped waves-effect waves-light btn-small modal-trigger orange darken-2" href="#bajadocente" data-position="bottom" data-tooltip="Dar de baja"><i class="material-icons">remove</i></a>
        <?php
        }else{
        ?>
            <a class="tooltipped waves-effect waves-light btn-small modal-trigger green darken-2" href="#bajadocente" data-position="bottom" data-tooltip="Dar de alta"><i class="material-icons">add</i></a>
        <?php
        }
        ?>                            
        </td>
        <td>
            <?php
            if ($docente->status=='1') {
            ?>
                <a class="tooltipped btn-floating btn-large green darken-2" data-position="left" data-tooltip="Activo"><i class="material-icons">done</i></a>
            <?php
            }else{
            ?>
                <a class="tooltipped btn-floating btn-large red darken-2" data-position="left" data-tooltip="Inactivo"><i class="material-icons">remove</i></a>
            <?php
            }
            ?>
        </td>
    </tr>
@endforeach  
