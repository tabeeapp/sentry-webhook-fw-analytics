<?php

define( 'LOG', true );
define( 'REQUEST_URL', 'https://s2s.adjust.com/event' );
define( 'AUTH_HEADER', 'Authorization: Bearer TOKEN' );

/* DEBUG_URL CONFIG */
// see debug results https://requestbin.com/r/enq9yusclzqt
define( 'DEBUG_REQUEST_URL', 'https://enq9yusclzqt.x.pipedream.net/event' );

function config () {    
    global $config;
    return $config;
}

$config = (object)[

    'include_tags' => 
        [ 
            'browser', 'browser.name', 'handled', 'idfa', 'idfv', 
            'app.device', 'device', 'device.family', 'dist', 'handled', 
            'level', 'mechanism', 'os', 'os.name', 'os.rooted', 'release', 
            'transaction', 'push_token', 'user_id', 'sentry:user' 
        ],

    'include_user' => 
        [ 
            'ip_address', 
            'id' 
        ],

    'default_params' =>
        [
            'event_token' => 'adjust_event_token',
            'app_token' => 'adjust_app_token',
            's2s' => 1
            'environment' => 'production'
        ],

    'callback_params' =>
        [
            'user_id' => 'userID',
            'release' => 'app_version',
            'level' => 'error_level',
            'transaction' => 'controller',
            'os' => 'os_version',
            'device' => 'device_version',
            'user_email' => 'email'
        ],

    'partner_params' =>
        [
            'release' => 'app_version'
        ],

    'clean_keys' =>
        [ 
            'user_id', 
            'sentry:user',
            'browser',
            'browser.name',
            'os.name',
            'id',
            'app.device',
            'device',
            'device.family',
            'dist',
            'handled',
            'level',
            'mechanism',
            'os',
            'os.name',
            'os.rooted',
            'push_token',
            'release',
            'transaction',
            'user',
            'user_id',
            'email'
        ],
];