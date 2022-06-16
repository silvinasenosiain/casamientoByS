@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card mt-3">
                <div class="card-header">{{ __('Listado de invitados') }}</div>
                <div class="card-body">
                    @livewire('home')
                </div>         
            </div>
        </div>
    </div>
</div>
@endsection