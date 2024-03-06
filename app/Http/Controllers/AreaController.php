<?php

namespace App\Http\Controllers;

use App\Area;
use App\Cartera;
use Illuminate\Http\Request;
use App\Http\Requests\Area\StoreRequest;
use App\Http\Requests\Area\UpdateRequest;
use Illuminate\Support\Str;

class AreaController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:admin.areas.index',
            'permission:admin.areas.store',
            'permission:admin.areas.create',
            'permission:admin.areas.update',
            'permission:admin.areas.destroy',
            'permission:admin.areas.edit'
        ]);
    }

    public function index()
    {
        $areas = Area::get();
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        $cartera = Cartera::get();
        return view('admin.areas.create', compact('cartera'));
    }

    public function store(StoreRequest $request)
    {
        Area::create([
            'codA' => $request->codA,
            'nomA' => $request->nomA,
            'slug' => Str::slug($request->nomA, '-'),
            'fK_car' => $request->fK_car
        ]);

        return redirect()->route('admin.areas.index')->with('flash', 'registrado');
    }

    // public function show(Area $area)
    // {
    //     return view ('admin.areas.show',compact('area'));
    // }

    public function edit(Area $area)
    {
        $cartera = Cartera::get();
        return view('admin.areas.edit', compact('area', 'cartera'));
    }

    public function update(UpdateRequest $request, Area $area)
    {
        $area->update([
            'codA' => $request->codA,
            'nomA' => $request->nomA,
            'slug' => Str::slug($request->nomA, '-'),
            'fK_car' => $request->fK_car
        ]);
        return redirect()->route('admin.areas.index')->with('flash', 'actualizado');
    }

    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('admin.areas.index')->with('flash', 'eliminado');
    }
}
