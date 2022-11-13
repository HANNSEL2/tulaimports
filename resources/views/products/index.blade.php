@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Productos
                    <a href="{{route('products.create')}}" class="btn btn-danger float-right">Importar Productos</a>
                    <a href="{{route('products.export')}}" class="btn btn-danger float-right">Exportar Productos 2</a>
                  
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table table-bordered table-striped products_table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad en inventario</th>
                                <th scope="col">Categoria</th>
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
        $('.products_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('products.index')}}",
            responsive: true,
            columns: [{
                    data: 'name',
                    name: 'products.name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'price',
                    name: 'price',
                    searchable: false
                },
                {
                    data: 'quantity_left',
                    name: 'quantity_left',
                    searchable: false
                },
                {
                    data: 'category.name',
                    name: 'category.name'
                }
            ]
        })
    })
</script>
@endsection
