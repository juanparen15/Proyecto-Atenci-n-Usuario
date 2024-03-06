<?php

namespace App\Http\Controllers;

use App\Imports\AreaImport;
use App\Imports\SectorImport;
use App\Imports\CarteraImport;
use App\Imports\ProgramaImport;
use App\Imports\ProductoImport;
use App\Imports\PlanDesarrolloImport;
use App\Imports\SubProgramaImport;
use App\PlanDesarrollo;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function areas_import(Request $request){
        $file = $request->file('file');
        Excel::import(new AreaImport, $file);
        return back()->with('message', 'Importación de áreas completada.');
    }
    public function carteras_import(Request $request){
        $file = $request->file('file');
        Excel::import(new CarteraImport, $file);
        return back()->with('message', 'Importación de carteras completada.');
    }
    public function productos_import(Request $request){
        $file = $request->file('file');
        Excel::import(new ProductoImport, $file);
        return back()->with('message', 'Importación de Productos completada.');
    }

    public function sectores_import(Request $request){
        $file = $request->file('file');
        Excel::import(new SectorImport, $file);
        return back()->with('message', 'Importación de familias completada.');
    }
    public function planesdesarrollo_import(Request $request){
        $file = $request->file('file');
        Excel::import(new PlanDesarrolloImport, $file);
        return back()->with('message', 'Importación de segmentos completada.');
    }
    public function programas_import(Request $request){
        $file = $request->file('file');
        Excel::import(new ProgramaImport, $file);
        return back()->with('message', 'Importación de clases completada.');
    }
    public function subprogramas_import(Request $request){
        $file = $request->file('file');
        Excel::import(new SubProgramaImport, $file);
        return back()->with('message', 'Importación de productos completada.');
    }
}
