<?php

require 'config.php';

$reaction = new Reaction();

//Quick & dirty reaction save
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset( $_POST[ 'create-emoji' ] ) ) {
    //if the page is requested using the POST method
    //AND if there is something in the "create-emoji" field of the $_POST superglobal variable

    //Save given emoji in database
    $saved = $reaction -> create( 1, 1, $_POST[ 'create-emoji' ] ); //note that with these params, reaction will always be by User of ID 1 & linked to Message of ID 1
}

//redirect to view page
header( 'Location: index.php' );
die();
