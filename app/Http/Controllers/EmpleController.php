<?php

namespace App\Http\Controllers;

use App\Models\Emple;

class EmpleController extends Controller
{
    public function index()
    {
        return view('emple.index', [
            'empleados' => Emple::all(),
        ]);
    }

    public function show($id)
    {
        return view('emple.show', [
            'empleado' => Emple::findOrFail($id),
        ]);
    }

    public function destroy($id)
    {
        $empleados = Emple::findOrFail($id);

        $empleados->delete();

        return redirect()->back()
            ->with('success', 'Empleado borrado correctamente');
    }

    public function create()
    {
        return view('emple.create', [
            'empleado' => new Emple(),
        ]);
    }

    public function edit($id)
    {
        return view('emple.edit', [
            'empleado' => Emple::findOrFail($id),
        ]);
    }
}
