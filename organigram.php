<?php /* Template Name: Organigram */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-organigram">
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
                    <img src="<?php echo $org_img['sizes']['large']; ?>" alt="<?php _e($org_img['alt']);?>">
                </div>
                <div class="info-container">
                    <p class="org-job"><?php the_sub_field( 'job' ); ?></p>
                    <p class="org-name"> <?php the_sub_field( 'name' ); ?></p>
                    <?php if ( get_sub_field( 'contact' ) ): ?>
                    <p class="org-contact">
                        <a href="mailto:<?php the_sub_field( 'contact' ); ?>">
                            <?php the_sub_field( 'contact' ); ?>
                        </a>
                    </p>
                    <?php endif; ?>
                    <?php if ( $link = get_sub_field( 'person_link' ) ): ?>
                    <p class="org-link">
                        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title'];; ?></a>
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