<?php /* Template Name: Home */ ?>

<?php is_rest() ? : get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container mod-home">

		<?php
		// Animation part 1
		?>
        <div class="row">
            <div class="home-animation-1 col-12">
                <div class="mod-animation animation" data-animation="home" data-autoplay="true" data-hover="false" data-loop="false"></div>
            </div>
        </div>

		<?php
		// Content Block 1
		?>
        <div class="row">
            <div class="col-12">
                <div class="home-content-block-1">
                    <div class="wysiwyg">
						<?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>


		<?php
		// Content Block 2
		?>
		<?php
		$datetime  = get_field( 'countdowndate', 'options' );
		$is_future = $datetime - 7200 > wp_date( 'U' );
		if ( $datetime && $is_future ): ?>
            <div class="home-content-block-2">
                <div class="row">
                    <div class="col">
                        <h2><?php _e( 'mova für', 'bula21' ); ?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="d-none col-sm-12 d-sm-flex">
                        <a href="<?php _e( 'Link Pfadis', 'bula21' ); ?>" class="block--item">
                            <div class="bg-black mod-animation animation" data-animation="gruppen" data-autoplay="false" data-loop="true" data-hover="true"></div>
                            <div class="bg-black  choice-text"><p class="t-white"><?php _e( 'Pfadis', 'bula21' ); ?></p></div>
                        </a>
                        <a href="<?php _e( 'Link Helfende', 'bula21' ); ?>" class="block--item">
                            <div class="bg-yellow mod-animation animation" data-animation="helfende" data-autoplay="false" data-loop="true" data-hover="true"></div>
                            <div class="bg-yellow choice-text"><p><?php _e( 'Helfende', 'bula21' ); ?></p></div>
                        </a>
                        <a href="<?php _e( 'Link Externe', 'bula21' ); ?>" class="block--item">
                            <div class="bg-blue mod-animation animation" data-animation="externe" data-autoplay="false" data-loop="true" data-hover="true"></div>
                            <div class="bg-blue choice-text"><p><?php _e( 'Externe', 'bula21' ); ?></p></div>
                        </a>
                    </div>
                    <div class="col-12 d-sm-none">
                        <a href="<?php _e( 'Link Pfadis', 'bula21' ); ?>" class="block--item">
                            <div class="bg-red choice-text"><p><?php _e( 'Pfadis', 'bula21' ); ?></p></div>
                        </a>
                        <a href="<?php _e( 'Link Helfende', 'bula21' ); ?>" class="block--item">
                            <div class="bg-yellow choice-text"><p><?php _e( 'Helfende', 'bula21' ); ?></p></div>
                        </a>
                        <a href="<?php _e( 'Link Externe', 'bula21' ); ?>" class="block--item">
                            <div class="bg-blue choice-text"><p><?php _e( 'Externe', 'bula21' ); ?></p></div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="home-content-block-countdown" data-time="<?php echo wp_date( 'U', $datetime ); ?>">
                <div class="row">
                    <div class="col">
                        <h2><?php _e( 'bis ins mova', 'bula21' ); ?></h2>
                    </div>
                </div>
                <div class="container">
                    <div class="row ">
                        <div class="col-12 col-md-3 bg-blue">
                            <div class="number days">

                            </div>
                            <div class="time-entity ">
								<?php _e( 'Tage', 'bula21' ); ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 bg-red">
                            <div class="number hours">

                            </div>
                            <div class="time-entity">
								<?php _e( 'Stunden', 'bula21' ); ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 bg-yellow">
                            <div class="number minutes">

                            </div>
                            <div class="time-entity">
								<?php _e( 'Minuten', 'bula21' ); ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 bg-black font-yellow">
                            <div class="number seconds">

                            </div>
                            <div class="time-entity">
								<?php _e( 'Sekunden', 'bula21' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-content-block-countdown-liftoff d-none">
                <iframe src="https://giphy.com/embed/QxHYo06xOo9cuyaEue"></iframe>
            </div>
		<?php endif; ?>
		<?php
		// Content Block 3 - News
		$query = new WP_Query(
			array(
				'post_type'        => 'post',
				'posts_per_page'   => get_field( 'anzahl_posts' ),
				'category__not_in' => get_field( 'hide_cat' ),
			)
		// maybe add max-number of posts, like:
		// 'posts-per-page' => 3
		// or add category-filter, like
		// 'category_name' => 'news'
		);
		if ( $query->have_posts() ) {
			?>
            <div class="home-content-block-3">
                <h2>News</h2>
				<?php
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'template-parts/content', 'news' );
				}
				?>
                <div class="show-more-news">
                    <a href="<?php _e( '/news', 'bula21' ); ?>"><?php _e( 'Alle News anzeigen', 'bula21' ); ?></a>
                </div>
            </div>
			<?php
		}
		wp_reset_query();
		?>

    </div>
<?php endwhile; endif; ?>
<?php is_rest() ? : get_footer(); ?>
