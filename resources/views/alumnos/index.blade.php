@extends('crudbooster::admin_template')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" ><h1> <b> Alumnos </b> </h1>
                    <a href="{{route('alumnos.create')}}" class="btn btn-info float-right">Importar Alumnos</a>

                    <a href="{{url('admin/alumnos') }}" class="btn btn-primary float-right">Ver Registros</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table table-bordered table-striped alumnos_table" style="width: 100%;">
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
        $('.alumnos_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('alumnos.index')}}",
            responsive: true,
            columns: [{
                    data: 'cui',
                    name: 'alumnos.cui'
                },
                {
                    data: 'nombres',
                    name: 'nombres'
                },
                {
                    data: 'apellidos',
                    name: 'apellidos',
                    searchable: false
                },
                {
                    data: 'sexo.name',
                    name: 'sexo.name',
                    searchable: false
                },
                {
                    data: 'etnia.name',
                    name: 'etnia.name'
                }
                ,
                {
                    data: 'telefono',
                    name: 'telefono'
                },
                {
                    data: 'area.name',
                    name: 'area.name'
                },
                {
                    data: 'distrito.name',
                    name: 'distrito.name'
                },
                {
                    data: 'profesion.name',
                    name: 'profesion.name'
                },
                {
                    data: 'cargo.name',
                    name: 'cargo.name'
                }


            ]
        })
    })
</script>
@endsection

