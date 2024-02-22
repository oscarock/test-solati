<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
    <div id="app">
        <div class="container">
            <h1 class="mt-3">Lista de Usuarios</h1>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registerUsers">
            Registrar Usuario
            </button>


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

            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Fecha Creado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.phone }}</td>
                        <td>{{ formatDate(user.created_at) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="public/js/main.js"></script>
</body>
</html>