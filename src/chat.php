<?php
require 'config.php';

//TODO: replace with logged in user
$_SESSION[ 'user' ] = ( object ) array( 'firstname' => 'Tanguy', 'lastname' => 'Scholtes', 'id' => 1 );
/*-----*/

//TODO: replace with User's method to get all users
$users = [
    ( object ) array( 'firstname' => 'Tanguy', 'lastname' => 'Scholtes', 'id' => 1, 'avatar' => 'https://api.adorable.io/avatars/285/TanguyScholtes@adorable.png' ),
    ( object ) array( 'firstname' => 'Julie', 'lastname' => 'Vanderbyse', 'id' => 2, 'avatar' => 'https://api.adorable.io/avatars/285/JulieVanderbyse@adorable.png' ),
    ( object ) array( 'firstname' => 'Dan', 'lastname' => 'Gjonaj', 'id' => 3, 'avatar' => 'https://api.adorable.io/avatars/285/DanGjonaj@adorable.png' ),
    ( object ) array( 'firstname' => 'Olivier', 'lastname' => 'Huttmacher', 'id' => 4, 'avatar' => 'https://api.adorable.io/avatars/285/OlivierHuttmacher@adorable.png' ),
    ( object ) array( 'firstname' => 'Samuel L.', 'lastname' => 'Jackson', 'id' => 5, 'avatar' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTY1MzgzOTYxNV5BMl5BanBnXkFtZTgwMDI4OTEwMjE@._CR878,111,387,387_UX402_UY402._SY201_SX201_AL_.jpg' )
];
/*-----*/

//TODO: replace with Conversation's method to get current conversation based on slug given by query string
//get all Conversations objects
$conversations = [
    ( object ) array( 'subject' => 'Général', 'author' => $users[ 0 ], 'id' => 1, 'slug' => 'general' ),
    ( object ) array( 'subject' => 'Poop fetish', 'author' => $users[ 1 ], 'id' => 2, 'slug' => 'poop_fetish' )
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

//TODO: replace with Message's method to get all messages of conversation
//get all Messages
$allMessages = [
    ( object ) array( 'content' => 'Emojis... Emojis everywhere...', 'timestamp' => '23-11-2018 16:16', 'id' => 1, 'author' => $users[ 0 ], 'conversationId' => 1 ),
    ( object ) array( 'content' => 'This is message two. Wazzup ?', 'timestamp' => '26-11-2018 11:27', 'id' => 2, 'author' => $users[ 1 ], 'conversationId' => 1 ),
    ( object ) array( 'content' => 'WAZZZZZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'timestamp' => '26-11-2018 12:22', 'id' => 3, 'author' => $users[ 0 ], 'conversationId' => 1 ),
    ( object ) array( 'content' => 'Wow, j\'ai mangé de l\'herbe à chat aujourd\'hui', 'timestamp' => '26-11-2018 14:40', 'id' => 4, 'author' => $users[ 3 ], 'conversationId' => 2 ),
    ( object ) array( 'content' => 'Pourtant le caca c\'est délicieux', 'timestamp' => '26-11-2018 14:40', 'id' => 5, 'author' => $users[ 2 ], 'conversationId' => 2 ),
    ( object ) array( 'content' => 'Oui mais la pizza c\'est la vie !', 'timestamp' => '26-11-2018 14:41', 'id' => 6, 'author' => $users[ 0 ], 'conversationId' => 2 ),
    ( object ) array( 'content' => 'Super, maintenant j\'ai envie de manger du caca', 'timestamp' => '26-11-2018 14:42', 'id' => 7, 'author' => $users[ 3 ], 'conversationId' => 2 ),
    ( object ) array( 'content' => 'On peut toujours s\'arranger pour t\'en rammener à ma prochaine promenade !', 'timestamp' => '26-11-2018 14:43', 'id' => 8, 'author' => $users[ 1 ], 'conversationId' => 2),
    ( object ) array( 'content' => 'The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother\'s keeper and the finder of lost children. And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers. And you will know My name is the Lord when I lay My vengeance upon thee.<br /><br />
        Look, just because I don\'t be givin\' no man a foot massage don\'t make it right for Marsellus to throw Antwone into a glass motherfuckin\' house, fuckin\' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, \'cause I\'ll kill the motherfucker, know what I\'m sayin\'?', 'timestamp' => '27-11-2018 09:40', 'id' => 9, 'author' => $users[ 4 ], 'conversationId' => 1)
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

require 'templates/chat-template.php';
