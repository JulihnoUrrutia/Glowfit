<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Caracteristica;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoria = Categorias::with('caracteristica')->get();
        
        return view('categorias.index',[
            'categorias' => $categoria
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreCategoriaRequest $request)
   {
    
    try {
        
        DB::beginTransaction();
        $caracteristica = Caracteristica::create($request->validated());
        $caracteristica->categoria()->create([
            'caracteristica_id' => $caracteristica->id
        ]);
        DB::commit();
    } catch (Exception $e) {
        DB::rollBack();
    }
    return redirect()->route('categorias.index')->with('success', 'Categoria registrada exitosamente.');
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
    public function edit(Categorias $categoria)
    {
        
        return view('categorias.edit', [
            'categoria' => $categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categorias $categoria)
    {
        Caracteristica::where('id', $categoria->caracteristica_id)
            ->update($request->validated());
        return redirect()->route('categorias.index')->with('success', 'Categoria actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
