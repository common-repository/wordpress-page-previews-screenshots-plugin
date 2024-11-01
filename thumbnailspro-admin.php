<style>
ol {
    counter-reset: list;
}
ol > li {
    list-style: none;
    position: relative;
}
ol > li:before {
    counter-increment: list;
    content: counter(list, lower-alpha) ") ";
    position: absolute;
    left: -1.4em;
}

.method {
	max-width: 900px;
    cursor: pointer;
}

.method h3 {
	background-color: #A9A9A9;
	padding-top: 10px;
	padding-bottom: 15px;
	padding-left: 5px;
	padding-right: 5px;
}

.method-arrow {
    float: right;
    height: 32px;
    width: 32px;
    position: relative;
    top: -5px;
}

.method-arrow.closed {
	
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAOwgAADsIBFShKgAAAABl0RVh0U29mdHdhcmUAcGFpbnQubmV0IDQuMC4yMfEgaZUAAAC+SURBVFhHxc5BCsIwEIXhnjYUuhHpymMUwQv1XjEDgiB/0mTyGBcfgT+LeUvO+a8wRsIYCWMkjJEwtuzbozz854GxZl9TTqlYdSMw1rzunwHCERhb1CMwXlGOwNhDNQJjL8UIjCNmR2AcNTMCo4d3BEYvzwiMXudx+w4ofv8JRo/zOX7cYBzlPW4wjpg5bjD2mj1uMPZQHDcYr6iOG4wtyuMGY436uMFYoz5uMLYojxuMkTBGwhgJYySMcfLyBk+wvWKk/CM/AAAAAElFTkSuQmCC);
}

.method-arrow.open {
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAOwgAADsIBFShKgAAAABl0RVh0U29mdHdhcmUAcGFpbnQubmV0IDQuMC4yMfEgaZUAAADSSURBVFhHxc5BCsIwFEXRrjYImYg47Kw7cAGCE3fgNtxSzC8K/vTWJik8B2eQW/G/IaX0VxiVMCphVMKohFEJoxJGJYxKGJUwKmE09zGkELLTJT/5N7WO9j/Z+frMT//NPb5Nh/eAnSM+x2fTIyf/3T1Ke0e44+Mtp+VvFqHUO6LmuMFYah1Re9xgJLUjWo4bjGu2RrQeNxh/WRvRc9xg3OJGxJhi53GDsYYb0XncYKzlRnQcNxhbzCM6jxuMShiVMCphVMKohFEJoxJGJYw6aXgBxjW7XOu5VUcAAAAASUVORK5CYII=);
}

.method-content.closed {
    display: none;
}

.method-content.open {
    display: block;
}

.section {
	max-width: 900px;
    cursor: pointer;
}

.section h4 {
	background-color: #A9A9A9;
	padding-top: 5px;
	padding-bottom: 8px;
	padding-left: 5px;
	padding-right: 5px;
	font-weight: 700;
}

.section-arrow {
    float: right;
    height: 32px;
    width: 32px;
    position: relative;
    top: -5px;
}

.section-arrow.closed {
	
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAOwgAADsIBFShKgAAAABl0RVh0U29mdHdhcmUAcGFpbnQubmV0IDQuMC4yMfEgaZUAAAC+SURBVFhHxc5BCsIwEIXhnjYUuhHpymMUwQv1XjEDgiB/0mTyGBcfgT+LeUvO+a8wRsIYCWMkjJEwtuzbozz854GxZl9TTqlYdSMw1rzunwHCERhb1CMwXlGOwNhDNQJjL8UIjCNmR2AcNTMCo4d3BEYvzwiMXudx+w4ofv8JRo/zOX7cYBzlPW4wjpg5bjD2mj1uMPZQHDcYr6iOG4wtyuMGY436uMFYoz5uMLYojxuMkTBGwhgJYySMcfLyBk+wvWKk/CM/AAAAAElFTkSuQmCC);
}

.section-arrow.open {
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAOwgAADsIBFShKgAAAABl0RVh0U29mdHdhcmUAcGFpbnQubmV0IDQuMC4yMfEgaZUAAADSSURBVFhHxc5BCsIwFEXRrjYImYg47Kw7cAGCE3fgNtxSzC8K/vTWJik8B2eQW/G/IaX0VxiVMCphVMKohFEJoxJGJYxKGJUwKmE09zGkELLTJT/5N7WO9j/Z+frMT//NPb5Nh/eAnSM+x2fTIyf/3T1Ke0e44+Mtp+VvFqHUO6LmuMFYah1Re9xgJLUjWo4bjGu2RrQeNxh/WRvRc9xg3OJGxJhi53GDsYYb0XncYKzlRnQcNxhbzCM6jxuMShiVMCphVMKohFEJoxJGJYw6aXgBxjW7XOu5VUcAAAAASUVORK5CYII=);
}

.section-content.closed {
    display: none;
}

