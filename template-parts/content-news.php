<?php
/**
 * template part for news element on home
 */
?>

<div class="row content-news no-gutters mod-news-template">
    <div class="col-12 col-md-6 news-text">
        <div class="post-date"><?php the_date(); ?></div>
        <h3 class="post-title"><?php the_title(); ?></h3>
        <div class="wysiwyg">
			<?php the_excerpt(); ?>
            <a class="post-link" href="<?php the_permalink(); ?>">→</a>
        </div>
    </div>
    <div class="col-12 col-md-6 news-image">
		<?php
		if ( has_post_thumbnail() ) {

			the_post_thumbnail( 'large' );
		} else {
			echo '<img src="' . BULA_URL_TO_THEME . '/img/fallback.jpg' . '">';
		}
		?>
    </div>

</div>
