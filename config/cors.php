<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Esta configuración permite que el frontend (Next.js o React)
    | se comunique con el backend Laravel usando cookies (Sanctum).
    |
    */

    'paths' => [
        'api/*',
        'login',
        'logout',
        'register',
        'sanctum/csrf-cookie',
        'user', // 👈 por si usas /user o /api/me
        'me'
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:3000',  
        'http://127.0.0.1:3000',  
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // ✅ necesario para compartir cookies
];
