<?php /* Template Name: Organigram */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-organigram">
    <div class="header">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <p class="text-intro"><?php the_field('text_intro'); ?></p>
    </div>
    <div class="org-container">
        <?php        
                if( have_rows('org_row') ):
                    while ( have_rows('org_row') ) : the_row(); ?>
        <h2><?php the_sub_field('team'); ?></h2>
        <div class="contact-row">
            <?php if( have_rows('person') ):
                        while ( have_rows('person') ) : the_row(); 
                        $org_img = get_sub_field('image'); ?>
            <div class="contact">
                <div class="img-container">
                    <img src="<?php echo $org_img['url'];?>')">
                </div>
                <div class="info-container">
                    <p class="org-job">
                        <?php the_sub_field('job'); ?>
                    </p>
                    <p class="org-name">
                        <?php the_sub_field('name'); ?></p>
                    <p class="org-contact">
                        <a href="mailto:<?php the_sub_field('contact'); ?>">
                            <?php the_sub_field('contact'); ?>
                        </a>
                    </p>
                </div>
            </div>
            <?php endwhile; else : endif; ?>
        </div>
        <?php endwhile; else : endif; ?>
    </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>