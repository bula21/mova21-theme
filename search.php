<?php

get_header();
?>

    <section id="primary" class="container mod-search">
        <header class="page-header">
            <h1 class="page-title">
				<?php _e( 'Suche nach:', 'twentynineteen' ); ?> «<?php echo get_search_query(); ?>»
            </h1>
        </header>
        <main class="search-result">
			<?php if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
                    <div class="row">
                        <a href="<?php the_permalink(); ?>" class="search-result-item col-12">
                            <h2><?php the_title(); ?></h2>
                            <div class="search-result-content">
								<?php the_content(); ?>
								<?php the_field( 'text_intro' ); ?>
								<?php the_field( 'intro_text' ); ?>
                            </div>
                        </a>
                    </div>
				<?php
				endwhile;
			else :
				?>
                <div class="search-result-none">
					<?php _e( 'Leider konnten wir zu deinem Suchbegriff nichts finden.', 'bula21' ); ?>
                </div>
			<?php
			endif;
			?>
        </main>
    </section>
<?php
get_footer();
