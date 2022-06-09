@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="container">
                <div class="row height d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                        <livewire:invitados.invitacion :codigo="$codigo"/>    
                    </div>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection