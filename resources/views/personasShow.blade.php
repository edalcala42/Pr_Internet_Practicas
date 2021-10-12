<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Información de {{ $persona->nombre }}</h1>
    <a href="{{route('personas.index')}}">Listado de personas</a>
    <ul>
        <li>{{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}</li>
        <li>{{ $persona->identificador }}</li>
        <li>{{ $persona->correo }}</li>
        <li>{{ $persona->telefono }}</li>
    </ul>
    <hr>
    Usuario creador: {{ $persona->user->name }}
    <hr>
    <a href="{{route('personas.edit', $persona->id)}}">Editar</a>
    <hr>
    <form action="{{ route('personas.destroy', $persona) }}" method="post">
        @method('DELETE')
        @csrf
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>