<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Programa;
use App\Sector;
use App\SubPrograma;
use Illuminate\Http\Request;

class AjaxController extends Controller
{    
    public function obtener_sectores(Request $request)
    {
        if ($request->ajax()) {
            $sectores = Sector::where('fK_pDes', $request->fK_pDes)->get();
            return response()->json($sectores);
        }
    }
    public function obtener_programas(Request $request)
    {
        if ($request->ajax()) {
            $programas = Programa::where('fK_sector', $request->fK_sector)->get();
            return response()->json($programas);
        }
    }
    public function obtener_subprogramas(Request $request)
    {
        if ($request->ajax()) {
            $subprogramas = SubPrograma::where('fK_programa', $request->fK_programa)->get();
            return response()->json($subprogramas);
        }
    }
    public function obtener_productos(Request $request)
    {
        if ($request->ajax()) {
            $productos = Producto::where('fK_sProg', $request->fK_sProg)->get();
            return response()->json($productos);
        }
    }
}
