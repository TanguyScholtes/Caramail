<?php

require 'config.php';

$reaction = new Reaction();

if ( !isset( $_SESSION[ 'user' ] ) ) {
    //if user is not logged in
    //redirect to login page
    header( 'Location: index.php' );
    die();
}

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset( $_POST[ 'reaction-create-emoji' ] ) && isset( $_POST[ 'reaction-create-user-id' ] ) && isset( $_POST[ 'reaction-create-message-id' ] ) ) {
    // if the page is requested using the POST method
    // AND if there is something in all of the required fields of the $_POST superglobal variable

    try {
        $emoji = $_POST[ 'reaction-create-emoji' ];
        $authorId = intval( $_POST[ 'reaction-create-user-id' ] );
        $messageId = intval( $_POST[ 'reaction-create-message-id' ] );
        // Save given emoji in database
        $saved = $reaction -> createReaction( $authorId, $messageId, $emoji );
    } catch ( \PDOException $e ) {
        //if the request failed, stop request & return error message
        die( $e -> getMessage() );
    }
    // redirect to view page
    header( 'Location: ' . $_SESSION[ 'page' ] );
    die();
} else {
    // if the page was not accessed using POST method
    // OR a required field is missing

    //redirect to previous page without adding the reaction
    header( 'Location: ' . $_SESSION[ 'page' ] );
    die();
}
