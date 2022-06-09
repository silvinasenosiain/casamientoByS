@extends('layouts.app')

@section('content')
<style>
.input-box{
  position: relative;
}

.input-box i {
  position: absolute;
  right: 13px;
  top:12px;
  color:#ced4da;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="container">
                <div class="row height d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                        <livewire:invitados.buscar-invitacion />
                    </div>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection