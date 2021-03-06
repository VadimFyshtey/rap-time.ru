<?php

return array(

    /*
     |--------------------------------------------------------------------------
     | Site default title
     |--------------------------------------------------------------------------
     |
     */

    'title' => 'Rap-Time',

    /*
     |--------------------------------------------------------------------------
     | Limit title meta tag length
     |--------------------------------------------------------------------------
     |
     | To best SEO implementation, limit tags.
     |
     */

    'title_limit' => 150,

    /*
     |--------------------------------------------------------------------------
     | Limit description meta tag length
     |--------------------------------------------------------------------------
     |
     | To best SEO implementation, limit tags.
     |
     */

    'description_limit' => 255,

    /*
     |--------------------------------------------------------------------------
     | OpenGraph values
     |--------------------------------------------------------------------------
     |
     */

    'open_graph' => [
        'site_name' => 'Rap-Time',
        'type' => 'website'
    ],

    /*
     |--------------------------------------------------------------------------
     | Twitter Card values
     |--------------------------------------------------------------------------
     |
     */

    'twitter' => [
        'card' => 'summary',
        'creator' => '@mysite',
        'site' => '@mysite'
    ],

    /*
     |--------------------------------------------------------------------------
     | Supported languages
     |--------------------------------------------------------------------------
     |
     */

    'locale_url' => '[scheme]://[locale][host][uri]',

    /*
     |--------------------------------------------------------------------------
     | Supported languages
     |--------------------------------------------------------------------------
     |
     */

    'locales' => ['en', 'es'],
);
