<?php

function slugify ( $string ) {
    // replace non letter or digits by -
    $text = preg_replace( '~[^\pL\d]+~u', '-', $string );
    // transliteration => swapping characters from utf8mb4 to us-ascii for maximum compatibility
    $text = iconv( "UTF-8", 'us-ascii//TRANSLIT', $text );
    // remove special characters
    $text = preg_replace( '~[^-\w]+~', '', $text );
    // trim trailling -
    $text = trim( $text, '-' );
    // remove duplicate -
    $text = preg_replace( '~-+~', '-', $text );
    // lowercase
    $text = strtolower( $text );

    if ( empty( $text ) ) {
        // if the given text has been deleted by the function, return false
        return false;
    }
    // if there is text to return, return it
    return $text;
}
