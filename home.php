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
                    Das Bundeslager der Pfadibewegung Schweiz findet vom 24. Juli bis 7. August 2021
                    im Goms unter dem Motto mova statt
                </div>
            </div>
        </div>


		<?php
		// Content Block 2
		?>
        <div class="home-content-block-2">
            <div class="row">
                <div class="col-12 col-md-4 bg-blue">
                    <img src="<?php echo BULA_URL_TO_THEME; ?>/img/logo_gruppen.svg">
                    <div>Pfadis</div>
                </div>
                <div class="col-12 col-md-4 bg-red">
                    <img src="<?php echo BULA_URL_TO_THEME; ?>/img/logo_helfende.svg">
                    <div>Helfende</div>
                </div>
                <div class="col-12 col-md-4 bg-yellow">
                    <img src="<?php echo BULA_URL_TO_THEME; ?>/img/logo_externe.svg">
                    <div>Externe</div>
                </div>
            </div>
        </div>


		<?php
		// Content Block 3 - News
		?>
        <div class="home-content-block-3">
            <h2>News</h2>
			<?php
			$query = new WP_Query( array( 'post_type' => 'post' ) );
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
