<?php /* Template Name: Teilnehmen */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-teilnehmen">
    <div class="row">
        <div class="col-12">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
        <div class="intro_container">
            <p><?php the_field('text_intro'); ?></p>
        </div>
        <div class="choice-container">
        <?php
			if ( have_rows( 'participation_choice' ) ):
				while ( have_rows( 'participation_choice' ) ) : the_row(); 
    ?>

        <div class="choice">
            <p><?php the_sub_field('helping_choice'); ?></p>
        </div>
        
        <?php endwhile;

			else :

			endif;
			?>
    </div>
    </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>