<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;



class AlumnoController extends Controller
{
    public function createAlumno(Request $request)
    {
        $request->validate([
            "nombres" =>"required|unique:alumnos",
            "telefono" => "required|max:20",
            "fecha_nacimiento" => "required|date",
            "email" => "required|email",
            "nivel_id" => "required"
        ]);

        $user_id = auth()->user()->id;//Toquen de usuario logueado

        $alumno = new Alumno();
        $alumno->nombres = $request->nombres;
        $alumno->telefono = $request->telefono;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->email = $request->email;
        $alumno->nivel_id = $request->nivel_id;

        $alumno->save();

        return response()->json([
            "status" => 1,
            "mensaje" =>"Alumno creado exitosamente."
        ],200);
    }

    public function listAlumno()
    {
        $alumnos = Alumno::with('nivel')->get();
        
        return response()->json([
            "status" => 1,
            "mensaje" =>"Listado de Alummnos.",
            "data" => $alumnos
        ],200);
    }

    public function showAlumno($id)
    {
        //$user_id = auth()->user()->id;
        if(Alumno::where(["id" => $id])->exists())
        {
            $alumno = Alumno::with('nivel')->find($id);
            return response()->json([
                "status" => 1,
                "data" => $alumno
            ],200);
        }
        else
        {
            return response()->json([
                "status" => 0,
                "mensaje" =>"No se encontro Alumno."
            ],404);
        }
        
    }

    public function updateAlumno(Request $request, $id)
    {
        $user_id = auth()->user()->id;//Toquen de usuario logueado
        if(Alumno::where(["id" => $id])->exists())
        {
            $alumno =  Alumno::find($id);
            $alumno->nombres = isset($request->nombres) ? $request->nombres: $alumno->nombres;
            $alumno->telefono = isset($request->telefono) ? $request->telefono: $alumno->telefono;
            $alumno->fecha_nacimiento = isset($request->fecha_nacimiento) ? $request->fecha_nacimiento: $alumno->fecha_nacimiento;
            $alumno->email = isset($request->email) ? $request->email: $alumno->email;
            $alumno->nivel_id = isset($request->nivel_id) ? $request->nivel_id: $alumno->nivel_id;
            $alumno->save();

            return response()->json([
                "status" => 1,
                "mensaje" =>"Alummno modificado con exito.",
                "data" => $alumno
            ],200);
        }
        else
        {
            return response()->json([
                "status" => 0,
                "mensaje" =>"No se encontro Alumno."
            ],404);
        }
    }

    public function deleteAlumno($id)
    {
        if(Alumno::where(["id" => $id])->exists())
        {
            $alumno = Alumno::where(["id" => $id])->first();
            //$alumno->delete();

            return response()->json([
                "status" => 1,
                "mensaje" =>"Alumno ha sido eliminado.",
                "data" => $alumno
            ],200);
        }
        else
        {
            return response()->json([
                "status" => 0,
                "mensaje" =>"No se encontro Alumno."
            ],404);
        }
    }
}
