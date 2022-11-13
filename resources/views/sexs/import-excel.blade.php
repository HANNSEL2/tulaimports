@extends('crudbooster::admin_template')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Importar Sexo</div>

                <div class="card-body">
                    @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                        {{$error}}
                        @endforeach
                    </div>
                    @endif

                    <form action="{{route('sexs.store')}}" method="POST" enctype="multipart/form-data"required>
                        @csrf

                        <input type="file" name="import_file" required/>

                        <button class="btn btn-primary" type="submit" required>Importar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
