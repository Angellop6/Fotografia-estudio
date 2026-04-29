📸 Descripción General del Proyecto
Es una aplicación web ultrarrápida (MVP) hecha en Laravel para estudios fotográficos. Sirve para reemplazar la libreta de mostrador y controlar con 1 clic el estado de los trabajos de los clientes (Pendiente, Foto Lista y Entregada). No tiene login, ni subida de imágenes, solo gestión visual de estados en menos de 10 segundos.

💻 Requisitos Previos (Lo que debe estar instalado)
Para que la aplicación corra en cualquier computadora, se necesita tener instalado lo siguiente:

XAMPP (o cualquier servidor local que incluya PHP 8.2 o superior y MySQL).

Composer (El gestor de dependencias de PHP).

Git (Para descargar el código).

🚀 Pasos para ejecutarlo 
abra su terminal, se asegure de tener XAMPP encendido (Apache y MySQL) y ejecute estos pasos en orden:

1. Descargar y preparar la carpeta:

Bash
git clone https://github.com/Angellop6/Fotografia-estudio.git
cd estudio-fotos
composer install
2. Configurar el entorno:

Bash
cp .env.example .env
php artisan key:generate
3. Crear la base de datos:

Abrir el navegador y entrar a http://localhost/phpmyadmin

Crear una base de datos vacía llamada exactamente: estudio_fotos

4. Conectar la base de datos (Editar el archivo .env):
Abrir el archivo .env en la carpeta del proyecto y dejar esta parte así:

Fragmento de código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=estudio_fotos
DB_USERNAME=root
DB_PASSWORD=
5. Construir las tablas, meter datos de prueba y arrancar:

Bash
php artisan migrate --seed
php artisan serve
