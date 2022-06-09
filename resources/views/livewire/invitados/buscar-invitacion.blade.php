<div 
    x-data="{ 
        buscar:@entangle('buscar'),
        autoComplete:true, 
    }">
    <div class="input-box">
        <input wire:model="buscar" type="text" 
        @click="autoComplete=true"
        @click.away="autoComplete=false"
        @click.outside="autoComplete=false"
        @key.down.enter="autoComplete=true"
        class="form-control"
        style="background-color:white;">
        <i class="fa fa-search"></i>           
    </div>   
    <template x-if="autoComplete" x-transition.opacity> 
        <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
            @if(count($invitaciones) > 0)
                @foreach($invitaciones as $invitacion)
                <div style="cursor: pointer;color:black;">
                    <a wire:click="seleccionarInvitacion('{{ $invitacion->id }}')">
                        {{ $invitacion->apellido.', '.$invitacion->nombre }}
                    </a>
                    <hr class = "mt-2 mb-2">
                </div>
                @endforeach
            @endif
        </div>
    </template>       
</div>
