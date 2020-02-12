<?php /* Template Name: Organigram */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-organigram">
    <div class="row">
        <div class="col-12">
            <h1 class="post-title"><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="org-container">
        <div class="contact-row">
            <?php        
                if( have_rows('org_row') ):
                    while ( have_rows('org_row') ) : the_row(); ?>

            <div class="contact">

                <!-- problème de logique quelque part ..-->

                <?php if( have_rows('person') ):
                        while ( have_rows('person') ) : the_row(); 
                        $org_img = get_sub_field('image'); ?>


                <div class="contact-info">
                    <div class="img-container"><img src="<?php echo $org_img['url'];?>')"></div>
                    <p class="org-name"><?php the_sub_field('name'); ?></p>
                    <p class="org-contact"><?php the_sub_field('contact'); ?></p>
                </div>
            </div>

            <?php endwhile; else : endif;
        
                    endwhile; else : endif;
                ?>
        </div>
    </div>

</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>