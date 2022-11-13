<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\CargosImport;
use App\Models\Cargos;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class Cargos´´Controller extends Controller
{
    //
  //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {

            $alumnos = Cargos::with(['cargo'])->select('cargos.*');

            return DataTables::of($alumnos)
                ->make(true);
        }
        return view('cargos.index');
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargos.import-excel');
    }


       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('import_file');

        Excel::import(new CargosImport, $file);

        return redirect()->route('cargos.index')->with('success', 'Cargos Importadas exitosamente');
    }

}
