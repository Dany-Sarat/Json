# Creación y Actualización de Vehículos

## Dependencias:
* PHP 8.1 o superior
* Composer 2.6.3 o superior
* NodeJS 18 o superior
* MariaDB 10 o superior

## Instalación:

* Clonación de repositorio:
    ```bash
    git clone https://www.github.com/Dany-Sarat/Json
    ```

* Instalación de dependencias composer
    ```bash
    composer install
    ```
* Instalación de dependencias node 
    ```bash
    npm install
    ```
* Copiar las variables de entorno del archivo .env.example a un archivo nuevo denominado .env
    ```bash
    cat .env.example > .env
    ```
* Crear una base de datos en mariadb con un nombre especifico

* En el archivo .env se debe de ingresar las credenciales de la base de datos, hay que buscar las variables correspondientes y  modificarlas, el siguiente bloque de código ejemplifica como deberia verse:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE={NOMBRE_DE_BASE_DE_DATOS}
    DB_USERNAME={USUARIO_BASE_DE_DATOS}
    DB_PASSWORD={PASS_BASE_DE_DATOS}
    ```
* Generar una llave para la aplicación:
    ```bash
    php artisan key:generate
    ```
* Hacer la migración de la base de datos:
    ```bash
    php artisan migrate
    ```
* Compilar Javascript y CSS del proyecto:
    ```bash
    npm run build
    ```

* Ejecutar el Servidor:
    ```bash
    php artisan serve
    ```
* Para finalizar, si todo se ha relizado correctamente, ahora es cuestión de ir a un navegador web y en la barra de direcciones ingresar la siguiente dirección: http://localhost:8000/home

## Detalles técnicos de la aplicación:
### Puntos de Entrada de la aplicación

Los dos recursos de la API REST son:

* Crear vehiculo
    ```http
    HTTP POST /api/vehiculos
    Accept: application/json
    Content-Type: application/json

    Body
    {
        "placa": "",
        "modelo": "",
        "color": "",
        "puertas": ""
    }
    ```
* Modificar Vehiculo:
```http
    HTTP PUT /api/vehiculos/{id_vehiculo}
    Accept: appliation/json
    Content-Type: application/json

    Body
    {
        "placa": "", // opcional
        "modelo": "", // opcional
        "color": "", // opcional
        "puertas": "" // opcional
    }
```

### Ubicación de los recursos de la API Rest

Los recursos de la API REST están definidos y pueden ser analizados en las siguientes rutas:

* El controlador con los métodos de crear y actualizar:
    ./app/Http/Controllers/Vehiculo/VehiculoController.php

* Las rutas definidas para crear y actualizar:
    ./routes/vehiculo_api.php


### Ubicación de los recursos del frontend:
Los recursos del frontend(archivos css, archivos js y archivos blade/html de los formularios) se encuentran en las siguientes rutas:

* Los recursos css:
    ./resources/css/app.css

* Los recursos js:
    ./resources/js/

* Los recursos blade/html de los formularios:
    ./resources/views/