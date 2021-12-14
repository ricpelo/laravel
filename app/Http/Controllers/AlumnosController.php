<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    public function index()
    {
        $alumnos = DB::table('v_alumnos')
            ->select('id', 'nombre', DB::raw('ROUND(AVG(nota), 1) AS nota'))
            ->groupBy('id', 'nombre');

        $paginador = $alumnos->paginate(50);

        return view('alumnos.index', [
            'alumnos' => $paginador,
        ]);
    }

    public function create()
    {
        $alumno = (object) [
            'nombre' => null,
        ];

        return view('alumnos.create', [
            'alumno' => $alumno,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        DB::table('alumnos')->insert([
            'nombre' => $validados['nombre'],
        ]);

        return redirect('/alumnos')
            ->with('success', 'Alumno insertado con éxito.');
    }

    public function edit($id)
    {
        $alumno = $this->findAlumno($id);

        return view('alumnos.edit', [
            'alumno' => $alumno,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $this->findAlumno($id);

        DB::table('alumnos')
            ->where('id', $id)
            ->update([
            'nombre' => $validados['nombre'],
        ]);

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
        $this->findAlumno($id);

        DB::delete('DELETE FROM alumnos WHERE id = ?', [$id]);

        return redirect()->back()
            ->with('success', 'Alumno borrado correctamente');
    }

    public function criterios($id)
    {
        $alumno = $this->findAlumno($id);

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

    private function findAlumno($id)
    {
        $alumnos = DB::table('alumnos')
            ->where('id', $id)
            ->get();

        abort_if($alumnos->isEmpty(), 404);

        return $alumnos->first();
    }
}
