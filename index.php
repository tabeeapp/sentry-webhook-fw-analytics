<?php

/* CORS HEADERS (Comment or remove lines if you don't need CORS) */
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Headers: Content-Type' );

/* MODULES */
require_once __DIR__ . '/modules/request.php';
require_once __DIR__ . '/modules/log.php';

/* 
-------------
LOGIC
------------- 
*/

$uniq = uniqid();

wlog( '------------------ START REQUEST ' . $uniq, '', false );

/* Get post data */
$body = json_decode( file_get_contents( 'php://input' ) );
wlog( 'DATA RECEIVED', $body );

if ( empty( (array)$body ) ) {
    // Put to the 'test.json' your testing data
    // $body = json_decode( file_get_contents( __DIR__ . '/test.json' ) );
    wlog( '------------------ END REQUEST WITH NO BODY ' . $uniq, "\r\n\r\n", false );
    die( '{"status":"error","message":"406 Not Acceptable"}' );
}

//Get params from body
$params = extract_params( $body );
wlog( 'EXTRACTED PARAMS', $params );

//Make request URL
$request = generate_request( REQUEST_URL, $params );
wlog( 'GENERATED REQUEST', $request, false );
// $request = generate_request( DEBUG_REQUEST_URL, $params );

//Make a request
$result = make_request( $request );
wlog( 'API ANSWER', $result, false );
echo $result;

wlog( '------------------ END REQUEST ' . $uniq, "\r\n\r\n", false );