<?php
/*
Plugin Name: ThumbNailsPro
Plugin URI: http://e4websolutions.com/
Description: ThumbNailsPro Plugin - filter content and show thumbs for urls contained in it
Version: 2.61
Author: E4WebSolutions
Author URI: http://www.e4websolutions.com
Author Email: info@e4websolutions.com
*/
$path  = ''; // It should be end with a trailing slash    

/** That's all, stop editing from here **/

add_action( 'init', 'tnp_script_enqueuer' );

function tnp_script_enqueuer() {
   //wp_register_script( "tnp_script", 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js', array('jquery') );
   wp_register_script( "tnp_script", WP_PLUGIN_URL.'/wordpress-page-previews-screenshots-plugin/js/thumbnailspro.js', array('jquery') );
   wp_localize_script( 'tnp_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        


   wp_enqueue_script( 'jquery' );
	 wp_enqueue_script("jquery-ui",'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js', array('jquery'));
   wp_enqueue_script( 'tnp_script' );

   wp_enqueue_style('tnp_style', WP_PLUGIN_URL.'/wordpress-page-previews-screenshots-plugin/css/thumbnailspro.css');

}


add_filter('the_content', 'tnp_the_content'); 


function tnp_the_content($content) { 
	if (get_option('tnp_filter_location')=='posts') {
		$newcontent = "<script>var thumb_mode='".get_option('tnp_filter_scope')."';</script>\n";
		$newcontent.= "<script>var thumb_size='".get_option('tnp_popup_size')."';</script>\n";

  	$content = $newcontent.$content;

	  //$content = str_replace( 'a href','a class="thumbnailspro" href', $content );
	  $lastpos=0;
	  $hpos=strpos($content,"a href",$lastpos);
	  while( $hpos ) {
	  	//print "<br><br>hpos:$hpos<br>\n";
	  	$addthumb=true;
	  	$endpos=strpos($content,">",$hpos);
	  	//print "endpos:$endpos<br>\n";
	 		$thistag=substr($content, $hpos, $endpos - $hpos );
			//print "thistag start:$thistag<br>\n";
	  	if ( get_option('tnp_filter_scope')!="all" ) {
	  		$addthumb=false;
	  		$localdomain=strpos(strtolower($thistag),strtolower($_SERVER["HTTP_HOST"]));
	  		if ((get_option('tnp_filter_scope')=="external") && (!$localdomain)) $addthumb=true;
	  		if ((get_option('tnp_filter_scope')=="internal") && ($localdomain)) $addthumb=true;
	  		}
	  	//print "scope:".get_option('tnp_filter_scope').",host:".$_SERVER["HTTP_HOST"].",local:".$localdomain.",addthumb:".$addthumb."<br>\n";
	  	if ( $addthumb ) {
	  		$thistag = str_replace( 'a href','a class="thumbnailspro" href', $thistag );
				//print "thistag end:$thistag<br>\n";
	  		$content=substr($content,0,$hpos).$thistag.substr($content,$endpos);
	  		}
	  	$lastpos=$hpos+1;
	  	$hpos=strpos($content,"a href",$lastpos);
	  	}
		}
	return $content; 
	}


function tnp_block_init() {
	// Register our block editor script.
	wp_register_script(
		'page-previews-block',
		plugins_url( 'js/page-previews-block.js', __FILE__ ),
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor' )
	);
	// Register our block, and explicitly define the attributes we accept.
	register_block_type( 'tnp/page-previews-block', array(
		'attributes'      => array(
			'url' => array(
				'type' => 'string',
				'default' => '',
			),
			'partialURL' => array(
				'type' => 'string',
				'default' => '',
			),
			'size' => array(
				'type' => 'string',
				'default' => '400',
			),
			'align' => array(
				'type' => 'radio',
				'default' => 'center',
			),
			'content' => array(
				'type' => 'array',
				'source' => 'children',
				'selector' => 'p',
				'default' => page_previews_render( array() ),
			),
			'linkstate' => array(
				'type' => 'radio',
				'default' => 'false',
			),
			'linktarget' => array(
				'type' => 'radio',
				'default' => 'false',
			),
			'linkurl' => array(
				'type' => 'string',
				'default' => '',
			),
		),
		'editor_script'   => 'page-previews-block', // The script name we gave in the wp_register_script() call.
		'render_callback' => 'page_previews_render',
	) );
}
add_action( 'init', 'tnp_block_init' );

function page_previews_render($atts) {
    extract(shortcode_atts(array(
				'url' => 'https://e4websolutions.com',
	      'size' => '400',
	      'align' => 'center',
	      'linkstate' => 'false',
	      'linktarget' => 'false',
	      'linkurl' => ''
    ), $atts));
    
    $outerstyle="";
    $innerstyle="";
    
    if ( $align=="left" ) {
     	$outerstyle.="text-align:left;";
    }

    if ( $align=="center" ) {
     	$outerstyle.="margin:auto;";
     	$innerstyle.="margin:auto;width:".$size."px;";
    }

    if ( $align=="right" ) {
     	$outerstyle.="text-align:right;";
    }

		if ( $outerstyle!="") $outerstyle = " style='".$outerstyle."' ";
		if ( $innerstyle!="") $innerstyle = " style='".$innerstyle."' ";

    $thumbcode='<div class="tnp-outer" '.$outerstyle.' ><div class="tnp-wrapper" '.$innerstyle.' >';
    
    
    if ($linkstate=='true') {
			if ( $linkurl=="" ) $linkurl=$url;
			$thumbcode .= '<a href="'.$linkurl.'" class="preview-block-link" ';
			if ( $linktarget=="true" ) $thumbcode .= ' target="_blank" ';
			$thumbcode .= '>';
		}
		
    $thumbcode .= '<img src="http://s.wordpress.com/mshots/v1/'.urlencode($url).'?w='.$size.'">';

    if ($linkstate=='true') {
			$thumbcode .= '</a>';
		}
		    
    $thumbcode .= '</div></div>';
     
    return $thumbcode;
}

function tnptag_func($atts, $content='') {
     extract(shortcode_atts(array(
	      'size' => '200',
	      'cut' => '0',
	      'full' => '',
	      'update' => ''
     ), $atts));
     
     $thumbcode="<img src='".get_option('tnp_url').urlencode($url)."?w=".$size."'>";
		 
     
     return $thumbcode;
}
add_shortcode('tnptag', 'tnptag_func');

function tnp_init() {
	if ( 	get_option('tnp_filter_scope')=="" ) {
		update_option('tnp_url', 'http://s.wordpress.com/mshots/v1/');
		update_option('tnp_filter_scope', 'all');
		update_option('tnp_filter_location', 'all');
		update_option('tnp_popup_style', 'snapr');
		update_option('tnp_popup_size', '400');
	}
	

}

register_activation_hook( __FILE__, 'tnp_init' );

function tnp_admin_page() {
   global $wpdb;
    include 'thumbnailspro-admin.php';
}

function tnp_admin_actions()
{
    add_options_page("ThumbnailsPro", "ThumbnailsPro", 1,"ThumbnailsPro", 'tnp_admin_page');
}
 
add_action('admin_menu', 'tnp_admin_actions');


function tnp_footer() {
	if (get_option('tnp_url')=='') {
		update_option('tnp_url', 'http://s.wordpress.com/mshots/v1/');
	}
	if (get_option('tnp_filter_location')=='all') {
		print "<script>var thumb_mode='".get_option('tnp_filter_scope')."';</script>\n";
		print "<script>var thumb_size='".get_option('tnp_popup_size')."';</script>\n";
	}
	print "<script>var tnp_filter_scope='".get_option('tnp_filter_scope')."';</script>\n";
	print "<script>var tnp_filter_location='".get_option('tnp_filter_location')."';</script>\n";
  print "<script type='text/javascript'>thumbnailspro_tnp_url='".get_option('tnp_url')."';</script>\n";
	print "<div id='fdImageThumb' class='leftBottom' ><img alt='preview' id='fdImage' src=''></div>\n";
}

add_action('wp_footer', 'tnp_footer');

// Filter Functions with Hooks
function tnp_mce_button() {
	global $pagenow;

    
  // Check if user have permission
  if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
    return;
  }
  // Check if WYSIWYG is enabled
  if ( 'true' == get_user_option( 'rich_editing' ) ) {
		print "<script>var thumb_size='".get_option('tnp_popup_size')."';</script>\n";
    add_filter( 'mce_external_plugins', 'tnp_tinymce_plugin' );
    add_filter( 'mce_buttons', 'tnp_register_mce_button' );
  }
}
add_action('admin_head', 'tnp_mce_button',99);

// Function for new button
function tnp_tinymce_plugin( $plugin_array ) {
  $plugin_array['tnp_mce_button'] =  WP_PLUGIN_URL.'/wordpress-page-previews-screenshots-plugin/shortcode.js';
  return $plugin_array;
}

// Register new button in the editor
function tnp_register_mce_button( $buttons ) {
  array_push( $buttons, 'tnp_mce_button' );
  return $buttons;
}


?>
