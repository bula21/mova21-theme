<div class="mod-special">
    <div id="special-area"></div>
    <div class="special-icon"><i class="icon-play"></i></div>
</div>
<footer class="mod-footer">
    <div class="container">
        <div class="row">
            <div class="col-6">
				<?php the_field( 'footer-adresse', 'option' ); ?>
            </div>
            <div class="col-6">
                <div class="some-icons">
					<?php if ( get_field( 'instagram-url', 'option' ) ) : ?>
                        <a class="some-icon" href="<?php the_field( 'instagram-url', 'option' ); ?>" target="_blank" rel="noreferrer">
                            <img src="<?php echo BULA_URL_TO_THEME; ?>/img/instagram.svg" alt="<?php _e( 'Instagram' ); ?>">
                        </a>
					<?php endif; ?>
					<?php if ( get_field( 'facebook-url', 'option' ) ) : ?>
                        <a class="some-icon" href="<?php the_field( 'facebook-url', 'option' ); ?>" target="_blank" rel="noreferrer">
                            <img src="<?php echo BULA_URL_TO_THEME; ?>/img/facebook.svg" alt="<?php _e( 'Facebook' ); ?>">
                        </a>
					<?php endif; ?>
					<?php if ( get_field( 'twitter-url', 'option' ) ) : ?>
                        <a class="some-icon" href="<?php the_field( 'twitter-url', 'option' ); ?>" target="_blank" rel="noreferrer">
                            <img src="<?php echo BULA_URL_TO_THEME; ?>/img/twitter.svg" alt="<?php _e( 'Twitter' ); ?>">
                        </a>
					<?php endif; ?>
                </div>
                <div class="newsletter">
					<?php if ( get_field( 'newsletter-url', 'option' ) ) : ?>
                        <a href="<?php the_field( 'newsletter-url', 'option' ); ?>" target="_blank"><?php _e( 'Newsletter abonnieren', 'bula21' ); ?></a>
					<?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="partner-wrapper">
					<?php if ( have_rows( 'hauptpartnerlogos', 'options' ) ): ?>
                        <p class="partner-heading"><?php _e( 'Hauptpartnerinnen', 'aid-domain' ); ?></p>
						<?php while ( have_rows( 'hauptpartnerlogos', 'options' ) ) :
							the_row();
							$img = get_sub_field( 'partnerlogo' );
							if ( $link = get_sub_field( 'partnerlogolink' ) ):?>
                                <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>">
                                    <img class="hauptpartner-logo" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                </a>
							<?php else: ?>
                                <img class="hauptpartner-logo" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							<?php endif;
						endwhile;
					endif;
					if ( have_rows( 'partnerlogos', 'options' ) ): ?>
                        <p class="partner-heading"><?php _e( 'Partnerinnen', 'aid-domain' ); ?></p>

						<?php while ( have_rows( 'partnerlogos', 'options' ) ) :
							the_row();
							$img = get_sub_field( 'partnerlogo' );
							if ( $link = get_sub_field( 'partnerlogolink' ) ):?>
                                <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>">
                                    <img class="partner-logo" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                </a>
							<?php else: ?>
                                <img class="partner-logo" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							<?php endif;
						endwhile;
					endif;
					?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
