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
                            <img src="<?php echo BULA_URL_TO_THEME; ?>/img/instagram.svg" alt="<?php _e('Instagram');?>">
                        </a>
					<?php endif; ?>
					<?php if ( get_field( 'facebook-url', 'option' ) ) : ?>
                        <a class="some-icon" href="<?php the_field( 'facebook-url', 'option' ); ?>" target="_blank" rel="noreferrer">
                            <img src="<?php echo BULA_URL_TO_THEME; ?>/img/facebook.svg" alt="<?php _e('Facebook');?>">
                        </a>
					<?php endif; ?>
					<?php if ( get_field( 'twitter-url', 'option' ) ) : ?>
                        <a class="some-icon" href="<?php the_field( 'twitter-url', 'option' ); ?>" target="_blank" rel="noreferrer">
                            <img src="<?php echo BULA_URL_TO_THEME; ?>/img/twitter.svg" alt="<?php _e('Twitter');?>">
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
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
