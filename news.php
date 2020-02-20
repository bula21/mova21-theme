<?php /* Template Name: News */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container mod-news">
    <div class="row">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <div class="wysiwyg">
            <?php the_content(); ?>
        </div>
    </div>

    <?php
		// Content Block - News
		?>
    <div class="home-content-block-3">
        <div class="row">
            <?php
				$query = new WP_Query( array( 'post_type' => 'post' ) );
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part( 'template-parts/template', 'news' );
					}
				}
				wp_reset_query();
				?>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>