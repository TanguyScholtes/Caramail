<?php
/* Improved error reporting - Remove in production */
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
/* ----- */

/* Back-end constants */
define( "DATABASE_CONFIG", 'db.ini' );
/* ----- */

/* Front-end constants */
define( "WEBSITE_TITLE", "Oufti" );
define( "WEBSITE_AUTHORS", "Dan Gjonaj, Olivier Huttmacher, Tanguy Scholtes, Julie Vanderbyse" );
define( "WEBSITE_DESCRIPTION", "A messenger website in PHP, part of BeCode's studentship" );
define( "WEBSITE_LANG", "fr-BE" );
define( "WEBSITE_CHARSET", "utf-8" );
/* ----- */

session_start();

require 'objects/Reaction.php';
