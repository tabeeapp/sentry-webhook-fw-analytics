<?php

/* INCLUDE CONFIG */
require_once __DIR__ . '/adjust-config.php';
require_once __DIR__ . '/adjust-params.php';

function prep_url ( $url ) {
    $res= $url;

    $res .= '?';

    return $res;
}