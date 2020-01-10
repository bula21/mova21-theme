<?php /* Template Name: FAQ */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
    <div class="container mod-faq">
        <div class="row">
            <div class="col-12">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="wysiwyg">
					<?php the_content(); ?>
                </div>
            </div>
        </div>
        <div class="row">
			<?php
			if ( have_rows( 'faqs' ) ):
				while ( have_rows( 'faqs' ) ) : the_row();
					get_template_part( 'template-parts/collapse', 'items' );
				endwhile;

			else :

				// no rows found

			endif;
			?>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="wysiwyg">
					<?php the_field( 'more-content' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
