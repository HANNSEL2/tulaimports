<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AsignacionImport;
use App\Models\Asignacione;

class Asignacion´´Controller extends Controller
{
    //

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

            $alumnos = Asignacione::with(['asignacion','alumno','curso'])->select('asignaciones.*');

            return DataTables::of($alumnos)
                ->make(true);
        }
        return view('asignaciones.index');
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignaciones.import-excel');
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

        Excel::import(new AsignacionImport, $file);

        return redirect()->route('asignaciones.index')->with('success', 'Asignaciones Importadas exitosamente');
    }

}
