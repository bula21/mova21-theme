<?php /* Template Name: Content */ ?>

<?php is_rest() ? : get_header(); ?>

<?php if ( have_posts() ):
	while ( have_posts() ):
		the_post(); ?>
        <div class="container mod-content">
			<?php
			if ( have_rows( 'content_elemente' ) ):
				$id = 0;
				while ( have_rows( 'content_elemente' ) ):
					the_row();
					$id ++;
					if ( get_sub_field( 'hide_block' ) ) {
						continue;
					}
					?>
                    <section id="element-<?php echo $id; ?>">

						<?php if ( get_row_layout() == 'text-bild' ): ?>
                            <div class="content-element--text-bild">
								<?php $reverse = get_sub_field( 'reihenfolge' ) == 't2b' ? '' : 'flex-row-reverse'; ?>
                                <div class="row no-gutters <?php echo $reverse; ?>">
                                    <div class="col-12 col-md-6 bg-<?php the_sub_field( 'hintergrundfarbe' ); ?>">
                                        <div class="text">
                                            <h1>
												<?php the_sub_field( 'title' ); ?>
                                            </h1>
                                            <p>
												<?php the_sub_field( 'text' ); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
										<?php
										$image = get_sub_field( 'bild' );
										if ( $image ) {
											$classlist = 'content-image';
											$classlist .= get_sub_field( 'bula_image_contain' ) ? ' image-contain' : '';

											if ( $link = get_sub_field( 'link' ) ) {
												echo '<a class="text-bild--link" href="' . $link['url'] . '" target="' . $link['target'] . '">';
												the_aid_picture_tag( $image['id'], 'bula-fullwidth', 'bula-fullwidth_2x', $classlist );
												echo '</a>';
											} else {
												the_aid_picture_tag( $image['id'], 'bula-fullwidth', 'bula-fullwidth_2x', $classlist );
											}
										}
										?>
                                    </div>
                                </div>
                            </div>
						<?php
                        elseif ( get_row_layout() == 'fp-text' ): ?>
                            <div class="content-element--fp-text">
								<?php the_sub_field( 'fp-text' ); ?>
                            </div>
						<?php
                        elseif ( get_row_layout() == 'news-posts' ): ?>
                            <div class="content-element--news-posts mod-news">
                                <div class="content-news">
                                    <div class="news-grid">
                                        <div class="grid-sizer"></div>
										<?php
										$query = new WP_Query(
											array(
												'post_type'      => 'post',
												'cat'            => get_sub_field( 'post_category' ),
												'posts_per_page' => get_sub_field( 'limit_posts' ),
											)
										);
										if ( $query->have_posts() ) {
											while ( $query->have_posts() ) {
												$query->the_post(); ?>
                                                <div class="news-grid-item">
													<?php get_template_part( 'template-parts/template', 'news' ); ?>
                                                </div>
											<?php }
										}
										wp_reset_query();
										?>
                                    </div>
                                </div>
                            </div>
						<?php
                        elseif ( get_row_layout() == 'header-1col' ):
							if ( have_rows( 'header-1col' ) ):
								while ( have_rows( 'header-1col' ) ):
									the_row();
									?>
                                    <div class="header one-col bg-<?php the_sub_field( 'hintergrundfarbe' ); ?>">
                                        <div class="infos">
                                            <h1 class="post-title"><?php the_title(); ?></h1>
                                            <div class="text-intro"><?php the_sub_field( 'text-header' ); ?></div>
                                        </div>
                                    </div>
								<?php
								endwhile;
							endif;
                        elseif ( get_row_layout() == 'header-2col' ):
							if ( have_rows( 'header-2col' ) ):
								while ( have_rows( 'header-2col' ) ):
									the_row();
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
											<?php if ( $image = get_sub_field( 'img-header' ) ) : ?>
                                                <img src="<?php echo $image['url']; ?>">
											<?php endif; ?>
                                        </div>
                                    </div>
								<?php
								endwhile;
							endif;
                        elseif ( get_row_layout() == 'farb-blocke' ): ?>
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
										<?php while ( have_rows( 'blocke' ) ):
											the_row(); ?>
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
									while ( have_rows( 'timeline-items' ) ):
										the_row(); ?>
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
									<?php endwhile; ?>
								<?php endif; ?>
                            </div>
						<?php elseif ( get_row_layout() == 'person-contact' ):
							if ( have_rows( 'person' ) ):
								while ( have_rows( 'person' ) ):
									the_row();
									$contact_img = get_sub_field( 'image' );
									?>
                                    <div class="contact">
										<?php if ( $contact_img ): ?>
                                            <div class="img-container">
                                                <img src="<?php echo $contact_img['sizes']['large']; ?>" alt="<?php _e( $contact_img['alt'] ); ?>">
                                            </div>
										<?php endif; ?>
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
								<?php endwhile;
							else:
							endif;

                        elseif ( get_row_layout() == 'text-spalten' ): ?>
                            <div class="content-element--text-spalten">
                                <div class="col-12 spalte-element bg-<?php the_sub_field( 'hintergrundfarbe' ); ?>">
									<?php if ( get_sub_field( 'title' ) ): ?>
                                        <div>
                                            <h2><?php the_sub_field( 'title' ); ?></h2>
                                        </div>
									<?php
									endif; ?>
                                    <div class="column-count-small-reset" style="column-count: <?php the_sub_field( 'anzahl_spalten' ); ?>">
										<?php the_sub_field( 'text' ); ?>
                                    </div>
									<?php if ( $link = get_sub_field( 'button' ) ): ?>
                                        <a class="btn-black" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
											<?php echo $link['title']; ?>
                                        </a>
									<?php
									endif; ?>
                                </div>
                            </div>

							<?php if ( have_rows( 'blocke' ) ): ?>
                                <div class="row masonry">
									<?php while ( have_rows( 'blocke' ) ):
										the_row(); ?>
                                        <div class="col-12 col-md-6 farb-block-wrapper masonry-item">
                                            <div class="farb-block bg-<?php the_sub_field( 'hintergrundfarbe' ); ?>">
                                                <div class="title">
													<?php if ( $image = get_sub_field( 'icon' ) ): ?>
                                                        <div class="icon">
                                                            <img src="<?php echo $image['url']; ?>">
                                                        </div>
													<?php
													endif; ?>
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

						<?php
                        elseif ( get_row_layout() == 'sidebar-blocks' ): ?>
                            <div class="content-element--sidebar-blocks">
                                <div class="contact">
									<?php
									if ( have_rows( 'elements' ) ):
										while ( have_rows( 'elements' ) ):
											the_row();
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
										<?php endwhile; ?>
									<?php endif; ?>
                                </div>
                                <div class="timeline">
									<?php
									if ( have_rows( 'timeline-items' ) ):
										while ( have_rows( 'timeline-items' ) ):
											the_row();
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
										<?php endwhile; ?>
									<?php endif; ?>
                                </div>
                            </div>
						<?php
                        elseif ( get_row_layout() == 'gallery-blocks' ): ?>
                            <div class="content-element--gallery" data-loading="<?php _e( 'Bild wird geladen', 'bula21' ); ?>"
                                 data-error="<?php _e( 'Es gab einen Fehler beim laden des Bildes.', 'bula21' ); ?>">
                                <div class="row">
									<?php if ( have_rows( 'bilder' ) ):
										while ( have_rows( 'bilder' ) ):
											the_row(); ?>
                                            <div class="col-12 col-md-4 col-lg-3">
												<?php
												$image = get_sub_field( 'bild' );
												$link  = get_sub_field( 'link' );
												$alt   = get_post_meta( $image['id'], '_wp_attachment_image_alt', true );
												if ( $link ) {
													echo sprintf( '<a class="gallery-image-link" href="%s" target="%s">', $link['url'] ?? '', $link['target'] ?? '' );
													the_aid_picture_tag( $image['id'], 'bula-gallery-preview', 'bula-gallery-preview_2x', 'gallery-item has-link' );
													echo '</a>';
												} else {
													the_aid_picture_tag( $image['id'], 'bula-gallery-preview', 'bula-gallery-preview_2x', 'gallery-item' );
												}
												if ( ! empty( $alt ) ) {
													echo '<p class="gallery-caption">' . $alt . '</p>';
												}
												?>
                                            </div>
										<?php endwhile; ?>
									<?php endif; ?>
                                </div>
                            </div>
						<?php endif; ?>
                    </section>
				<?php endwhile; ?>
			<?php endif; ?>
        </div>
	<?php endwhile; ?>
<?php endif; ?>

<?php is_rest() ? : get_footer(); ?>
