<?php /* Template Name: Organigram */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
    <div class="container mod-organigram">
        <div class="header">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="text-intro"><?php the_field( 'text_intro' ); ?></div>
        </div>
        <div class="org-container">
			<?php
			if ( have_rows( 'org_row' ) ):
				while ( have_rows( 'org_row' ) ) : the_row(); ?>
                    <h2><?php the_sub_field( 'team' ); ?></h2>
                    <div class="contact-row">
						<?php
						if ( have_rows( 'person' ) ):
							while ( have_rows( 'person' ) ) : the_row();
								$org_img = get_sub_field( 'image' ); ?>
                                <div class="contact">
                                    <div class="img-container">
                                        <img src="<?php echo $org_img['sizes']['large']; ?>">
                                    </div>
                                    <div class="info-container">
                                        <p class="org-job"><?php the_sub_field( 'job' ); ?></p>
                                        <p class="org-name"> <?php the_sub_field( 'name' ); ?></p>
										<?php if ( get_sub_field( 'contact' ) ): ?>
                                            <p class="org-contact">
                                                <a href="mailto:<?php the_sub_field( 'contact' ); ?>">
                                                    <svg class="email-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M24 0l-6 22-8.129-7.239 7.802-8.234-10.458 7.227-7.215-1.754 24-12zm-15 16.668v7.332l3.258-4.431-3.258-2.901z"/>
                                                    </svg><?php the_sub_field( 'contact' ); ?>
                                                </a>
                                            </p>
										<?php endif; ?>
                                    </div>
                                </div>
							<?php endwhile; else : endif; ?>
                    </div>
				<?php endwhile; else : endif; ?>
        </div>
    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
