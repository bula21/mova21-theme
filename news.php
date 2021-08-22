<?php /* Template Name: News */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container mod-news">
    <div class="header">
        <div class="infos">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <?php if ( $intro = get_field( 'intro_text' ) ): ?>
            <div class="post-intro">
                <?php echo nl2br( $intro ); ?>
            </div>
            <?php endif; ?>
            <div class="text-intro"><?php the_field( 'text_intro' ); ?></div>
        </div>
        <!--
        <div class="illustration">
            <img src="" alt="">
        </div>
-->
    </div>

    <?php
		// Content Block - News
		?>
    <div class="content-news">
        <div class="newsGrid">
            <div class="grid-sizer"></div>
             <?php
				    $query = new WP_Query( array( 'post_type' => 'post' ) );
				    if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();?>
            <div class="news-grid">
						<?php get_template_part( 'template-parts/template', 'news' ); ?>
<!--
                <div class="news-bloc">
                </div>
-->
            </div>
             <?php }
				    }
				    wp_reset_query();
				    ?>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
