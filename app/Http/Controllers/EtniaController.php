<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\EtniaImport;
use App\Models\Etnia;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class EtniaController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {

            $alumnos = Etnia::with(['etnia'])->select('etnias.*');

            return DataTables::of($alumnos)
                ->make(true);
        }
        return view('etnias.index');
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etnias.import-excel');
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

        Excel::import(new EtniaImport, $file);

        return redirect()->route('etnias.index')->with('success', 'Etnias Importadas exitosamente');
    }

}
