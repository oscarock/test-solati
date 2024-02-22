const { createApp, ref, onMounted } = Vue;

    createApp({
        setup() {
            const users = ref([]);
            const newUser = ref({
                name: '',
                email: '',
                phone: '',
            });

            onMounted(async () => {
                try {
                    const response = await fetch('/users');
                    const data = await response.json();
                    users.value = data;
                } catch (error) {
                    console.error('Error fetching users:', error);
                }
            });

            const saveUser = async () => {
                try {
                    const response = await fetch('/users', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(newUser.value),
                    });

                    if (response.ok) {
                        console.log('Usuario guardado correctamente');
                        newUser.value = {
                            name: '',
                            email: '',
                            phone: '',
                        };
                        // Puedes cerrar la modal aquí si es necesario
                        $('#registerUsers').modal('hide');

                        // Actualizar la lista de usuarios
                        const updatedUsersResponse = await fetch('/users');
                        users.value = await updatedUsersResponse.json();
                    } else {
                        console.error('Error al guardar el usuario');
                    }
                } catch (error) {
                    console.error('Error en la solicitud POST:', error);
                }
            };

            // Función para formatear la fecha
            const formatDate = (dateString) => {
                const options = { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit' };
                const date = new Date(dateString);
                return date.toLocaleDateString('es-ES', options);
            };

            return {
                users,
                newUser,
                saveUser,
                formatDate
            };
        }
}).mount('#app');