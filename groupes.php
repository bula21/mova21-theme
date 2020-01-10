<?php /* Template Name: Groupes */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
    <div class="container mod-groupes">
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
			if ( have_rows( 'timeline' ) ):
				while ( have_rows( 'timeline' ) ) : the_row();
					?>
                    <div class="col-2">
						<?php the_sub_field( 'date' ); ?>
                    </div>
                    <div class="col-8">
						<?php the_sub_field( 'timeline-text' ); ?>
                    </div>
                    <div class="col-2">
						<?php
						if ( $link = get_sub_field( 'timeline-link' ) ) {
							?>
                            <a href="<?php echo $link['url']; ?>" class="btn btn-primary">
								<?php echo $link['title']; ?>
                            </a>
							<?php
						}
						?>
                    </div>
				<?php

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
