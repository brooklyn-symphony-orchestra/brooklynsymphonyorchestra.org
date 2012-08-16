<?php
function custom_mce_styles( $init ) {
    $init['theme_advanced_buttons2_add_before'] = 'styleselect';
    $init['theme_advanced_styles'] = 'Composer=composer,Piece=piece';
    return $init;
}

add_filter( 'tiny_mce_before_init', 'custom_mce_styles'  );