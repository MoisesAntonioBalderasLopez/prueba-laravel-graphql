# prueba-laravel-graphql
Proyecto de prueba de graphql para desarrollo de base de datos el proposito de este ejercicio es probar el funcionamiento del sistema de base de datos basado en grafos

Clonar el repositorio:

Bash
git clone https://github.com/MoisesAntonioBalderasLopez/prueba-laravel-graphql.git
# Prueba 

Este proyecto es una prueba técnica desarrollada en **Laravel 11** utilizando el paquete **Lighthouse** para implementar un servidor GraphQL. La aplicación permite gestionar **productos** y **categorías** aplicando buenas prácticas de arquitectura MVC, relaciones Eloquent y pruebas unitarias.

# tecnologias

- Laravel 11 (PHP 8.x)
- Lighthouse GraphQL
- MySQL
- Eloquent ORM
- PHPUnit
- GraphQL Playground / Apollo Sandbox para testeo de queries

---

 # Instalar dependencias PHP:
composer install

# Acceso a GraphQL
El endpoint de la API GraphQL está disponible en:

# bash

http://localhost:8000/graphql
Se puede probar usando herramientas como:

Apollo Sandbox: https://studio.apollographql.com/sandbox

Insomnia o Postman (soportan GraphQL)

Laravel GraphQL Playground (si fue instalado)

# Descripción de la API
## Entidades principales:
Categories

id

name

timestamps

Relaciones: tiene muchos productos.

Products

id

name

description

price

category_id

timestamps

## Relaciones: pertenece a una categoría.
 
## Funcionalidad GraphQL implementada:
## Queries:
## categories: Lista de categorías con sus productos.

## products: Lista de productos con su categoría.

Mutations:
createCategory

updateCategory

createProduct

updateProduct

deleteProduct

# Pruebas Unitarias
## Se implementaron pruebas automatizadas para validar:

Creación de categorías

Creación de productos

Actualización de productos

Eliminación de productos

Queries de productos y categorías

Validación de errores en los campos obligatorios

Para ejecutar los tests:

bash
php artisan test

# Instalacion de playground
composer require mll-lab/laravel-graphql-playground
Luego publica los assets:


php artisan vendor:publish --tag=graphql-playground-assets
Ahora sí podrás acceder a:


http://localhost:8000/graphql-playground
