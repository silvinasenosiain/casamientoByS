<div>
    @include('modales.modal-agregar-invitacion')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 p-0"></div>
            <div class="col-lg-4">
            <input type="text" wire:model="buscador" class="form-control" placeholder="Buscar...">
            </div>
            <div class="col-lg-4 float-end">
                <button data-bs-toggle="modal" data-bs-target="#m-agregar-invitacion" class="btn btn-outline-success" type="submit">Agregar</button>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Invitados</th>
                <th></th>
            </tr>
        </thead> 
        <tbody>
            @forelse($invitaciones as $invitacion)
            <tr>
                <td>{{$invitacion->apellido}}</td>
                <td>{{$invitacion->nombre}}</td>
                <td>{{$invitacion->estado}}</td>
                <td></td>
                <td></td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No hay invitaciones..</td>
            </tr>
            @endforelse
        </tbody>
    </table>    
</div>
