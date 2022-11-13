<?php

namespace App\Http\Controllers;

use App\Models\Distritosalud;
use Illuminate\Http\Request;

use App\Imports\DistritoImport;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class DistritoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {

            $alumnos = Distritosalud::with(['distrito'])->select('distritosaluds.*');

            return DataTables::of($alumnos)
                ->make(true);
        }
        return view('distritos.index');
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distritos.import-excel');
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

        Excel::import(new DistritoImport, $file);

        return redirect()->route('distritos.index')->with('success', 'Distritos Importados exitosamente');
    }


}
