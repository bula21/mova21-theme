<?php /* Template Name: Bula */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
    <div class="container mod-content">
        <div class="row">
            <div class="col-12">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="wysiwyg">
					<?php the_content(); ?>
               
               <div class="my-big-image">
                   <?php $image_array = get_field('big_image'); 
                   ?>
                   <img class="my-image-class" src="<?php echo $image_array['url'];?>">
               </div>
               <div class="2col-text">
                   <?php the_field('text_2_cols'); ?>
                   
               </div>
                </div>
            </div>
        </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
