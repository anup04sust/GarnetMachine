<?php
function els_dropcap( $params, $content=null ) {
    extract( shortcode_atts( array(
        'size' => 'medium',        
    ), $params ) );
    $content = preg_replace( '/<br class="nc".\/>/', '', $content );
    $result =  '<div class="eli-dropcap dropcap-'.$size.'">';    
    $content = do_shortcode( $content );
    $result .= wpautop( $content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode( 'els_dropcap', 'els_dropcap' );
