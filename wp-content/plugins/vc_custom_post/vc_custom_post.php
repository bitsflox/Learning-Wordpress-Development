<?php 
/*
Plugin Name: VC Custom Post
Plugin URI: http://snopytricks.com
Description: This is my Custom post type plugin
Author: Anil Rawat
Version: 1.0
*/

/*********** Custom Post Type***********/


function vc_cpt_register_Article() {
	$labels = array(
		'name'               => __( 'Article'),
		'singular_name'      => __( 'Article'),
		'menu_name'          => __( 'Article'),
		'name_admin_bar'     => __( 'Article'),
		'add_new'            => __( 'Add New'),
		'add_new_item'       => __( 'Add New Article'),
		'new_item'           => __( 'New Article'),
		'edit_item'          => __( 'Edit Article' ),
		'view_item'          => __( 'View Article'),
		'all_items'          => __( 'All Article'),
		'search_items'       => __( 'Search Article'),
		'parent_item_colon'  => __( 'Parent Article:'),
		'not_found'          => __( 'No Article found.'),
		'not_found_in_trash' => __( 'No Article found in Trash.')
	);

	$args = array(
		'labels'             => $labels,
        'description'  		 => __( 'Description.'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Article' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'Article', $args );
}
add_action('init','vc_cpt_register_Article');

/*********** Custom Meta Boxes***********/

function vc_cpt_register_metabox(){
	add_meta_box("cpt-id","Blogger Details","vc_cpt_blogger_call","article","side","high");

	/* Author*/
	add_meta_box("cpt-author","Choose Author","vc_owt_cpt_author_call","article","side","high");
}

add_action('add_meta_boxes','vc_cpt_register_metabox');

function vc_cpt_blogger_call($post){
	?>
<p>
	<label>Name</label>
	<?php $name= get_post_meta($post->ID,"vc_blogger_name", true);?>
	<input type="text" name="txtBloggerName" value="<?php echo $name;?>" placeholder="Name" />
</p>
<p>
	<label>Email</label>
	<?php $email= get_post_meta($post->ID,"vc_blogger_email", true);?>
	<input type="email" name="txtBloggerEmail" placeholder="Email" value="<?php echo $email;?>"/>
</p>

<?php 
}

function vc_cpt_save_values($post_id,$post){
	$txtBloggerName = isset($_POST['txtBloggerName']) ? $_POST['txtBloggerName'] :"";
	$txtBloggerEmail = isset($_POST['txtBloggerEmail']) ? $_POST['txtBloggerEmail'] :"";

	update_post_meta($post_id,"vc_blogger_name",$txtBloggerName);
	update_post_meta($post_id,"vc_blogger_email",$txtBloggerEmail);

}

add_action("save_post","vc_cpt_save_values", 10, 2);


/******Add Cutome Menu Column***********/
function vc_owt_cpt_custom_columns($columns){

	$columns= array(
		"cb" => "<input type='checkbox'/>",
		"title" => "Article Title",
		"pub_email" => "Publisher Email",
		"pub_name" => "Publisher Name",
		"date" => "Date"
	);
	return $columns;
}

add_action("manage_article_posts_columns","vc_owt_cpt_custom_columns");

/******Add Cutome Menu Column DAta***********/

function vc_owt_cpt_custom_columns_data($column, $post_id){

	switch($column){

		case 'pub_email':
			$publisher_email = get_post_meta($post_id, "vc_blogger_email", true);
			echo $publisher_email;
			break;
		case 'pub_name':
			$publisher_name = get_post_meta($post_id, "vc_blogger_name", true);
			echo $publisher_name;
			break;	
	}
}

add_action("manage_article_posts_custom_column", "vc_owt_cpt_custom_columns_data",10, 2);


add_filter("manage_edit-article_sortable_columns","vc_owt_cpt_sortable_columns");

function vc_owt_cpt_sortable_columns($columns){

	$columns['pub_email'] = "owt_email";
	$columns['pub_name'] = "owt_name";
	return $columns;

}

function vc_owt_cpt_author_call($post){
	?>

	<div>
		<label>Select Author</label>
		<select name="ddauthor">
			<?php 
			$users = get_users(array(
				"role" => "author"
			));
$saved_author_id = get_post_meta($post->ID,"author_id_article",true);
			foreach($users as $index => $user){
				$selected = "";
if($saved_author_id==$user->ID){
	$selected ='selected="selected"';
}
			?>
			<option value="<?php echo $user->ID;?>" <?php echo $selected;?>><?php echo $user->display_name;?></option>
		<?php }?>
		</select>
	</div>
<?php 
}

add_action("save_post","vc_owt_save_author_article",10, 2);

function vc_owt_save_author_article($post_id, $post){

	$author_id = isset($_REQUEST['ddauthor'])?intval($_REQUEST['ddauthor']) : "";
	update_post_meta($post_id,"author_id_article",$author_id);
}

add_action("restrict_manage_posts","vc_owt_author_filter_box_layout");

function vc_owt_author_filter_box_layout(){
	global $typenow;
	if($typenow == "article"){
		$author_id =isset($_GET['filter_by_author']) ? intval($_GET['filter_by_author']) : "";
		wp_dropdown_users(array(
			"show_option_none"=> "Select author",
			"role"=> "author",
			"name"=> "filter_by_author",
			"id"=>"ddfilterauthorid",
			"selected"=>$author_id
		));
	}
}

add_filter("parse_query","vc_owt_filter_by_author");

function vc_owt_filter_by_author($query){
	global $typenow;
	global $pagenow;

	$author_id= isset($_GET['filter_by_author']) ? intval($_GET['filter_by_author']) : "";
	if($typenow=="article" && $pagenow=="edit.php" && !empty($author_id)){

		$query->query_vars["meta_key"] = "author_id_article";
		$query->query_vars["meta_value"] = $author_id;
	}
}