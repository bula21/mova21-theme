<footer class="mod-footer">
    <div class="container">
        <div class="row">
            <div class="col-6">
				<?php the_field( 'footer-adresse', 'option' ); ?>
            </div>
            <div class="col-6">
                <div class="some-icons">
                    <a class="some-icon" href="https://www.instagram.com/" target="_blank">
                        <img src="<?php echo BULA_URL_TO_THEME; ?>/img/instagram.svg">
                    </a>
                    <a class="some-icon" href="https://www.facebook.com/" target="_blank">
                        <img src="<?php echo BULA_URL_TO_THEME; ?>/img/facebook.svg">
                    </a>
                    <a class="some-icon" href="https://www.twitter.com/" target="_blank">
                        <img src="<?php echo BULA_URL_TO_THEME; ?>/img/twitter.svg">
                    </a>
                </div>
                <div class="newsletter">
                    <a href="/newsletter">Newsletter abonnieren</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
