<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleController extends Controller
{
    public function index()
    {
        $empleados = DB::select('SELECT e.*, d.denominacion
                                   FROM emple e
                                   JOIN depart d
                                     ON depart_id = d.id');
        return view('emple.index', [
            'empleados' => $empleados,
        ]);
    }

    public function show($id)
    {
        $empleado = DB::select('SELECT e.*, d.denominacion
                                  FROM emple e
                                  JOIN depart d
                                    ON depart_id = d.id
                                 WHERE e.id = ?', [$id]);

        if (empty($empleado)) {
            return redirect('/emple')
                ->with('error', 'El empleado no existe');
        }

        return view('emple.show', [
            'empleado' => $empleado,
        ]);
    }
}
