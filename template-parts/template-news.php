<?php
/**
 * template part for news element on home
 */
?>

<div class="col-12 col-md-4 news-text">
    <div class="news-image">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'medium' );
		} else {
			echo '<img src="' . BULA_URL_TO_THEME . '/img/fallback.jpg' . '" class="fallback">';
		}
		?>
    </div>
    <div class="post-date"><?php the_date(); ?></div>
    <h3 class="post-title"><?php the_title(); ?></h3>
    <div class="wysiwyg">
		<?php the_excerpt(); ?>
        <a class="post-link" href="<?php the_permalink(); ?>">→</a>
    </div>
</div>
