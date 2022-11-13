<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\ProfesionImport;
use App\Models\Profesiones;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class Profesiones´´Controller extends Controller
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

            $alumnos = Profesiones::with(['profesion'])->select('profesiones.*');

            return DataTables::of($alumnos)
                ->make(true);
        }
        return view('profesiones.index');
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesiones.import-excel');
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

        Excel::import(new ProfesionImport, $file);

        return redirect()->route('profesiones.index')->with('success', 'Profesiones Importadas exitosamente');
    }

}
