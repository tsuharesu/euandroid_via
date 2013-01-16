<?php
/*
Plugin Name: EuAndroid Fonte e Via
Plugin URI: http://euandroid.com.br
Description: Plugin para adicionar facilmente links de fontes das notícias
Version: 0.3
Author: Tsuharesu
Author URI: http://about.me/tsuharesu
License: WTFPL v2 (http://sam.zoy.org/wtfpl/COPYING)
*/

function euandroid_via( $atts, $content, $code ) {
  if(strcmp($code,"via") == 0)
    $via = "<p style='text-align: right;'>Via: ";
  else
    $via = "<p style='text-align: right;'>Fonte: ";
  
  $via_values = array();
  foreach ($atts as $key => $att) {
    $via_values[$att] = "<a href=$att target='_blank'>" . pegar_titulo($key) . "</a>";
  }
  
  if($via_values > 1) :
		$via .= implode(", ", $via_values);
	endif;
  $via .= "</p>";
  return $via;
}

function pegar_titulo( $title ) {
  $new_title = str_replace("_"," ",$title);
  return ucwords($new_title);
}

add_shortcode( 'via', 'euandroid_via' );
add_shortcode( 'fonte', 'euandroid_via' );
?>
