<div>
    @include('modales.modal-agregar-invitacion')
    @include('modales.modal-agregar-invitado')
    @include('modales.modal-detalle-invitacion')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 p-0"></div>
            <div class="col-lg-4">
            <input type="text" wire:model="buscador" class="form-control" placeholder="Buscar...">
            </div>
            <div class="col-lg-4 float-end">
                <button data-bs-toggle="modal" data-bs-target="#m-agregar-invitacion" class="btn btn-outline-success" type="submit">Generar</button>
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
                <td>
                    @if($invitacion->estado == 'pendiente')
                    Pendiente
                    @elseif($invitacion->estado == 'aceptada')
                    Aceptada
                    @else
                    Rechazada
                    @endif
                </td>
                <td>
                @php
                $invitados = App\Models\Invitacionesadicionals::where('invitacion_id', $invitacion->id)->count();
                @endphp
                {{$invitados}}
                </td>
                <td>
                @php
                $invitados
                @endphp
                </td>
                <td>
                    <div class="btn-toolbar" role="toolbar">
                        @if($invitacion->estado == 'pendiente')
                        <div class="btn-group">
                            <button type="button" wire:click="agregar_invitado({{$invitacion->id}})" data-bs-toggle="modal" data-bs-target="#m-agregar-invitado" class="btn btn-outline-primary">
                                Agregar invitado
                            </button>  
                        </div>
                        @endif
                        @if($invitados > 0)
                        <div class="btn-group" style = "margin-left:10px;">
                            <button type="button" wire:click="detalle_invitacion({{$invitacion->id}})" data-bs-toggle="modal" data-bs-target="#m-detalle" class="btn btn-outline-secondary">
                                Detalle
                            </button>  
                        </div>
                        @endif
                    </div>  
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No hay invitaciones..</td>
            </tr>
            @endforelse
        </tbody>
    </table>   
    {{$invitaciones->links('vendor.livewire.simple-bootstrap')}}
    Pendientes: {{$pendientes}}<br>
    Aceptados: {{$aceptados}}<br>
    Rechazados: {{$rechazados}} <br>
    Total: {{$total}}
</div>
