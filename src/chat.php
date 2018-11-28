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
    ( object ) array( 'firstname' => 'Samuel L.', 'lastname' => 'Jackson', 'id' => 5, 'avatar' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTY1MzgzOTYxNV5BMl5BanBnXkFtZTgwMDI4OTEwMjE@._CR878,111,387,387_UX402_UY402._SY201_SX201_AL_.jpg' ),
    ( object ) array( 'firstname' => 'Dr. Emmett', 'lastname' => 'Brown', 'id' => 6, 'avatar' => 'https://static.comicvine.com/uploads/scale_small/3/38826/840436-doc.jpg' ),
    ( object ) array( 'firstname' => 'Forrest', 'lastname' => 'Gump', 'id' => 7, 'avatar' => 'https://img2.telestar.fr/var/telestar/storage/images/article/forrest-gump-tmc-les-5-scenes-qui-ont-rendu-tom-hanks-mythique-videos-247178/1539032-1-fre-FR/Forrest-Gump-TMC-les-5-scenes-qui-ont-rendu-Tom-Hanks-mythique-Videos_exact1024x768_l.jpg' ),
    ( object ) array( 'firstname' => 'Jedi Master', 'lastname' => 'Yoda', 'id' => 8, 'avatar' => 'https://vignette.wikia.nocookie.net/fr.starwars/images/5/5f/Yoda.png/revision/latest?cb=20161009183018' ),
    ( object ) array( 'firstname' => 'Joker', 'lastname' => '', 'id' => 9, 'avatar' => 'https://vignette.wikia.nocookie.net/batman/images/3/3e/Jack_Nicholson_As_The_Joker.jpg/revision/latest?cb=20180101142215' ),
    ( object ) array( 'firstname' => 'Walter', 'lastname' => 'White', 'id' => 10, 'avatar' => 'https://upload.wikimedia.org/wikipedia/en/6/65/Walter_White2.jpg' ),
    ( object ) array( 'firstname' => 'Tyrion', 'lastname' => 'Lannister', 'id' => 11, 'avatar' => 'http://geotimes.ge/uploads/tyrion-lannister-512x512.jpg' ),
    ( object ) array( 'firstname' => 'Pikachu', 'lastname' => '', 'id' => 12, 'avatar' => 'http://resize1-gulli.ladmedia.fr/r/890/img//var/jeunesse/storage/images/gulli/chaine-tv/dessins-animes/pokemon/pokemon/pikachu/26571681-1-fre-FR/Pikachu.jpg' ),
    ( object ) array( 'firstname' => 'Dead', 'lastname' => 'Pool', 'id' => 13, 'avatar' => 'https://img00.deviantart.net/cfeb/i/2015/365/3/a/deadpool_s_ass_by_plank_69-d9lk44g.png' ),
    ( object ) array( 'firstname' => 'Momonga', 'lastname' => 'Ainz Ooal Gown', 'id' => 14, 'avatar' => 'https://i.pinimg.com/originals/74/9e/e0/749ee0970ad056d6bb1f64689fc64e8a.jpg' ),
    ( object ) array( 'firstname' => 'Beerus', 'lastname' => 'Akaïshin', 'id' => 15, 'avatar' => 'https://upload.wikimedia.org/wikipedia/en/thumb/3/35/Beerus_Battle_of_Gods.jpg/220px-Beerus_Battle_of_Gods.jpg' ),
    ( object ) array( 'firstname' => 'Kratos', 'lastname' => '', 'id' => 16, 'avatar' => 'https://cdn.wccftech.com/wp-content/uploads/2018/04/WCCFgodofwar6-740x429.jpg' ),
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
        Look, just because I don\'t be givin\' no man a foot massage don\'t make it right for Marsellus to throw Antwone into a glass motherfuckin\' house, fuckin\' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, \'cause I\'ll kill the motherfucker, know what I\'m sayin\'?', 'timestamp' => '27-11-2018 09:40', 'id' => 9, 'author' => $users[ 4 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'Rules ? Where we\'re chatting, we don\'t need rules !', 'timestamp' => '28-11-2018 10:51', 'id' => 10, 'author' => $users[ 5 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'My Mama always said : `Chatting\'s like a box of chocolate, you never know what you\'re gonna get`.', 'timestamp' => '28-11-2018 10:53', 'id' => 11, 'author' => $users[ 6 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'Try not. Code - or code not. There is no try.', 'timestamp' => '28-11-2018 10:56', 'id' => 12, 'author' => $users[ 7 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'As my plastic surgeon always said : `If you gotta go, go with a smile` !', 'timestamp' => '28-11-2018 11:02', 'id' => 13, 'author' => $users[ 8 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'Say my name.', 'timestamp' => '28-11-2018 12:04', 'id' => 14, 'author' => $users[ 9 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'I drink wine and I know things.', 'timestamp' => '28-11-2018 12:06', 'id' => 15, 'author' => $users[ 10 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'Pikachu !', 'timestamp' => '28-11-2018 12:09', 'id' => 16, 'author' => $users[ 11 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'Chimi-fucking-changas !', 'timestamp' => '28-11-2018 12:12', 'id' => 17, 'author' => $users[ 12 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'Cease your futile resistance and just lie down like a good dog. As an act of mercy I\'ll make sure your death is painless.', 'timestamp' => '28-11-2018 12:23', 'id' => 18, 'author' => $users[ 13 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'Before creation, there must be destruction.', 'timestamp' => '28-11-2018 12:26', 'id' => 19, 'author' => $users[ 14 ], 'conversationId' => 1),
    ( object ) array( 'content' => 'Boy !', 'timestamp' => '28-11-2018 12:29', 'id' => 20, 'author' => $users[ 15 ], 'conversationId' => 1),
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
