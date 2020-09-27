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
        <div class="row">
            <div class="news-bloc" style="height: 450px">
                news 1
            </div>
            <div class="news-bloc" style="height: 560px">
                news 4
            </div>
            <div class="news-bloc" style="height: 600px">
                news 7
            </div>
        </div>
        <div class="row">
            <div class="news-bloc" style="height: 800px">
                news 2
            </div>
            <div class="news-bloc">
                news 5
            </div>
            <div class="news-bloc" style="height: 300px">
                news 8
            </div>
        </div>
        <div class="row">
            <div class="news-bloc">
                news 3
            </div>
            <div class="news-bloc" style="height: 250px">
               news 6
            </div>
            <div class="news-bloc" style="height: 500px">
               news 9
            </div>
        </div>
    </div>
<!--
    <div class="news-bloc">
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
-->
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
