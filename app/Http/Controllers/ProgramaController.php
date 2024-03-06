<?php

namespace App\Http\Controllers;

use App\Http\Requests\Programa\StoreRequest;
use App\Http\Requests\Programa\UpdateRequest;
use App\Programa;
use App\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:admin.programas.store',
            'permission:admin.programas.index',
            'permission:admin.programas.create',
            'permission:admin.programas.update',
            'permission:admin.programas.destroy',
            'permission:admin.programas.edit',
        ]);
    }
    public function index()
    {
        // $programas = Programa::orderBy('id', 'DESC')->paginate(10);
        $programa = Programa::get();
        return view('admin.programas.index', compact('programa'));
    }


    public function create()
    {
        // $sectores = Programa::all();
        $sectores = Sector::all();
        return view('admin.programas.create', compact('sectores'));
    }


    public function store(StoreRequest $request)
    {
        Programa::create([
            'codProg' => $request->codProg,
            'nomProg' => $request->nomProg,
            'slug' => Str::slug($request->codProg, '-'),
            'fK_sector' => $request->fK_sector
        ]);
        return redirect()->route('admin.programas.index')->with('flash', 'registrado');
    }

    public function show(Programa $programa)
    {
        return view('admin.programas.show', compact('programa'));
    }


    public function edit(Programa $programa)
    {
        // $sector = Sector::find($id);
        $sector = Sector::get();
        return view('admin.programas.edit', compact('programa', 'sector'));
    }


    public function update(UpdateRequest $request, Programa $programa)
    {
        $programa->update([
            'codProg' => $request->codProg,
            'nomProg' => $request->nomProg,
            'slug' => Str::slug($request->codProg, '-'),
            'fK_sector' => $request->fK_sector
        ]);
        return redirect()->route('admin.programas.index')->with('flash', 'actualizado');
    }

    public function destroy(Programa $programa)
    {
        $programa->delete();
        return redirect()->route('admin.programas.index')->with('flash', 'eliminado');
    }
}
