<?php /* Single-Template */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container mod-news_single">
          <div class="header">
        <div class="infos">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="text-intro"><?php the_field( 'text_intro' ); ?></div>
        </div>
<!--
        <div class="illustration">
            <img src="" alt="">
        </div>
-->
    </div>
        <h1 class="post-title"><?php the_title(); ?></h1>
        <div class="wysiwyg">
	        <?php the_content(); ?>
        </div>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>