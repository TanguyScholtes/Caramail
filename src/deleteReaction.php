<?php

require 'config.php';

$reaction = new Reaction();

if ( !isset( $_SESSION[ 'user' ] ) ) {
    //if user is not logged in
    //redirect to login page
    header( 'Location: index.php' );
    die();
}

try {
    if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset( $_POST[ 'reaction-delete-id' ] ) ) {
        $deleted = $reaction -> deleteReaction( intval( $_POST[ 'reaction-delete-id' ] ) );
    }
} catch ( \PDOException $e ) {
    //if the request failed, stop request & return error message
    die( $e -> getMessage() );
}
// redirect to view page
header( 'Location: ' . $_SESSION[ 'page' ] );
die();
