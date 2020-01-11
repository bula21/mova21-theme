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
			$readmore        = array();
			$readmorecounter = 1;
			if ( have_rows( 'timeline' ) ):
				while ( have_rows( 'timeline' ) ) : the_row();
					?>
                    <div class="col-2">
						<?php the_sub_field( 'date' ); ?>
                    </div>
                    <div class="col-8">
						<?php the_sub_field( 'timeline-text' ); ?>
						<?php
						if ( $more = get_sub_field( 'read-more-content' ) ) {
							$readmore[] = array(
								'number'  => $readmorecounter,
								'title'   => get_sub_field( 'read-more-title' ),
								'content' => $more
							);
							echo '<a href="#timeline-item-' . $readmorecounter . '">Read more</a>';
							$readmorecounter++;
						}
						?>
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

		<?php
		foreach ( $readmore as $item ) {
			?>
        <div class="row" id="timeline-item-<?php echo $item['number']; ?>">
            <div class="col-12">
                <h2 class="more-title">
	                <?php echo $item['title']; ?>
                </h2>
                <div class="wysiwyg">
	                <?php echo $item['content']; ?>
                </div>
            </div>
            </div><?php
		}
		?>

    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
