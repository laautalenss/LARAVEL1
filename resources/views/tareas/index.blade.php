@extends('layout')
@section('title', 'Listado de tareas')
@section('contenido')

<div class="container pt-4">


    <!-- $tarea->titulo      = $request->input('titulo');;
            $tarea->descripcion      = $request->input('descripcion');;
            $tarea->asignatura      = $request->input('asignatura');;
            $tarea->fecha_entrega      = $request->input('fecha_entrega');;
            $tarea->profesor_id      = $request->input('profesor_id');; -->


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Asignatura</th>
                <th scope="col">Fecha entrega</th>
                <th scope="col">Profesor id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)

            <tr>
                <th>
                    <a href="/tareas/show/{{ $tarea->id }}" class="btn btn-primary"><i class="bi bi-search"></i></a>

                    @hasanyrole('profesor|admin')
                    <a href="/tareas/edit/{{ $tarea->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                    <a href="/tareas/destroy/{{ $tarea->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    @endhasanyrole

                </th>

                <!-- $tarea->titulo      = $request->input('titulo');;
            $tarea->descripcion      = $request->input('descripcion');;
            $tarea->asignatura      = $request->input('asignatura');;
            $tarea->fecha_entrega      = $request->input('fecha_entrega');;
            $tarea->profesor_id      = $request->input('profesor_id');; -->
                <td>{{ $tarea->titulo }}</td>
                <td>{{ $tarea->descripcion }}</td>
                <td>{{ $tarea->asignatura }}</td>
                <td>{{ $tarea->fecha_entrega }}</td>
                <td>{{ $tarea->profesor_id }}</td>
            </tr>
            @endforeach

            {{ $tareas->links() }}

        </tbody>
    </table>

    @hasanyrole('profesor|admin')
    <a class="btn btn-primary" href="{{ route('tareas.create') }}">Nueva tarea</a>
    @endhasanyrole
</div>

@endsection