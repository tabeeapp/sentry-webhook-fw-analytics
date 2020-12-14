<?php

function extract_params ( $data ) {
    $params = array_merge( config()->default_params );

    extract_tags( $params, $data->event->tags );
    extract_user( $params, $data->event->user );
    modify_params( $params );
    clean( $params );

    return $params;
}

function extract_tags ( &$params, $tags ) {
    foreach ( $tags as $tag ) {
        list( $key, $value ) = $tag;
        
        if ( in_array( $key, config()->include_tags ) ) {
            $params[$key] = urlencode( $value );
        }
    }
}

function extract_user( &$params, $user ) {
    foreach ( $user as $key => $value ) {
        if ( in_array( $key, config()->include_user ) ) {
            $params[$key] = urlencode( $value );
        }
    }
}

function modify_params( &$params ) {
    $params['sentry_user'] = explode( ':', $params['sentry:user'] )[1];

    $params['idfa'] = $params['ios_idfa'];

    callback_params( $params );
    partner_params( $params );
}

function callback_params( &$params ) {
    $params['callback_params'] = [];

    foreach( config()->callback_params as $key => $value ) {
        $params['callback_params'][$value] = $params[$key];
    }
}

function partner_params( &$params ) {
    $params['partner_params'] = [];

    foreach( config()->partner_params as $key => $value ) {
        $params['partner_params'][$value] = $params[$key];
    }
}

function clean ( &$params ) {
    foreach ( config()->clean_keys as $key ) {
        unset( $params[$key] );
    }

    foreach ( $params as $key => $value ) {
        if ( empty( $value ) || $value === 'null' ) {
            unset( $params[$key] );
        }
    }
}