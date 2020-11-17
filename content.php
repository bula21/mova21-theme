<?php /* Template Name: Content */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container mod-content">
		<?php
		if ( have_rows( 'content_elemente' ) ):
			while ( have_rows( 'content_elemente' ) ) :
				the_row();
				?>
                <section>
					<?php if ( get_row_layout() == 'text-bild' ): ?>
                        <div class="content-element--text-bild">
							<?php $reverse = get_sub_field( 'reihenfolge' ) == 't2b' ? '' : 'flex-row-reverse'; ?>
                            <div class="row no-gutters <?php echo $reverse; ?>">
                                <div class="col-12 col-md-6 bg-<?php the_sub_field( 'hintergrundfarbe' ); ?>">
                                    <div class="text">
                                        <h1>
											<?php
											the_sub_field( 'title' );
											?>
                                        </h1>
                                        <p>
											<?php the_sub_field( 'text' ); ?>
                                        </p>
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

					<?php elseif ( get_row_layout() == 'fp-text' ): ?>
                        <div class="content-element--fp-text">
							<?php the_sub_field( 'fp-text' ); ?>
                        </div>

					<?php elseif ( get_row_layout() == 'header-1col' ):
						if ( have_rows( 'header-1col' ) ):
							while ( have_rows( 'header-1col' ) ) : the_row();
								?>
                                <div class="header oneCol bg-<?php the_sub_field( 'hintergrundfarbe' ); ?>">
                                    <div class="infos">
                                        <h1 class="post-title"><?php the_title(); ?></h1>
                                        <div class="text-intro"><?php the_sub_field( 'text-header' ); ?></div>
                                    </div>
                                </div>
							<?php
							endwhile;
						endif;
						?>

					<?php elseif ( get_row_layout() == 'header-2col' ):
						if ( have_rows( 'header-2col' ) ):
							while ( have_rows( 'header-2col' ) ) : the_row();
								?>
                                <div class="header bg-<?php the_sub_field( 'hintergrundfarbe' ); ?>">
                                    <div class="infos">
                                        <h1 class="post-title <?php the_sub_field( 'page-title-visibility' ); ?>">
											<?php
											if ( get_sub_field( 'page-title-visibility' ) == "on" ) {
												the_title();
											} ?> </h1>
                                        <div class="text-intro"><?php the_sub_field( 'text-header' ); ?></div>
										<?php if ( $link = get_sub_field( 'button' ) ): ?>
                                            <a class="btn-black" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
												<?php echo $link['title']; ?>
                                            </a>
										<?php endif; ?>
                                    </div>
									<?php
									if ( get_sub_field( 'hintergrundfarbe' ) == "yellow" ) {
										$secondaryBgColor = "rgb(228, 81, 34)";
									}

									if ( get_sub_field( 'hintergrundfarbe' ) == "red" ) {
										$secondaryBgColor = "rgb(73, 191, 252)";
									}

									if ( get_sub_field( 'hintergrundfarbe' ) == "blue" ) {
										$secondaryBgColor = "rgb(254, 233, 52)";
									}
									?>
                                    <div class="illustration" style="background: <?php echo $secondaryBgColor; ?>">
										<?php
										$image = get_sub_field( 'img-header' );
										//                     use the picture tag like this:
										//                         the_aid_picture_tag( $image['id'], 'bula-fullwidth', 'bula-fullwidth_2x', 'content-image' );
										?>
                                        <!--                    or use your own custom img tag like this:-->
                                        <img src="<?php echo $image['url']; ?>">
                                    </div>
                                </div>
							<?php
							endwhile;
						endif;
						?>

					<?php elseif ( get_row_layout() == 'farb-blocke' ): ?>
                        <div class="content-element--farb-bloecke">
                            <div class="row">
                                <div class="col-12">
                                    <div class="intro-title">
                                        <h2><?php the_sub_field( 'title' ); ?></h2>
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
                                                    <h3><?php the_sub_field( 'title' ); ?></h3>
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

                        <div class="timeline">
							<?php
							if ( have_rows( 'timeline-items' ) ):
								while ( have_rows( 'timeline-items' ) ) : the_row(); ?>
                                    <div class="event">
										<?php if ( get_sub_field( 'date' ) ): ?>
                                            <div class="event-date">
												<?php the_sub_field( 'date' ); ?>
                                            </div>
										<?php endif; ?>
										<?php if ( get_sub_field( 'text' ) ): ?>
                                            <div class="event-name">
												<?php the_sub_field( 'text' ); ?>
                                            </div>
										<?php endif; ?>
                                    </div>
								<?php endwhile; endif; ?>
                        </div>


                        <div class="contact-row">
					<?php
                    elseif ( get_row_layout() == 'person' ): ?>
                        <div class="contact">
						<?php if ( have_rows( 'person' ) ):
							while ( have_rows( 'person' ) ) : the_row();
								$contact_img = get_sub_field( 'image' ); ?>
                                <div class="img-container">
                                    <img src="<?php echo $contact_img['sizes']['large']; ?>" alt="<?php _e( $contact_img['alt'] ); ?>">
                                </div>
                                <div class="info-container">
                                    <p class="org-job"><?php the_sub_field( 'job' ); ?></p>
                                    <p class="org-name"> <?php the_sub_field( 'name' ); ?></p>
									<?php if ( get_sub_field( 'contact' ) ): ?>
                                        <p class="org-contact">
                                            <a href="mailto:<?php the_sub_field( 'contact' ); ?>">
												<?php the_sub_field( 'contact' ); ?>
                                            </a>
                                        </p>
									<?php endif; ?>
									<?php if ( $link = get_sub_field( 'person_link' ) ): ?>
                                        <p class="org-link">
                                            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                                        </p>
									<?php endif; ?>
                                </div>
                                </div>
							<?php endwhile; else : endif; ?>
                        </div>


					<?php elseif ( get_row_layout() == 'text-spalten' ): ?>
                        <div class="content-element--text-spalten">
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
                                                <h3><?php the_sub_field( 'title' ); ?></h3>
                                            </div>
                                            <div class="farb-block-content">
												<?php the_sub_field( 'text' ); ?>
                                            </div>
                                        </div>
                                    </div>
								<?php endwhile; ?>
                            </div>
						<?php endif; ?>

					<?php elseif ( get_row_layout() == 'sidebar-blocks' ): ?>
                        <div class="content-element--sidebar-blocks">
                            <div class="contact">
								<?php
								if ( have_rows( 'elements' ) ):
									while ( have_rows( 'elements' ) ) : the_row();
										?>
                                        <div class="contact-bloc">
											<?php if ( $image = get_sub_field( 'bild' ) ): ?>
                                                <div class="contact-img">
                                                    <img src="<?php echo $image['sizes']['medium']; ?>">
                                                </div>
											<?php endif; ?>
                                            <div class="contact-info">
												<?php if ( get_sub_field( 'function' ) ): ?>
                                                    <h2>
														<?php the_sub_field( 'function' ); ?>
                                                    </h2>
												<?php endif; ?>
												<?php if ( get_sub_field( 'name' ) ): ?>
                                                    <h1>
														<?php the_sub_field( 'name' ); ?>
                                                    </h1>
												<?php endif; ?>
												<?php if ( get_sub_field( 'contact-info' ) ): ?>
                                                    <div class="personal-info">
														<?php the_sub_field( 'contact-info' ); ?>
                                                    </div>
												<?php endif; ?>
                                            </div>
                                        </div>
									<?php
									endwhile;
								endif;
								?>
                            </div>
                            <div class="timeline">
								<?php
								if ( have_rows( 'timeline-items' ) ):
									while ( have_rows( 'timeline-items' ) ) : the_row();
										?>
                                        <div class="event">
											<?php if ( get_sub_field( 'date' ) ): ?>
                                                <div class="event-date">
													<?php the_sub_field( 'date' ); ?>
                                                </div>
											<?php endif; ?>
											<?php if ( get_sub_field( 'text' ) ): ?>
                                                <div class="event-name">
													<?php the_sub_field( 'text' ); ?>
                                                </div>
											<?php endif; ?>
                                        </div>
									<?php
									endwhile;
								endif;
								?>
                            </div>
                        </div>
					<?php elseif ( get_row_layout() == 'gallery-blocks' ): ?>
                        <div class="content-element--gallery" data-loading="<?php _e( 'Bild wird geladen', 'bula21' ); ?>" data-error="<?php _e( 'Es gab einen Fehler beim laden des Bildes.', 'bula21' ); ?>">
                            <div class="row">
								<?php if ( have_rows( 'bilder' ) ):
									while ( have_rows( 'bilder' ) ) : the_row(); ?>
                                        <div class="col-12 col-md-4 col-lg-3">
											<?php $image = get_sub_field( 'bild' );
											the_aid_picture_tag( $image['id'], 'bula-gallery-preview', 'bula-gallery-preview_2x', 'gallery-item' );
											?>
                                        </div>
									<?php endwhile;
								endif; ?>
                            </div>
                        </div>
					<?php endif; ?>
                </section>
			<?php endwhile; ?>
		<?php endif; ?>
    </div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
