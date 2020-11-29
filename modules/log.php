<?php

require_once __DIR__ . '/adjust-config.php';

function wlog ( $action, $raw, $convert = true ) {
    if ( !LOG ) return;
    
    $filename = date( 'Y-m-d' ) . '.log';
    $filepath = __DIR__ . '/../logs/' . $filename;
    $time = date( 'H:i:s' );
    $data = $convert ? json_encode( $raw ) : $raw;

    $info = [ IP(), $_SERVER['HTTP_REFERER'], $_SERVER['REQUEST_METHOD'] ];

    $fp = fopen( $filepath, 'a' );

    fwrite( $fp, $time . ' | ' . $action . ' [' . implode( ', ', $info ) . ']: ' );
    ( $convert && !empty( $raw ) ) && ( fwrite( $fp, "\r\n" ) );
    fwrite( $fp, $data );
    fwrite( $fp, "\r\n" );

    fclose( $fp );
}

function IP () {
    if ( !empty($_SERVER['HTTP_CLIENT_IP'] ) ) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    
    if ( !empty($_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    
    return $_SERVER['REMOTE_ADDR'];
}