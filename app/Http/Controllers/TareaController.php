<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Container\Attributes\Tag;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::paginate(10);
        return view('tareas.index', ['tareas' => $tareas]);
    }

    public function create(Request $request)
    {
        $data = ['exito' => ''];

        if ($request->isMethod('post')) {

            // 'titulo',
            // 'descripcion',
            // 'asignatura',
            // 'fecha_entrega',
            // 'profesor_id'

            $validated = $request->validate([
                'titulo'      => 'required|string|max:255',
                'descripcion'       => 'required|string|max:1255',
                'asignatura'      => 'required|string|max:255',
                'fecha_entrega'      => 'required|date',
                'profesor_id'       => 'required|string'
            ]);

            $tarea = new Tarea();

            $tarea->titulo      = $request->input('titulo');;
            $tarea->descripcion      = $request->input('descripcion');;
            $tarea->asignatura      = $request->input('asignatura');;
            $tarea->fecha_entrega      = $request->input('fecha_entrega');;
            $tarea->profesor_id      = $request->input('profesor_id');;
            $tarea->save();

            $data['exito'] = 'Operación realizada correctamente';
        }

        $tarea = new Tarea();


        return view('tareas.create', ['datos' => $data, 'tarea' => $tarea, 'disabled' => '', 'oper' => 'create']);
    }

    public function show(string $id)
    {

        $datos = ['exito' => ''];
        $tarea = Tarea::find($id);

        return view('tareas.create', ['tarea' => $tarea, 'datos' => $datos, 'disabled' => 'disabled', 'oper' => 'show']);
    }

    public function edit(Request $request, string $id = '')
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'titulo'      => 'required|string|max:255',
                'descripcion'       => 'required|string|max:1255',
                'asignatura'      => 'required|string|max:255',
                'fecha_entrega'      => 'required|date',
                'profesor_id'       => 'required|string'
            ]);

            /*
            $datos_save = [];
            
            $datos_save['name']       = $request->input('name');;
            $datos_save['email']        = $request->input('email');;


            User::where('id',$request->input('id'))->update($datos_save);

            */

            $tarea = Tarea::find($request->input('id'));


            $tarea->titulo      = $request->input('titulo');;
            $tarea->descripcion      = $request->input('descripcion');;
            $tarea->asignatura      = $request->input('asignatura');;
            $tarea->fecha_entrega      = $request->input('fecha_entrega');;
            $tarea->profesor_id      = $request->input('profesor_id');;


            $tarea->save();

            $datos['exito'] = 'Operación realiza correctamente';

            $disabled = 'disabled';
        } else {
            $datos = ['exito' => ''];
            $tarea = Tarea::find($id);
            $disabled = '';
        }

        return view('tareas.create', ['tarea' => $tarea, 'datos' => $datos, 'disabled' => $disabled, 'oper' => 'edit']);
    }

    public function destroy(Request $request, string $id = '')
    {
        if ($request->isMethod('post')) {


            $tarea = Tarea::find($request->input('id'));


            $tarea->delete();

            return redirect()->route('tareas.index');
        } else {
            $datos = ['exito' => ''];
            $tarea = Tarea::find($id);
            $disabled = 'disabled';

            return view('tareas.create', ['tarea' => $tarea, 'datos' => $datos, 'disabled' => $disabled, 'oper' => 'destroy']);
        }
    }

    // function store(Request $request)
    // {
    //     $tarea = new Tarea();

    //     $tarea->create(['name' => 'Andrés', 'email' => 'andres_calamaro@gmail.com']);
    // }


}
