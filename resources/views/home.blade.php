@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Lista de Invitados</h4>
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <form action="">
                <div class="form-row">
                    <div class="col-sm-4 my-1">
                        <input type="text" class="form-control" name="texto">
                    </div>
                    <div class="col-auto my-1">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-header">{{ __('Profesionales') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Profesión</th>
                                <th></th>
                            </tr>
                        </thead>
                        
          

                    <a href="{{ route('profesionales.create')}}"><button>Agregar Profesional</button></a>
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection