<?php

require_once __DIR__ . '/adjust-config.php';
require_once __DIR__ . '/adjust-utils.php';

function make_request ( $req ) {
    $ch = curl_init();

    curl_setopt( $ch, CURLOPT_URL, $req );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, [ AUTH_HEADER ] );
    
    $output = curl_exec( $ch );
    $error  = curl_error( $ch );
    $errno  = curl_errno( $ch );

    curl_close( $ch );     

    return $output;
}

function generate_request ( $url, $params ) {
    $res = prep_url( $url );
    $p = '';

    foreach ( $params as $key => $value ) {
        $val = $value;

        if ( is_array( $value ) ) {
            $val = json_encode( $value );
        }

        $p .= $key . '=' .$val . '&';
    }

    return substr( $res . $p, 0, -1 );
}