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
        <?php        
                if( have_rows('org_row') ):
                    while ( have_rows('org_row') ) : the_row(); ?>

        <div class="contact-row"> 
            
<!-- problème de logique quelque part ..-->

            <?php if( have_rows('person') ):
                        while ( have_rows('person') ) : the_row(); 
                        $org_img = get_sub_field('image'); ?>


            <div class="contact">
                <img src="<?php echo $org_img['url'];?>')">
                <p class="org-name"><?php the_sub_field('name'); ?></p>
                <p class="org-contact"><?php the_sub_field('contact'); ?></p>
            </div>
        </div>

        <?php endwhile; else : endif;
        
                    endwhile; else : endif;
                ?>
    </div>

</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>