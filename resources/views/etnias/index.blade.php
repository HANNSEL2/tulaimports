@extends('crudbooster::admin_template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1> <b> Etnias </b> </h1>
                    <a href="{{route('etnias.create')}}" class="btn btn-info float-right">Importar Etnias</a>

                    <a href="{{url('admin/etnias') }}" class="btn btn-primary float-right">Ver Registros</a>


                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table table-bordered table-striped etnias_table" style="width: 100%;">
                        <thead>
                            <tr>


                            </tr>
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
        $('.etnias_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('etnias.index')}}",
            responsive: true,
            columns: [{
                data: 'name',
                    name: 'etnias.name'
                }


            ]
        })
    })
</script>
@endsection

