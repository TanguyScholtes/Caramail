<?php
/* --- Improved error reporting --- */
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );


define( "WEBSITE_TITLE", "Oufti" );
define( "WEBSITE_AUTHORS", "Dan Gjonaj, Olivier Huttmacher, Tanguy Scholtes, Julie Vanderbyse" );
define( "WEBSITE_DESCRIPTION", "A messenger website in PHP, part of BeCode's studentship" );
define( "WEBSITE_LANG", "fr-BE" );
define( "WEBSITE_CHARSET", "utf-8" );

require 'objects/Reaction.php';
