<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Persona;
use App\Http\Requests\CreatePersonaRequest;
class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::orderBy('nPerCodigo','asc')->paginate(3);
        return view('personas',compact('personas'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create',[
            'persona'=>new Persona
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePersonaRequest $request)
    {
        $persona = new Persona($request->validated());
        $persona->image = $request->file('image')->store('images');
        $persona->save();

        return redirect()->route('personas');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $nPerCodigo)
    {
        $persona = Persona::where('nPerCodigo', $nPerCodigo)->first();
        return view('show', [
            'persona' => $persona
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $nPerCodigo)
    {
        return view('editar',[
            'persona'=>$nPerCodigo
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Persona $nPerCodigo, CreatePersonaRequest $request)

    {
        if($request->hasFile('image')){
            Storage::delete($nPerCodigo->image);
            $nPerCodigo->fill($request->validated());
            $nPerCodigo->image = $request->file('image')->store('images');
            $nPerCodigo->save();
            }else{
                $nPerCodigo->update(array_filter($request->validated()));
        }

        return redirect()->route('personas.show',$nPerCodigo);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $nPerCodigo)
    {
        Storage::delete($nPerCodigo->image);
        $nPerCodigo->delete();

        return redirect()->route('personas');//
    }
}
