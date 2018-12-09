<?php
require 'config.php';

$usermodel= new User;

$_SESSION[ 'user' ] = $usermodel->getUser($_SESSION['id']);

//TODO: replace with Conversation's method to get current conversation based on slug given by query string
//get all Conversations objects
$conversations = [
    ( object ) array( 'subject' => 'Général', 'author' => 0, 'id' => 1, 'slug' => 'general' )
];
//check if a chat slug is given
if ( isset( $_GET[ 'chat' ] ) ) {
    //if a chat slug is given, use it
    $convoSlug = $_GET[ 'chat' ];
} else {
    //else, fallback to general chat
    $convoSlug = "general";
}
//default value of conversation : general chat
$conversation = $conversations[ 0 ];
//get Conversation object with matching slug in Conversations array
foreach ( $conversations as $convo ) {
    if ( $convoSlug == $convo -> slug ) {
        //if this Converstion matches the slug given in query string, get that Conversation
        $conversation = $convo;
    }
}
/*-----*/

$users = $usermodel->getAllUsersByConversation($conversation->id);

$message_model = new Message();
$messages = $message_model-> getAllMessagesOfConversation($conversation->id);
foreach ($messages as $message) {
    $message -> author = $usermodel -> getUser( $message -> pseudo_id );
}

//get current page & query string for redirection to display when an action is performed on database
$currentPage = $_SERVER['REQUEST_URI'];
$_SESSION[ 'page' ] = $currentPage;

require 'templates/chat-template.php';
