# Ejecutar el programa

para arrancar el proyecto seguir estos pasos:

1. clonar el repositorio
2. renombrar el archivo .env-example por .env y configurar las variables de configuracion como desee igual deje unas de ejemplo
3. ejecutar comando docker compose up --build para recrear todo el entorno
4. por el navegador ingresar a la ruta http://localhost:8080/ esta este es el puerto del back
5. si desea ingresar a la base de datos el puerto es el 5432 con los accesos colocados en el .env

## Endpoints:
estos endpoint se pueden acceder desde el postman

1. obtener todos los usuarios GET:  http://localhost:8080/users
2. obtener un solo usuario GET: http://localhost:8080/users/1
3. registrar a un usuario POST: http://localhost:8080/users
4. editar a un usuario PUT: http://localhost:8080/users/2
5. eliminar a un usuario DELETE: http://localhost:8080/users/8
