<?php
function els_heading( $params, $content=null ) {
    extract( shortcode_atts( array(
        'size' => 'h2',        
        'text' => 'Heading 2 Custom',        
    ), $params ) );
    $content = preg_replace( '/<br class="nc".\/>/', '', $content );
    $result = sprintf('<%1$s class="els-heading"><span class="sr">%2$s</span></%1$s>',$size,$text);
    return force_balance_tags( $result );
}
add_shortcode( 'els_heading', 'els_heading' );