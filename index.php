<?php /* Template Name: Seite */ ?>

<?php is_rest()?:get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container mod-something">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <div class="wysiwyg">
	        <?php the_content(); ?>
        </div>
    </div>
<?php endwhile; endif; ?>

<?php is_rest()?:get_footer(); ?>
