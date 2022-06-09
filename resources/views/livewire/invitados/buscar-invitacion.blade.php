<div>
    <div class="input-box">
        <input type="hidden" wire:model="codigo_actividad_economica">
        <input type="text" class="form-control" 
        wire:model.debounce.500ms="buscar" 
        wire:keydown="buscarInvitacion"
        placeholder = "Buscar invitacion..." 
        style = "background-color:white;">
        <i class="fa fa-search"></i>                    
    </div>   
    @if(!$picked)
    <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
        @forelse($invitaciones as $invitacion)
        <div style="cursor: pointer;color:black;">
            <a wire:click="seleccionarInvitacion('{{ $invitacion->id }}')">
                {{ $invitacion->apellido }}, {{$invitacion->nombre}}
            </a>
        </div>
        <hr>
        @empty
        Sin resultados para la busqueda...
        @endforelse
    </div>
    @endif
</div>
