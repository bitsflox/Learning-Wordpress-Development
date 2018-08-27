<?php 

/*
Plugin Name: dupe_cop
*/


// Global


$wpdupecop_options=get_option('wpdupecopsetting');
// Original Article

$original =  $wpdupecop_options['original'];
//Span Article

$rewrite = $wpdupecop_options['rewrite'];
// compare article
$wp_dupecopfunction =similar_text($original, $rewrite, $result);

// Admin page

function wp_dupe_cop_page(){
	global $wpdupecop_options;
	global $result;
ob_start();?>
<div class="wrap">
	<form action="options.php" method="POST">
	<?php settings_fields('wpdupecopgroup');?>
		<h2>Dupe Cop Settings</h2>
<p>
	<h3>Paste Orginal Article</h3>
</p>
<textarea name="wpdupecopsetting[original]" rows="20" cols="100"><?php echo $wpdupecop_options[original];?></textarea>

<p>
	<h3>Re-Write Article</h3>
</p>
<textarea name="wpdupecopsetting[rewrite]" rows="20" cols="100"><?php echo $wpdupecop_options[rewrite];?></textarea>
<p><input type="submit" class="button-primary" value="Compare spum Articles"/>
<input type="button" class="button" value="<?php echo $result.'%';?>"/>
</p>
	</form>

</div>
<?php 
echo ob_get_clean();
}

// Admin tab

function wp_dupe_cop_tab(){
	add_options_page('wp dupecop','WP_Dupecop','manage_options','wpdupecop','wp_dupe_cop_page');
}
add_action('admin_menu','wp_dupe_cop_tab');


// Register 

function wp_dupe_cop_setting(){
	register_setting('wpdupecopgroup','wpdupecopsetting');
}

add_action('admin_init','wp_dupe_cop_setting');
