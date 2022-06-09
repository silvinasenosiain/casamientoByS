<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">¡Hola {{$persona}}!</h5>
            <p class="card-text">Con inmensa alegría te invitamos a celebrar nuestra boda. 
            Te esperamos el 24 de Septiembre, a las 18:00, en LaLola Multiespacio para celebrar nuestro amor junto a vos.</p>
        </div>
        @if(count($invitados) > 0)
        <span class = "text-center text-sm">Personas que fueron invitadas junto a vos</span>
        @endif
        <ul class="list-group list-group-flush">
            @forelse($invitados as $invitado)
            <div class = "row mt-3 mb-3">
                <div class = "col-sm-6">
                    <li class="list-group-item" style = "border:none;">{{$invitado->personas->apellido.', '.$invitado->personas->nombre}}</li>
                </div>
                <div class = "col-sm-6">
                    @if($invitado->estado == 'pendiente')
                    <button type="button" class="btn btn-outline-success" wire:click="invitacion_invitado('{{$invitado->id}}', 'aceptada')">Confirmar</button>
                    <button type="button" class="btn btn-outline-danger" wire:click="invitacion_invitado('{{$invitado->id}}', 'rechazada')">Rechazar</button>
                    @else
                    Invitación {{$invitado->estado}}
                    @endif
                </div>
            </div>
            @empty
            @endforelse
        </ul>
        <div class="card-body">
            @if($estado == 'pendiente')
                <button type="button" class="btn btn-outline-success" wire:click="invitacion('{{$codigo}}', 'aceptada', 'uno')">Confirmar</button>
                @if(count($invitados) > 0)
                <button type="button" class="btn btn-outline-success" wire:click="invitacion('{{$codigo}}', 'aceptada', 'todos')">Confirmar todo</button>
                @endif
                <button type="button" class="btn btn-outline-danger" wire:click="invitacion('{{$codigo}}', 'rechazada', 'uno')">Rechazar</button>
                @if(count($invitados) > 0)
                <button type="button" class="btn btn-outline-danger" wire:click="invitacion('{{$codigo}}', 'rechazada', 'todos')">Rechazar todo</button>
                @endif
            @else
            Invitación {{$estado}}
            @endif
        </div>
    </div>
</div>
