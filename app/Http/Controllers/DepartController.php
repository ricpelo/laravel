<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartController extends Controller
{
    public function index()
    {
        $ordenes = ['denominacion', 'localidad'];
        $orden = request()->query('orden', 'denominacion');
        abort_unless(in_array($orden, $ordenes), 404);

        $departs = DB::table('depart')
            ->orderBy($orden)
            ->get();

        return view('depart.index', [
            'departamentos' => $departs,
        ]);
    }

    public function create()
    {
        return view('depart.create');
    }

    public function store()
    {
        $validados = $this->validar();

        DB::table('depart')->insert([
            'denominacion' => $validados['denominacion'],
            'localidad' => $validados['localidad'],
        ]);

        return redirect('/depart')
            ->with('success', 'Departamento insertado con éxito.');
    }

    public function edit($id)
    {
        $departamento = $this->findDepartamento($id);

        return view('depart.edit', [
            'departamento' => $departamento,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $this->findDepartamento($id);

        DB::table('depart')
            ->where('id', $id)
            ->update([
            'denominacion' => $validados['denominacion'],
            'localidad' => $validados['localidad'],
        ]);

        return redirect('/depart')
            ->with('success', 'Departamento modificado con éxito.');
    }

    private function validar()
    {
        $validados = request()->validate([
            'denominacion' => 'required|max:255',
            'localidad' => 'required|max:255',
        ]);

        return $validados;
    }

    private function findDepartamento($id)
    {
        $departamentos = DB::table('depart')
            ->where('id', $id)
            ->get();

        abort_if($departamentos->isEmpty(), 404);

        return $departamentos->first();
    }
}
