<?php

require 'config.php';

$reaction = new Reaction();

//Quick & dirty reaction delete
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset( $_POST[ 'delete-id' ] ) ) {
    $deleted = $reaction -> delete( $_POST[ 'delete-id' ] );
}

//redirect to view page
header( 'Location: index.php' );
die();
