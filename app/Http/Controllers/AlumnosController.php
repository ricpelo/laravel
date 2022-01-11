<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    public function index()
    {
        $paginador = Alumno::all();

        return view('alumnos.index', [
            'alumnos' => $paginador,
        ]);
    }

    public function create()
    {
        $alumno = new Alumno();

        return view('alumnos.create', [
            'alumno' => $alumno,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        $alumno = new Alumno();
        $alumno->nombre = $validados['nombre'];
        $alumno->save();

        return redirect('/alumnos')
            ->with('success', 'Alumno insertado con éxito.');
    }

    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);

        return view('alumnos.edit', [
            'alumno' => $alumno,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $alumno = Alumno::findOrFail($id);
        $alumno->nombre = $validados['nombre'];
        $alumno->save();

        return redirect('/alumnos')
            ->with('success', 'Alumno modificado con éxito.');
    }

    private function validar()
    {
        $validados = request()->validate([
            'nombre' => 'required|max:255',
        ]);

        return $validados;
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return redirect()->back()
            ->with('success', 'Alumno borrado correctamente');
    }

    public function criterios($id)
    {
        $alumno = Alumno::findOrFail($id);

        $notas = DB::table('notas')
            ->select('ce', DB::raw('MAX(nota) AS nota'))
            ->join('ccee AS c', 'ce_id', '=', 'c.id')
            ->where('alumno_id', $id)
            ->groupBy('ce_id', 'ce')
            ->get();

        return view('alumnos.criterios', [
            'alumno' => $alumno,
            'notas' => $notas,
        ]);
    }
}