.section-content.open {
    display: block;
}


</style>
<script>
jQuery( function($) {
	$(document).ready( function() {
		  $('.method').on("click", function() {
	  	var termid = $(this).data('relatedid');
	  	if ( $('#method-arrow-' + termid).hasClass('closed') ) {
				$('#method-arrow-' + termid).removeClass('closed').addClass('open');
				$('#method-content-' + termid).removeClass('closed').addClass('open');
	  	} else {
				$('#method-arrow-' + termid).removeClass('open').addClass('closed');
				$('#method-content-' + termid).removeClass('open').addClass('closed');
  		}
  	}); 

		  $('.section').on("click", function() {
	  	var termid = $(this).data('relatedid');
	  	if ( $('#section-arrow-' + termid).hasClass('closed') ) {
				$('#section-arrow-' + termid).removeClass('closed').addClass('open');
				$('#section-content-' + termid).removeClass('closed').addClass('open');
	  	} else {
				$('#section-arrow-' + termid).removeClass('open').addClass('closed');
				$('#section-content-' + termid).removeClass('open').addClass('closed');
  		}
  	}); 

 	}); 
}); 
</script>
<?php
if ( ( isset($_POST['tnp_update']) ) && ( $_POST['tnp_update']=='true' ) ) {
	update_option('tnp_url',$_POST['tnp_url']);
	update_option('tnp_filter_location',$_POST['tnp_filter_location']);
	update_option('tnp_filter_scope',$_POST['tnp_filter_scope']);
	update_option('tnp_popup_style',$_POST['tnp_popup_style']);
	update_option('tnp_popup_size',$_POST['tnp_popup_size']);
	}
if ( ( isset( $_GET['tnp_url'] ) ) && ( $_GET['tnp_url']!="" ) ) update_option('tnp_url',urldecode($_GET['tnp_url']));
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.1/swfobject.js"></script>
<script type="text/javascript" src="http://thumbnailspro.com/highslide/highslide-with-html.js"></script>
<script type="text/javascript" src="http://thumbnailspro.com/highslide/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="http://thumbnailspro.comhighslide/highslide.css" />
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="http://thumbnailspro.com/highslide/highslide-ie6.css" />
<![endif]-->
<h1>ThumbnailsPRO</h1>
<h4>Display Screenshots &amp; Mouse-Over Previews</h4>

<hr />
<p style="text-align: left;"><em>This plugin is developed by <a href="http://e4websolutions.com">e4WebSolutions, Inc</a>.</em></p>
This plugin allows you to show some thumbnail / screenshot previews of any URL.

You can do the following:

1) Insert screenshot images in any posts or pages
2) Display mouse-over previews of any url

<hr />


<h2>SETTINGS</h2>
<div class="wrap">
	    <form method="post" action="">
    	<input type='hidden' name='tnp_update' value='true'>
      <input type="hidden" name="tnp_url" value="<?= get_option('tnp_url'); ?>">
      <input type="hidden" name="tnp_popup_style" value="<?= get_option('tnp_popup_style'); ?>">



<table class="optiontable" cellpadding=5>
<tbody>
<tr>
<th style="text-align: left;" nowrap="nowrap">LOCATION<br>
Where to show mouse-over thumbnail previews:</th>
<td>
	<input name="tnp_filter_location" type="radio" value="all"  <?php if (get_option('tnp_filter_location')=='all') print " checked "; ?> /> All&nbsp;
	<input name="tnp_filter_location" type="radio" value="posts" <?php if (get_option('tnp_filter_location')=='posts') print " checked "; ?> /> Posts / Pages only&nbsp;
	<input name="tnp_filter_location" type="radio" value="none" <?php if (get_option('tnp_filter_location')=='none') print " checked "; ?> /> None&nbsp;
	</td>
</tr>
<tr>
<td></td>
</tr>
<tr>
<th style="text-align: left;" nowrap="nowrap">RULE<br>
Show the mouse-over previews for:</th>
<td>
	<input name="tnp_filter_scope" type="radio" value="all" <?php if (get_option('tnp_filter_scope')=='all') print " checked "; ?> /> All URLs&nbsp;
	<input name="tnp_filter_scope" type="radio" value="internal" <?php if (get_option('tnp_filter_scope')=='internal') print " checked "; ?> /> Internal URLs only&nbsp;
	<input name="tnp_filter_scope" type="radio" value="external" <?php if (get_option('tnp_filter_scope')=='external') print " checked "; ?> /> External URLs only</td>
</tr>
<tr>
<td></td>
</tr>
<tr>
<th style="text-align: left;" nowrap="nowrap">SIZE<br>
Mouse-over preview size:</th>
<td><input name="tnp_popup_size" size="8" type="text" value="<?= get_option('tnp_popup_size'); ?>" width="8/" />px</td>
</tr>
</tbody>
</table>


