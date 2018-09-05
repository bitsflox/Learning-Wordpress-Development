<?php 
get_header();

  $paged = (get_query_var('page')) ? get_query_var('page') : 1;

query_posts(array(
  'post_type'   => 'article',
  'post_status' => 'publish',
  'order' => 'asc',
  'paged' => $paged,
  'posts_per_page' =>10 
  ));
 
//$vc_articles = new WP_Query( $args );
if(have_posts() ) :
?>

<?php while (have_posts()) : the_post();
	
	?>
	<article class="post <?php if(has_post_thumbnail()){?> has-thumbnail <?php }?>">

<div class="post-thumbnail">
	<a href="<?php the_permalink();?>"><?php the_post_thumbnail('small-thumbnail');?></a>
	</div>

		<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>	
	<p class="post-info"><?php the_time('F j, Y g:i a')?> | by 
	<a href="<?php get_author_posts_url(get_the_author_meta('ID'));?>"><?php the_author();?></a> | Posted in 

	<?php $categories=get_the_category();
$seprator = ", ";
$output = '';

if($categories){

	foreach($categories as $category){

		$output .='<a href="'.get_category_link($category->term_id).'">'.$category->cat_name. '</a>' .$seprator;

	}

	echo trim($output, $seprator);
}
	?>
	</p>

	
	<?php 
if($post->post_excerpt){?>

	<p>
		<?php echo get_the_excerpt();?>
		<a href="<?php the_permalink();?>">Read more&raquo;</a>
	</p>

<?php }else{

	the_content();
}

?>


</article>

<?php endwhile;
	else :

		echo '<p>No content found</p>';

	endif;


 post_pagination();
 
 
 
	get_footer();
?>