<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleController extends Controller
{
    public function index()
    {
        // $empleados = DB::select('SELECT e.*, d.denominacion
        //                            FROM emple e
        //                            JOIN depart d
        //                              ON depart_id = d.id');

        $empleados = DB::table('emple', 'e')
            ->leftJoin('depart AS d', 'depart_id', '=', 'd.id')
            ->select('e.*', 'denominacion')
            ->get();

        return view('emple.index', [
            'empleados' => $empleados,
        ]);
    }

    public function show($id)
    {
        $empleado = $this->findEmpleado($id);

        // if (empty($empleado)) {
        //     return redirect('/emple')
        //         ->with('error', 'El empleado no existe');
        // }

        return view('emple.show', [
            'empleado' => $empleado,
        ]);
    }

    public function destroy($id)
    {
        $empleados = $this->findEmpleado($id);

        DB::delete('DELETE FROM emple WHERE id = ?', [$id]);

        return redirect()->back()
            ->with('success', 'Empleado borrado correctamente');
    }

    public function create()
    {
        $empleado = (object) [
            'nombre' => null,
            'fecha_alt' => null,
            'salario' => null,
            'depart_id' => null,
        ];

        return view('emple.create', [
            'empleado' => $empleado,
        ]);
    }

    public function edit($id)
    {
        $empleado = $this->findEmpleado($id);

        return view('emple.edit', [
            'empleado' => $empleado,
        ]);
    }

    private function findEmpleado($id)
    {
        $empleados = DB::select('SELECT e.*, d.denominacion
                                   FROM emple e
                                   JOIN depart d
                                     ON depart_id = d.id
                                  WHERE e.id = ?', [$id]);

        abort_unless($empleados, 404);

        return $empleados[0];
    }
}
