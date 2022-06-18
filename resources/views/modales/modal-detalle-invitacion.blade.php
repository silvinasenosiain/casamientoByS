<div class="modal fade" id="m-detalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de invitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Invitado</td>
                                    <td>Estado</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($invitados as $invitado)
                                <tr>
                                    <td>{{$invitado->personas->apellido.', '.$invitado->personas->nombre}}</td>
                                    <td>
                                        @if($invitado->estado == 'pendiente')
                                        Pendiente
                                        @elseif($invitado->estado == 'aceptada')
                                        Aceptada
                                        @else
                                        Rechazada
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>