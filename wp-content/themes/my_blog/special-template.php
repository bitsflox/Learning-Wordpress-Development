<?php 

/*  Template Name: Special Layout */

get_header();

if(have_posts()) :
	while (have_posts()) : the_post();?>

	<article class="post page">
	<h2><?php the_title();?></h2>	

		<!-- info-box-->
		<div class="info-box">
			<h4>Disclaimer Title</h4>
			<p>
				WordPress Video Tutorials. WordPress Tutorial for Beginners · Getting Started with WordPress (Installation) · Create WordPress Theme from Scratch.
			</p>
		</div>




	<?php the_content();?>
</article>
<?php endwhile;
	else :

		echo '<p>No content found</p>';

	endif;

	get_footer();
?>