@foreach ($alumnos as $alumno)
<tr>
    <td></td>
    <td style="font-weight: bold">{{$alumno->matricula}}</td>
    <td>{{$alumno->nombre." ".$alumno->apellidoP." ".$alumno->apellidoM}}</td>
    <td>{{$alumno->correo}}</td>
    @foreach ($carreras as $carrera)
    <?php
    if ($carrera->id==$alumno->id_carrera) {
    ?>
    <td>{{$carrera->nombre_carrera}}</td>
    <?php
    }
    ?>
    @endforeach
    <td>{{$alumno->telefono}}</td>
    <td>{{$alumno->fecha_nacimiento}}</td>
    <td>{{$alumno->fecha_ingreso}}</td>

    <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger light-blue darken-1" href="#editalumno" onclick="EditAlumno('{{$alumno->id}}')" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a></td>
    <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger red darken-2" href="#deletealumno" onclick="eliminarAlumno('{{$alumno->id}}')" data-position="bottom" data-tooltip="Eliminar"><i class="material-icons">delete</i></a></td>
    <td>
    <?php
    if ($alumno->status=='1') {
    ?>
        <a class="tooltipped waves-effect waves-light btn-small modal-trigger orange darken-2" href="#bajaalumno" onclick="downOutAlumno('{{$alumno->id}}')"  data-position="bottom" data-tooltip="Dar de baja"><i class="material-icons">remove</i></a>
    <?php
    }else{
    ?>
        <a class="tooltipped waves-effect waves-light btn-small modal-trigger green darken-2" href="#altaalumno" onclick="downOutAlumno('{{$alumno->id}}')"  data-position="bottom" data-tooltip="Dar de alta"><i class="material-icons">add</i></a>
    <?php
    }
    ?>
    </td>
    <td><a class="tooltipped btn waves-effect waves-light red darken-4 btn-small"  onclick="getPDF('{{$alumno->id}}', '{{$alumno->matricula}}')" data-position="left" data-tooltip="Descargar Kardex"><i class="material-icons center">picture_as_pdf</i></a></td>
    <td>
        <?php
        if ($alumno->status=='1') {
        ?>
            <a class="tooltipped btn-floating btn-large waves-effect waves-light green darken-2" data-position="left" data-tooltip="Activo"><i class="material-icons">done</i></a>
        <?php
        }else{
        ?>
            <a class="tooltipped btn-floating btn-large red darken-2" data-position="left" data-tooltip="Dado de baja"><i class="material-icons">remove</i></a>
        <?php
        }
        ?>
    </td>
</tr>
@endforeach


