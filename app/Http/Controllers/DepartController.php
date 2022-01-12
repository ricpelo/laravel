<?php

namespace App\Http\Controllers;

use App\Models\Depart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartController extends Controller
{
    public function index()
    {
        $ordenes = ['denominacion', 'localidad'];
        $orden = request()->query('orden') ?: 'denominacion';
        abort_unless(in_array($orden, $ordenes), 404);

        $departs = Depart::orderBy($orden);

        if (($denominacion = request()->query('denominacion')) !== null) {
            $departs->where('denominacion', 'ilike', "%$denominacion%");
        }

        if (($localidad = request()->query('localidad')) !== null) {
            $departs->where('localidad', 'ilike', "%$localidad%");
        }

        $paginador = $departs->paginate(2);
        $paginador->appends(compact(
            'denominacion',
            'localidad',
            'orden'
        ));

        return view('depart.index', [
            'departamentos' => $paginador,
        ]);
    }

    public function create()
    {
        $departamento = new Depart();

        return view('depart.create', [
            'departamento' => $departamento,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        $depart = new Depart($validados);
        $depart->save();

        return redirect('/depart')
            ->with('success', 'Departamento insertado con éxito.');
    }

    public function edit($id)
    {
        $departamento = Depart::findOrFail($id);

        return view('depart.edit', [
            'departamento' => $departamento,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $depart = Depart::findOrFail($id);
        $depart->fill($validados);
        $depart->save();

        return redirect('/depart')
            ->with('success', 'Departamento modificado con éxito.');
    }

    public function destroy($id)
    {
        $depart = Depart::findOrFail($id);

        if ($depart->empleados->isNotEmpty()) {
            return redirect('/depart')
                ->with('error', 'El departamento no está vacío');
        }

        $depart->delete();

        return redirect('/depart')
            ->with('success', 'Departamento borrado con éxito.');
    }

    private function validar()
    {
        $validados = request()->validate([
            'denominacion' => 'required|max:255',
            'localidad' => 'required|max:255',
        ]);

        return $validados;
    }
}
