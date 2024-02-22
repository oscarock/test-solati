<?php

use Illuminate\Database\Capsule\Manager as Capsule;

// Cargar variables de entorno desde el archivo .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

class Database
{
    private static $instance = null;

    private function __construct()
    {
        // Configuración de la conexión a la base de datos
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'pgsql',
            'host'      => $_ENV['DB_HOST'],
            'database'  => $_ENV['DB_DATABASE'],
            'username'  => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->bootEloquent();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

// Para obtener la instancia de la conexión
$database = Database::getInstance();