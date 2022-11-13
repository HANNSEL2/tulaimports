<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\CursoImport;
use App\Models\Curso;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class Curso´´Controller extends Controller
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

            $alumnos = Curso::with(['curso'])->select('cursos.*');

            return DataTables::of($alumnos)
                ->make(true);
        }
        return view('cursos.index');
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.import-excel');
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

        Excel::import(new CursoImport, $file);

        return redirect()->route('cursos.index')->with('success', 'Cursos Importadas exitosamente');
    }

}
