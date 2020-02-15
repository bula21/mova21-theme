<?php /* Template Name: Teilnehmen */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-teilnehmen">
    <div class="row">
       <div class="header">
        <div class="col-12">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
            <p><?php the_field('text_intro'); ?></p>
        </div>
        <div class="choice-container">

    </div>
    </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>