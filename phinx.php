<?php

require 'vendor/autoload.php';

//$dotenv = new Dotenv\Dotenv(__DIR__);
//$dotenv->load();

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
    ],
    'environments' => [
        'default_database' => 'user_lib',
        'default_migration_table' => 'phinxlog',
        'testing' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'user_lib',
            'user' => 'root',
            'pass' => 'password1',
            'port' => 3306,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ]
    ],
];
