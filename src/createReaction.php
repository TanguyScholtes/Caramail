<?php

require 'config.php';

$redirect = $_REQUEST[ "page" ];
$reaction = new Reaction();

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset( $_POST[ 'reaction-create-emoji' ] ) && isset( $_POST[ 'reaction-create-user-id' ] ) && isset( $_POST[ 'reaction-create-message-id' ] ) ) {
    // if the page is requested using the POST method
    // AND if there is something in all of the required fields of the $_POST superglobal variable

    // TODO : check if the user is logged in before altering database

    $emoji = $_POST[ 'reaction-create-emoji' ];
    $authorId = intval( $_POST[ 'reaction-create-user-id' ] );
    $messageId = intval( $_POST[ 'reaction-create-message-id' ] );

    // Save given emoji in database
    $saved = $reaction -> createReaction( $authorId, $messageId, $emoji ); //note that with these params, reaction will always be by User of ID 1 & linked to Message of ID 1
}

// redirect to view page
header( 'Location: ' . $redirect );
die();
