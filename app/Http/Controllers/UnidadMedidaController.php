<?php

namespace App\Http\Controllers;

use App\UnidadMedida;
use Illuminate\Http\Request;
use App\Http\Requests\UnidadMedida\StoreRequest;
use App\Http\Requests\UnidadMedida\UpdateRequest;
use Illuminate\Support\Str;
class UnidadMedidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            // 'permission:admin.unidadmedidas.store',
            // 'permission:admin.unidadmedidas.index', 
            // 'permission:admin.unidadmedidas.create',
            // 'permission:admin.unidadmedidas.update',
            // 'permission:admin.unidadmedidas.destroy',
            // 'permission:admin.unidadmedidas.edit'
            ]);
    }
    public function index()
    {
        $unidadmedidas = UnidadMedida::get();
        return view ('admin.unidadmedidas.index',compact('unidadmedidas'));
    }

    
    public function create()
    {
        return view ('admin.unidadmedidas.create');
    }

    
    public function store(StoreRequest $request)
    {
        UnidadMedida::create([
            'nomUMed'=> $request->nomUMed,
            'slug'=> Str::slug($request->nomUMed , '-')
        ]);
        return redirect()->route('admin.unidadmedidas.index')->with('flash','registrado');
    }

    
    public function show(UnidadMedida $unidadmedida)
    {
        return view ('admin.unidadmedidas.show',compact('unidadmedida'));
    }

   
    public function edit(UnidadMedida $unidadmedida)
    {
        return view ('admin.unidadmedidas.edit',compact('unidadmedida'));
    }

   
    public function update(UpdateRequest $request, UnidadMedida $unidadmedida)
    {
        $unidadmedida->update([
            'nomUMed'=> $request->nomUMed,
            'slug'=> Str::slug($request->nomUMed , '-')
        ]);
        return redirect()->route('admin.unidadmedidas.index')->with('flash','actualizado');
    }

    
    public function destroy(UnidadMedida $unidadmedida)
    {
        $unidadmedida->delete();
        return redirect()->route('admin.unidadmedidas.index')->with('flash','eliminado');
    }
}
