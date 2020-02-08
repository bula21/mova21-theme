<?php /* Template Name: International */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-groupes">
    <div class="col-12">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <div class="wysiwyg">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>