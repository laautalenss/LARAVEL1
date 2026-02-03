<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(10);
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create(Request $request)
    {
        $data = ['exito' => ''];

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'name'      => 'required|string|max:255',
                'email'       => 'required|string|max:255'
            ]);

            $usuario = new User();

            $usuario->name      = $request->input('nombre');;
            $usuario->email       = $request->input('email');;
            $usuario->save();

            $data['exito'] = 'Operación realizada correctamente';
        }

        $usuario = new User();


        return view('usuarios.create', ['datos' => $data, 'usuario' => $usuario, 'disabled' => '', 'oper' => 'create']);
    }

    public function show(string $id)
    {

        $datos = ['exito' => ''];
        $usuario = User::find($id);

        return view('usuarios.create', ['usuario' => $usuario, 'datos' => $datos, 'disabled' => 'disabled', 'oper' => 'show']);
    }

    public function edit(Request $request, string $id = '')
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'name'      => 'required|string|max:255',
                'email'       => 'required|string|max:255'
            ]);

            /*
            $datos_save = [];
            
            $datos_save['name']       = $request->input('name');;
            $datos_save['email']        = $request->input('email');;


            User::where('id',$request->input('id'))->update($datos_save);

            */

            $usuario = User::find($request->input('id'));


            $usuario->name      = $request->input('name');;
            $usuario->email       = $request->input('email');;


            $usuario->save();

            $datos['exito'] = 'Operación realiza correctamente';

            $disabled = 'disabled';
        } else {
            $datos = ['exito' => ''];
            $usuario = User::find($id);
            $disabled = '';
        }

        return view('usuarios.create', ['usuario' => $usuario, 'datos' => $datos, 'disabled' => $disabled, 'oper' => 'edit']);
    }

    public function destroy(Request $request, string $id = '')
    {
        if ($request->isMethod('post')) {

            /*
            $datos_save = [];
            
            $datos_save['titulo']       = $request->input('titulo');;
            $datos_save['autor']        = $request->input('autor');;
            $datos_save['anho']         = $request->input('anho');;
            $datos_save['genero']       = $request->input('genero');;
            $datos_save['descripcion']  = $request->input('descripcion');


            Libro::where('id',$request->input('id'))->update($datos_save);

            */

            $usuario = User::find($request->input('id'));


            $usuario->delete();

            return redirect()->route('usuarios.index');
        } else {
            $datos = ['exito' => ''];
            $usuario = User::find($id);
            $disabled = 'disabled';

            return view('usuarios.create', ['usuario' => $usuario, 'datos' => $datos, 'disabled' => $disabled, 'oper' => 'destroy']);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request)
    {
        $usuario = new User();

        $usuario->create(['name' => 'Andrés', 'email' => 'andres_calamaro@gmail.com']);
    }
}
