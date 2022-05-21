<!DOCTYPE html>

<html>
<head>
    <title>Kardex</title>
</head>
<style type="text/css">
#foto_front_img
{
    object-fit: cover;
    width:150px;
    height:150px;
    border-radius: 200px;
    margin:10px;
    cursor: pointer;
}
</style>
<body>
    @foreach ($alumnos as $alumno)
    <img src="{{$alumno->foto}}" id="foto_front_img">
    <h1>Nombre: {{$alumno->nombre." ".$alumno->apellidoP." ".$alumno->apellidoM}}</h1>
    <h3>No. Matricula: {{$alumno->matricula}}</h3>
    <h3>Carrera: {{$alumno->nombre_carrera}}</h3>
    <h5>Corre: {{$alumno->correo}}</h5>
    <p>Fecha de Ingreso: {{$alumno->fecha_ingreso}}</p>
    @endforeach
</body>
</html>