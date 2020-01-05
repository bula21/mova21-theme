<?php
/**
 * template part for news element on home
 */
?>

    <div class="row content-news">
        <div class="col-12 col-md-6 bg-blue">
            <h3 class="post-title"><?php the_title(); ?></h3>
            <div class="wysiwyg">
				<?php the_content(); ?>
            </div>
        </div>
        <div class="col-12 col-md-6">
			<?php the_post_thumbnail('large'); ?>
        </div>

    </div>
