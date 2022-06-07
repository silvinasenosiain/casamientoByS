<div class="modal fade" id="m-agregar-invitacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva invitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Apellido</label>
                            <input type="text" wire:model.defer="apellido" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">Nombre</label>
                            <input type="text" wire:model.defer="nombre" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">Teléfono</label>
                            <input type="number" wire:model.defer="telefono" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click="guardar_invitacion" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>