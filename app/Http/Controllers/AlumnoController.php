<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AlumnosImport;
use App\Models\Alumno;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class AlumnoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {

            $alumnos = Alumno::with(['etnia','sexo','area','distrito','profesion','cargo'])->select('alumnos.*');

            return DataTables::of($alumnos)
                ->make(true);
        }
        return view('alumnos.index');
    }












       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.import-excel');
    }


     public function regresar(){

        return redirect('/admin/alumnos')->with('success', 'Alumnos Importados exitosamente');
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

        Excel::import(new AlumnosImport, $file);

        return redirect()->route('alumnos.index')->with('success', 'Alumnos Importados exitosamente');



    }
}
