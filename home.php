<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container mod-home">

		<?php
		// Animation part 1
		?>
        <div class="row">
            <div class="home-animation-1">
                <img src="<?php echo BULA_URL_TO_THEME; ?>/img/animation-tbd.png">
            </div>
        </div>

		<?php
		// Content Block 1
		?>
        <div class="row">
            <div class="col-12 home-content-block-1">
                <div class="wysiwyg">
					<?php the_content(); ?>
                </div>
            </div>
        </div>


		<?php
		// Content Block 2
		?>
        <div class="home-content-block-2">
            <div class="row">
                <div class="col">
                    <h2><?php _e( 'mova für', 'bula21' ); ?></h2>
                </div>
            </div>
            <div class="row">
                <a href="<?php _e( 'Link Pfadis', 'bula21' ); ?>" class="block--item">
                    <div class="mod-animation animation" data-animation="gruppen"></div>
                    <!--<div class="bg-blue">
                        <img src="<?php /*echo BULA_URL_TO_THEME; */ ?>/img/logo_gruppen.svg">
                    </div>-->
                    <div class="bg-black choice-text"><p class="t-white"><?php _e( 'Pfadis', 'bula21' ); ?></p></div>
                </a>
                <a href="<?php _e( 'Link Helfende', 'bula21' ); ?>" class="block--item">
                    <!--<div class="bg-red">
                        <img src="<?php /*echo BULA_URL_TO_THEME; */ ?>/img/logo_helfende.svg">
                    </div>-->
                    <div class="mod-animation animation" data-animation="helfende"></div>
                    <div class="bg-yellow choice-text"><p><?php _e( 'Helfende', 'bula21' ); ?></p></div>
                </a>
                <a href="<?php _e( 'Link Externe', 'bula21' ); ?>" class="block--item">
                    <!--<div class="bg-yellow">
                        <img src="<?php /*echo BULA_URL_TO_THEME; */ ?>/img/logo_externe.svg">
                    </div>-->
                    <div class="mod-animation animation" data-animation="externe"></div>
                    <div class="bg-blue choice-text"><p><?php _e( 'Externe', 'bula21' ); ?></p></div>
                </a>
            </div>
        </div>


		<?php
		// Content Block 3 - News
		?>
        <div class="home-content-block-3">
            <h2>News</h2>
			<?php
			$query = new WP_Query(
				array( 'post_type' => 'post' )
			// maybe add max-number of posts, like:
			// 'posts-per-page' => 3
			// or add category-filter, like
			// 'category_name' => 'news'
			);
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'template-parts/content', 'news' );
				}
			}
			wp_reset_query();
			?>
        </div>
    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
