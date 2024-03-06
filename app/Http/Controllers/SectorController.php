<?php

namespace App\Http\Controllers;

use App\Sector;
use App\PlanDesarrollo;
use Illuminate\Http\Request;
use App\Http\Requests\Sector\StoreRequest;
use App\Http\Requests\Sector\UpdateRequest;
use Illuminate\Support\Str;

class SectorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:admin.sectores.index',
            'permission:admin.sectores.store',
            'permission:admin.sectores.create',
            'permission:admin.sectores.update',
            'permission:admin.sectores.destroy',
            'permission:admin.sectores.edit',
        ]);
    }
    public function index()
    {
        $sectores = Sector::get();
        return view('admin.sectores.index', compact('sectores'));
    }

    public function create()
    {
        $plandesarrollo = PlanDesarrollo::get();
        return view('admin.sectores.create', compact('plandesarrollo'));
    }

    public function store(StoreRequest $request)
    {
        Sector::create([
            'codS' => $request->codS,
            'nomS' => $request->nomS,
            'slug' => Str::slug($request->codS, '-'),
            'fK_pDes' => $request->fK_pDes
        ]);
        return redirect()->route('admin.sectores.index')->with('flash', 'registrado');
    }


    // public function show(Sector $sector)
    // {
    //     return view('admin.sectores.show', compact('sector'));
    // }

    public function edit(Sector $sector, $id)
    {
        // dd($sectores);
        $sector = Sector::findOrFail($id);
        $plandesarrollo = PlanDesarrollo::get();
        return view('admin.sectores.edit', compact('sector', 'plandesarrollo'));
    }


    public function update(UpdateRequest $request, Sector $sector)
    {
        $sector->update([
            'codS' => $request->codS,
            'nomS' => $request->nomS,
            'slug' => Str::slug($request->codS, '-'),
            'fK_pDes' => $request->fK_pDes,
        ]);
        return redirect()->route('admin.sectores.index')->with('flash', 'actualizado');
    }

    public function destroy(Sector $sector)
    {
        $sector->delete();
        return redirect()->route('admin.sectores.index')->with('flash', 'eliminado');
    }
    
}
