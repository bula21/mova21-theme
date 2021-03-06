<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container mod-home">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <div class="wysiwyg">
	        <?php the_content(); ?>
        </div>
    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
