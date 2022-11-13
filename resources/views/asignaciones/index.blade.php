@extends('crudbooster::admin_template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1> <b> Asignaciones </b> </h1>
                    <a href="{{route('asignaciones.create')}}" class="btn btn-info float-right">Importar Asignaciones</a>

                    <a href="{{url('admin/asignaciones') }}" class="btn btn-primary float-right">Ver Registros</a>


                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table table-bordered table-striped asignacion_table" style="width: 100%;">
                        <thead>

                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.asignacion_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('asignaciones.index')}}",
            responsive: true,
            columns: [{
                data: 'curso.name',
                    name: 'curso.name'
                },
                {
                    data: 'alumno.cui',
                    name: 'alumno.cui'
                },
                {
                    data: 'alumno.nombres',
                    name: 'alumno.nombres'
                },
                {
                    data: 'alumno.apellidos',
                    name: 'alumno.apellidos'
                },
                {
                    data: 'mes',
                    name: 'asignaciones.mes'
                },
                {
                    data: 'anio',
                    name: 'asignaciones.anio'
                }


            ]
        })
    })
</script>
@endsection

