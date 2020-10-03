<?php
/**
 * template part for news element on home
 */
?>

<div class="news-text mod-news-template news-bloc">
   <a class="post-link" href="<?php the_permalink(); ?>">
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
    <div class="wysiwyg post-content">
		<?php the_excerpt(); ?>
    </div>
    </a> 
</div>
