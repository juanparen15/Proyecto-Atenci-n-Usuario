<?php

namespace App\Http\Controllers;

use App\Cartera;
use Illuminate\Http\Request;
use App\Http\Requests\Cartera\StoreRequest;
use App\Http\Requests\Cartera\UpdateRequest;
use Illuminate\Support\Str;

class CarteraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:admin.cartera.index',
            'permission:admin.cartera.store',
            'permission:admin.cartera.create',
            'permission:admin.cartera.destroy',
            'permission:admin.cartera.update',
            'permission:admin.cartera.edit',
        ]);
    }

    public function index()
    {
        $carteras = Cartera::get();
        return view('admin.cartera.index', compact('carteras'));
    }

    public function create()
    {
        return view('admin.cartera.create');
    }

    public function store(StoreRequest $request)
    {
        Cartera::create([
            'codC' => $request->codC,
            'nomCar' => $request->nomCar,
            'slug' => Str::slug($request->nomCar, '-'),
        ]);
        return redirect()->route('admin.cartera.index')->with('flash', 'registrado');
    }

    public function show(Cartera $cartera)
    {
        return view('admin.cartera.show', compact('cartera'));
    }

    public function edit(Cartera $cartera)
    {
        return view('admin.cartera.edit', compact('cartera'));
    }

    public function update(UpdateRequest $request, Cartera $cartera)
    {
        $cartera->update([
            'codC' => $request->codC,
            'nomCar' => $request->nomCar,
            'slug' => Str::slug($request->nomCar, '-'),
        ]);
        return redirect()->route('admin.cartera.index')->with('flash', 'actualizado');
    }

    public function destroy(Cartera $cartera)
    {
        $cartera->delete();
        return redirect()->route('admin.cartera.index')->with('flash', 'eliminado');
    }
}
