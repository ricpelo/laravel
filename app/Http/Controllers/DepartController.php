<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartController extends Controller
{
    public function index()
    {
        $departs = DB::select('select * from depart');
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

        DB::insert('INSERT
                      INTO depart (denominacion, localidad)
                    VALUES (?, ?)', [
            $validados['denominacion'],
            $validados['localidad'],
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

        DB::update('UPDATE depart
                       SET denominacion = ?
                         , localidad = ?
                     WHERE id = ?', [
            $validados['denominacion'],
            $validados['localidad'],
            $id,
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
        $departamentos = DB::select('SELECT *
                                   FROM depart
                                  WHERE id = ?', [$id]);

        abort_unless($departamentos, 404);

        return $departamentos[0];
    }
}
