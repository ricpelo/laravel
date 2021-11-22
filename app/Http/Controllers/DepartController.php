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
        $validados = request()->validate([
            'denominacion' => 'required|max:255',
            'localidad' => 'required|max:255',
        ]);

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

    private function findDepartamento($id)
    {
        $departamentos = DB::select('SELECT *
                                   FROM depart
                                  WHERE id = ?', [$id]);

        abort_unless($departamentos, 404);

        return $departamentos[0];
    }
}
