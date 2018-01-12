<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 1/12/2018
 * Time: 11:43 AM
 */

/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
function aldehyde_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function aldehyde_sanitize_positive_number( $input ) {
    if ( ($input >= 0) && is_numeric($input) )
        return $input;
    else
        return '';
}

function aldehyde_sanitize_category( $input ) {
    if ( term_exists(get_cat_name( $input ), 'category') )
        return $input;
    else
        return '';
}