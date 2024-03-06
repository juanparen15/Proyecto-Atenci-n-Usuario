<?php

namespace App\Http\Controllers;

use App\TipoProducto;
use Illuminate\Http\Request;
use App\Http\Requests\TipoProducto\StoreRequest;
use App\Http\Requests\TipoProducto\UpdateRequest;
use Illuminate\Support\Str;

class TipoProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            // 'permission:admin.tipoproductos.store',
            // 'permission:admin.tipoproductos.index',
            // 'permission:admin.tipoproductos.create',
            // 'permission:admin.tipoproductos.update',
            // 'permission:admin.tipoproductos.destroy',
            // 'permission:admin.tipoproductos.edit'
        ]);
    }
    public function index()
    {
        $tipoproductos = TipoProducto::get();
        return view('admin.tipoproductos.index', compact('tipoproductos'));
    }


    public function create()
    {
        return view('admin.tipoproductos.create');
    }


    public function store(StoreRequest $request)
    {
        TipoProducto::create([
            'nomProd' => $request->nomProd,
            'slug' => Str::slug($request->nomProd, '-')
        ]);
        return redirect()->route('admin.tipoproductos.index')->with('flash', 'registrado');
    }


    public function show(TipoProducto $tipoproducto)
    {
        return view('admin.tipoproductos.show', compact('tipoproducto'));
    }


    public function edit(TipoProducto $tipoproducto)
    {
        return view('admin.tipoproductos.edit', compact('tipoproducto'));
    }


    public function update(UpdateRequest $request, TipoProducto $tipoproducto)
    {
        $tipoproducto->update([
            'nomProd' => $request->nomProd,
            'slug' => Str::slug($request->nomProd, '-')
        ]);
        return redirect()->route('admin.tipoproductos.index')->with('flash', 'actualizado');
    }


    public function destroy(TipoProducto $tipoproducto)
    {
        $tipoproducto->delete();
        return redirect()->route('admin.tipoproductos.index')->with('flash', 'eliminado');
    }
}
