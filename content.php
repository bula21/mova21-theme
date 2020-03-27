<?php /* Template Name: Content */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="mod-content">
		<?php
		if ( have_rows( 'content_elemente' ) ):
			while ( have_rows( 'content_elemente' ) ) : the_row();
				?>
                <section>
					<?php if ( get_row_layout() == 'text-bild' ): ?>
                        <div class="container-fluid content-element--text-bild">
                            <div class="container">
								<?php $reverse = get_sub_field( 'reihenfolge' ) == 't2b' ? '' : 'flex-row-reverse'; ?>
                                <div class="row no-gutters <?php echo $reverse; ?>">
                                    <div class="col-12 col-md-6" style="background-color: <?php the_sub_field( 'hintergrundfarbe' ); ?>;">
                                        <div class="text wysiwyg">
											<?php the_sub_field( 'text' ); ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
										<?php
										$image = get_sub_field( 'bild' );
										the_aid_picture_tag( $image['id'], 'bula-fullwidth', 'bula-fullwidth_2x', 'content-image' );
										?>
                                    </div>
                                </div>
                            </div>
                        </div>


					<?php elseif ( get_row_layout() == 'farb-blocke' ): ?>
                        <div class="container content-element--farb-bloecke">
                            <div class="row">
                                <div class="col-12">
                                    <div class="intro-title">
                                        <h2><?php the_sub_field( 'titel' ); ?></h2>
                                    </div>
                                </div>
                            </div>

							<?php if ( have_rows( 'blocke' ) ): ?>
                                <div class="row masonry">
									<?php while ( have_rows( 'blocke' ) ) : the_row(); ?>
                                        <div class="col-12 col-md-6 farb-block-wrapper masonry-item">
                                            <div class="farb-block bg-<?php the_sub_field( 'hintergrundfarbe' ); ?>">
                                                <div class="title">
													<?php if ( $image = get_sub_field( 'icon' ) ): ?>
                                                        <div class="icon">
                                                            <img src="<?php echo $image['url']; ?>">
                                                        </div>
													<?php endif; ?>
                                                    <h3><?php the_sub_field( 'titel' ); ?></h3>
                                                </div>
                                                <div class="farb-block-content">
													<?php the_sub_field( 'text' ); ?>
                                                </div>
                                            </div>
                                        </div>
									<?php endwhile; ?>
                                </div>
							<?php endif; ?>
                        </div>


					<?php elseif ( get_row_layout() == 'text-spalten' ): ?>
                        <div class="container content-element--text-spalten">
                            <div class="col-12 spalte-element bg-<?php the_sub_field( 'hintergrundfarbe' ); ?>">
								<?php if ( get_sub_field( 'title' ) ): ?>
                                    <div>
                                        <h2><?php the_sub_field( 'title' ); ?></h2>
                                    </div>
								<?php endif; ?>
                                <div class="column-count-small-reset" style="column-count: <?php the_sub_field( 'anzahl_spalten' ); ?>">
									<?php the_sub_field( 'text' ); ?>
                                </div>
								<?php if ( $link = get_sub_field( 'button' ) ): ?>
                                    <a class="btn-black" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
										<?php echo $link['title']; ?>
                                    </a>
								<?php endif; ?>
                            </div>
                        </div>
					<?php endif; ?>
                </section>
			<?php

			endwhile;

		else :
			echo 'emptyness';
			// no rows found

		endif;
		?>
    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
