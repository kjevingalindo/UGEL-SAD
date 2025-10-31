<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Esta opción define el "guard" y el "broker" de restablecimiento de
    | contraseña predeterminados para tu aplicación. Puedes modificarlos
    | según tus necesidades.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Aquí defines los "guards" de autenticación disponibles. El guard "web"
    | utiliza almacenamiento de sesión junto con el proveedor Eloquent.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Cada guard tiene un proveedor de usuarios que define cómo obtener
    | los usuarios desde la base de datos. Aquí configuramos el modelo
    | directamente al nuevo namespace modular.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Modules\Auth\User::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Reset de Contraseñas
    |--------------------------------------------------------------------------
    |
    | Configura cómo se gestionan los tokens de restablecimiento de contraseña.
    | El tiempo de expiración define cuántos minutos son válidos los tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Cantidad de segundos antes de que caduque la confirmación de contraseña.
    | Por defecto, dura tres horas (10800 segundos).
    |
    */

    'password_timeout' => 10800,

];
