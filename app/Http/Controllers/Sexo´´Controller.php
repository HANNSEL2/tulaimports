<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\SexoImport;
use App\Models\Sexo;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class Sexo´´Controller extends Controller
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

            $alumnos = Sexo::with(['sex'])->select('sexos.*');

            return DataTables::of($alumnos)
                ->make(true);
        }
        return view('sexs.index');
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sexs.import-excel');
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

        Excel::import(new SexoImport, $file);
        //return redirect('/admin/sexos')->with('success', 'Sexo Importados exitosamente');

        return redirect()->route('sexs.index')->with('success', 'Sexo Importados exitosamente');
    }
}
