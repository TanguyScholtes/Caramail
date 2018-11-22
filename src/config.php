<?php
/* --- Improved error reporting --- */
ini_set('display_errors', 'On');
ini_set('error_reporting', 'E_ALL');
error_reporting( E_ALL );

define( "WEBSITE_TITLE", "Caramail en PHP" );
define( "WEBSITE_AUTHORS", "Dan Gjonaj, Olivier Huttmacher, Tanguy Scholtes, Julie Vanderbyse" );
define( "WEBSITE_DESCRIPTION", "A messenger website in PHP, part of BeCode's studentship" );
define( "WEBSITE_LANG", "fr-BE" );
define( "WEBSITE_CHARSET", "utf-8" );

require 'objects/Conversation.php';
require 'objects/Message.php';
require 'objects/Reaction.php';
require 'objects/User.php';
