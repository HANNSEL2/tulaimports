<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AreaImport;
use App\Models\Areasalud;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class AreaController extends Controller
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

            $alumnos = Areasalud::with(['area'])->select('areasaluds.*');

            return DataTables::of($alumnos)
                ->make(true);
        }
        return view('areas.index');
    }












       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.import-excel');
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

        Excel::import(new AreaImport, $file);

        return redirect()->route('areas.index')->with('success', 'Areas Importados exitosamente');
    }
}
