<?php

namespace App\Http\Controllers;

use App\Programa;
use App\SubPrograma;
use Illuminate\Http\Request;
use App\Http\Requests\SubPrograma\StoreRequest;
use App\Http\Requests\SubPrograma\UpdateRequest;
use Illuminate\Support\Str;

class SubProgramaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:admin.subprogramas.store',
            'permission:admin.subprogramas.index',
            'permission:admin.subprogramas.create',
            'permission:admin.subprogramas.update',
            'permission:admin.subprogramas.destroy',
            'permission:admin.subprogramas.edit'
        ]);
    }

    
    public function index()
    {
        $subprograma = SubPrograma::get();
        return view('admin.subprogramas.index', compact('subprograma'));
    }

    public function create()
    {
        $programas = Programa::all();
        return view('admin.subprogramas.create', compact('programas'));
    }

    public function store(StoreRequest $request)
    {
        SubPrograma::create([
            'codSP' => $request->codSP,
            'nomSP' => $request->nomSP,
            'slug' => Str::slug($request->codSP, '-'),
            'fK_programa' => $request->fK_programa
        ]);
        return redirect()->route('admin.subprogramas.index')->with('flash', 'registrado');
    }
    //     actualizado
    // 
    // 
    public function show(SubPrograma $subprograma)
    {
        return view('admin.subprogramas.show', compact('subprograma'));
    }

    public function edit(SubPrograma $subprograma)
    {
        $programa = Programa::get();
        return view('admin.subprogramas.edit', compact('subprograma', 'programa'));
    }

    public function update(UpdateRequest $request, SubPrograma $subprograma)
    {
        $subprograma->update([
            'codSP' => $request->codSP,
            'nomSP' => $request->nomSP,
            'slug' => Str::slug($request->codSP, '-'),
            'fK_programa' => $request->fK_programa
        ]);
        return redirect()->route('admin.subprogramas.index')->with('flash', 'actualizado');
    }

    // public function destroy($slug)
    // {
    //     $subprograma = SubPrograma::where('slug', $slug)->first();
    //     $subprograma->delete();
    //     return redirect()->route('admin.subprogramas.index')->with('flash', 'eliminado');
    // }
    public function destroy(SubPrograma $subprograma)
    {
        $subprograma->delete();
        return redirect()->route('admin.subprogramas.index')->with('flash', 'eliminado');
    }
}
