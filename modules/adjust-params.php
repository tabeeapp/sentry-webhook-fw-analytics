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

    $params['callback_params'] = [
        'user_id' => $params['user_id'],
    ];

    $params['partner_params'] = [
        'push_token' => $params['push_token'],
    ];
}

function clean ( &$params ) {
    foreach ( config()->clean_keys as $key ) {
        unset( $params[$key] );
    }

    foreach ( $params as $key => $value ) {
        if ( empty( $value ) ) {
            unset( $params[$key] );
        }
    }
}