<p class="submit"><input name="submit" type="submit" value="Save Settings" /></p>
&nbsp;
    </form>
    
</div>
<?php
$wpreturn=urlencode("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
?>

<hr />

<h2>INSTRUCTIONS</h2>
<h4>There are 2 methods to use this plugin:</h4>

<div class="method" data-relatedid="1">
<h3>METHOD 1 - Show screenshots on mouse-over of links
<div id="method-arrow-1" class="method-arrow closed"></div>
</h3>
</div>
<div id="method-content-1" class="method-content closed">
In the <strong><em>LOCATION</em></strong> settings above, you can chose to display these mouse-over previews
<br>
<pre>
a) everywhere (ALL)
b) ONLY on posts and pages
c) Nowhere (none)
</pre>
<br>

in the <strong><em>RULE</em></strong> settings, you can choose to show the previews for
<br>
<pre>
A) ALL urls (any links will show the mouse-over preview)
B) Internal URLs only (only links pointing to urls WITHIN this website/domain will show the previews)
C) External URLs only (only links pointing to urls OUTSIDE this website/domain will show the previews)
</pre>
<br>
Here is how the mouse-over previews look:<br>
<img class="alignnone wp-image-30621" src="https://office.e4websolutions.com/wp-content/uploads/2018/11/2018-11-25_2125-1024x732.png" alt="" width="700" height="500" />
</div>

<br>

<div class="method" data-relatedid="2">
<h3>METHOD 2 - Insert Screenshot images within posts or pages
<div id="method-arrow-2" class="method-arrow closed"></div>
</h3>
</div>

<div id="method-content-2" class="method-content closed">
<p>You can insert screenshot images within blog posts or pages in 2 ways</p>


<div class="section" data-relatedid="1">
<h4>1) - A - Via the CLASSIC EDITOR ( <em>prior to WordPress version 5.0</em> )
<div id="section-arrow-1" class="section-arrow closed"></div>
</h4>
</div>

<div id="section-content-1" class="method-content closed">
<p><strong>You will see a button called "TNP":</strong></p>
<img class="alignnone wp-image-30622" src="https://office.e4websolutions.com/wp-content/uploads/2018/11/wysiwyg-button-1024x833.png" alt="" width="700" height="570" />

<br>

When you click that button, you will see a settings popup:
<br>
<img class="alignnone wp-image-30623" src="https://office.e4websolutions.com/wp-content/uploads/2018/11/wysiwyg-popup-1024x1012.png" alt="" width="700" height="692" />
<br>
<p>In the URL to Capture field, you enter the url you want to capture a screenshot of
In the Thumbnail Size setting, you enter the width in pixels, default is 400px</p>

<p>This will insert insert the shortcode to display the screenshots with the settings you chose.</p>
<p>This brings up the other method of using the shortcode directly instead of the WYSIWYG button:</p>
</div>

<div class="section" data-relatedid="2">
<h4>1) - B - Via the GUTENBERG editor ( <em>WordPress version 5.0+</em> )
<div id="section-arrow-2" class="section-arrow closed"></div>
</h4>
</div>

<div id="section-content-2" class="method-content closed">

You will see a new Block called "URL Preview / Screenshot" under the "Widgets" Blocks</strong>
<br>
<img class="alignnone wp-image-30630" src="https://office.e4websolutions.com/wp-content/uploads/2018/12/gutenberg-1-1024x794.png" alt="" width="700" height="543" />
<br>
<p>When you add the block, you will see the option to enter the URL to preview, once you click embed, the screenshot will be generated</p>
<p>(you might not see the screenshot immediately while it's being generated, in which case it will appear shortly after you update the page).</p>
<p>You can also set the sizing, alignment and create a link with the image to the URL (you can also edit the URL) from the block settings on the right-panel.</p>
<br>
<img class="alignnone wp-image-30631" src="https://office.e4websolutions.com/wp-content/uploads/2018/12/gutenberg-2-1024x661.png" alt="" width="700" height="452" />
</div>

<div class="section" data-relatedid="3">
<h4>2) Via Shortcode
<div id="section-arrow-3" class="section-arrow closed"></div>
</h4>
</div>

<div id="section-content-3" class="method-content closed">
The shortcode is very simple and can be inserted in any posts or pages:
<br>
<p>Example usage of shortcode:</p>
[tnptag size=400]http://yahoo.com[/tnptag]
<p>size=400 means that the screenshot will be 400px in size</p>
<p>The url between the opening and closing tag of the shortcode is the url of the screenshot that will be displayed.</p>

<p>That's it :) Simply replace the '400' value with the size you want and the url with the url you want to display a screenshot of</p>

<br>
<p>This is an example what it looks like:</p>
<br>
<img class="alignnone wp-image-30624" src="https://office.e4websolutions.com/wp-content/uploads/2018/11/2018-11-25_2151-1024x994.png" alt="" width="700" height="680" />
</div>

</div>
