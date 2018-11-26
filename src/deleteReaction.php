<?php

require 'config.php';

$redirect = $_REQUEST[ "page" ];
$reaction = new Reaction();

//Quick & dirty reaction delete
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset( $_POST[ 'reaction-delete-id' ] ) ) {
    $deleted = $reaction -> deleteReaction( intval( $_POST[ 'reaction-delete-id' ] ) );
}

//redirect to view page
header( 'Location: ' . $redirect );
die();
