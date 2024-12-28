<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deuda;

class DeudaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->get('search');

    if ($search) {
        $deudas = Deuda::where('nombre_colegio', 'like', "%$search%")
            ->orWhere('producto_entregado', 'like', "%$search%")
            ->paginate(25);
    } else {
        $deudas = Deuda::paginate(25); // Paginación de 25 registros por página
    }

    return view('dashboard', compact('deudas'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deudas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_colegio' => 'required|string|max:255',
            'cantidad_deuda' => 'required|numeric',
            'producto_entregado' => 'required|string|max:255',
            'fecha_entrega' => 'required|date',
            'email_contacto' => 'required|email|max:255',
        ]);

        Deuda::create($request->all());
        return redirect()->route('deudas.index')->with('success', 'Deuda creada exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deuda $deuda)
    {
        return view('deudas.edit', compact('deuda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deuda $deuda)
    {
        $request->validate([
            'nombre_colegio' => 'required|string|max:255',
            'cantidad_deuda' => 'required|numeric',
            'producto_entregado' => 'required|string|max:255',
            'fecha_entrega' => 'required|date',
            'email_contacto' => 'required|email|max:255',
        ]);

        $deuda->update($request->all());
        return redirect()->route('deudas.index')->with('success', 'Deuda actualizada exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deuda $deuda)
    {
        $deuda->delete();
        return redirect()->route('deudas.index')->with('success', 'Deuda eliminada exitosamente');

    }
}
