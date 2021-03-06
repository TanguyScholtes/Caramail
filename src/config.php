<?php
/* Improved error reporting - Remove in production */
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
/* ----- */

/* Back-end constants */
define( "DATABASE_CONFIG", 'db.ini' );
/* ----- */

/* Front-end constants */
define( "WEBSITE_TITLE", "Oufti - Le Chat de Ouf !" );
define( "WEBSITE_AUTHORS", "Dan Gjonaj, Olivier Huttmacher, Tanguy Scholtes, Julie Vanderbyse" );
define( "WEBSITE_DESCRIPTION", "A messenger website in PHP, part of BeCode's studentship" );
define( "WEBSITE_LANG", "fr-BE" );
define( "WEBSITE_CHARSET", "utf-8" );
/* ----- */

//start or resume user session
session_start();

/* Utilities require */
require 'utils/utilities.php';
/* ----- */

/* Objects Include */
require 'objects/Model.php';
require 'objects/User.php';
//require 'objects/Conversation.php';
require 'objects/Message.php';
require 'objects/Reaction.php';
/* ----- */
