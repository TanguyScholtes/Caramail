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



//TODO: replace with Message's method to get all messages of conversation
//get all Messages
$allMessages = [
    ( object ) array( 'content' => 'Emojis... Emojis everywhere...', 'timestamp' => '23-11-2018 16:16', 'id' => 1, 'author' => $users[ 0 ], 'conversationId' => 1 ),
    ( object ) array( 'content' => 'This is message two. Wazzup ?', 'timestamp' => '26-11-2018 11:27', 'id' => 2, 'author' => $users[ 1 ], 'conversationId' => 1 ),
    ( object ) array( 'content' => 'WAZZZZZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'timestamp' => '26-11-2018 12:22', 'id' => 3, 'author' => $users[ 0 ], 'conversationId' => 1 )
];
$messages = [];
foreach( $allMessages as $msg ) {
    //walk array of Messages
    if ( $msg -> conversationId == $conversation -> id ) {
        //if this Message belongs to current Conversation
        //stock it in $messages array (which will be displayed below)
        $messages[] = $msg;
    }
}
/*-----*/

//get current page & query string for redirection to display when an action is performed on database
$currentPage = $_SERVER['REQUEST_URI'];
$_SESSION[ 'page' ] = $currentPage;

require 'templates/chat-template.php';
