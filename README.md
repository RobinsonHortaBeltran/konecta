## Sobre el proyecto
Este es un proyecto desarrollado con laravel, el cual permite realizar todo el CRUD para los productos y para las ventas, cuenta con migraciones, y seeders
se utilizo el motor de base de datos PostgresSql como fue solicitado


## Descarga del Proyecto

Puedes clonar el repositorio usando Git:

```bash
git clone https://github.com/RobinsonHortaBeltran/konecta.git

```

## Requisitos del Sistema

Asegúrate de tener instalado lo siguiente antes de ejecutar el proyecto:

- PHP >= 8.x
- Composer
- PgAdmin

## Instalación de Dependencias

Después de descargar el proyecto, navega al directorio del proyecto y ejecuta:

```bash
composer install
```

## Configuración del Entorno

Copia el archivo `.env.example` a `.env` y modifica las configuraciones según tus necesidades recuerda generar la configuracion para la base de datos:

```bash
cp .env.example .env
```

## Migraciones y Semillas

Ejecuta las migraciones y las semillas para configurar la base de datos:

```bash
php artisan migrate --seed
```

## Servidor de Desarrollo

Puedes iniciar el servidor de desarrollo con el siguiente comando:

```bash
php artisan serve

Visita http://localhost:8000 en tu navegador.
```

## Consultas de base de datos 

/*Consulta para saber cual es el producto con mas stock disponible */
select * from products order by stock DESC LIMIT 1;

/*Consulta para saber cual es el producto mas vendido*/
SELECT product_id, SUM(cantidad) as total_sales
FROM sales_product
GROUP BY product_id
ORDER BY total_sales DESC
LIMIT 1;

## Documentacion de pruebas
```bash
https://documenter.getpostman.com/view/29417864/2sA2r9W3sn
```
