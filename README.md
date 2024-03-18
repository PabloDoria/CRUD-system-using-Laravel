# Sistema CRUD con Laravel

Este proyecto implementa un sistema CRUD (Crear, Leer, Actualizar, Eliminar) utilizando Laravel, un framework de desarrollo web PHP. El sistema permite gestionar registros en una base de datos, utilizando rutas para la navegación entre las diferentes operaciones.

## Características

- Crear nuevos registros.
- Leer registros existentes.
- Actualizar registros existentes.
- Eliminar registros existentes.
- Cargar archivos de imagen para los registros.

## Instrucciones de Uso

1. Clona el repositorio a tu máquina local.
2. Ejecuta `composer install` para instalar las dependencias de PHP.
3. Copia el archivo `.env.example` y renómbralo a `.env`. Configura la conexión a tu base de datos en este archivo.
4. Ejecuta `php artisan key:generate` para generar una nueva clave de aplicación.
5. Ejecuta `php artisan migrate` para migrar las tablas de la base de datos.
6. Ejecuta `php artisan serve` para iniciar el servidor de desarrollo.
7. Ejecuta `npm run dev` (si no cuentas con npm usa `npm install` para instalarlo.)
8. Abre tu navegador web y visita `http://localhost:8000` para acceder al sistema.

## Nota Importante

Para acceder a las funciones del sistema, es necesario crear una cuenta de usuario mediante el registro de inicio de sesión. Una vez que hayas creado una cuenta, podrás iniciar sesión y comenzar a utilizar todas las funcionalidades del sistema CRUD.

¡Disfruta de la experiencia de desarrollo con Laravel!
