<div class="modal fade" id="registerUsers" tabindex="-1" aria-labelledby="registerUsersLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerUsersLabel">Registrar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="saveUser">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nombre</label> <span v-if="!newUser.name" class="text-danger">*</span>
                        <input type="text" class="form-control" id="inputName" v-model="newUser.name" :required="!newUser.name">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label> <span v-if="!newUser.email" class="text-danger">*</span>
                        <input type="email" class="form-control" id="inputEmail" v-model="newUser.email" :required="!newUser.email">
                    </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Telefono</label> <span v-if="!newUser.phone" class="text-danger">*</span>
                        <input type="text" class="form-control" id="inputPhone" v-model="newUser.phone" :required="!newUser.phone">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary ">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>