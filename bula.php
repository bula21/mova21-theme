<?php /* Template Name: Bula */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-basicTemplate">
    <div class="row">
        <div class="col-12">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>

        <div class="image-fullSize">
            <?php $image_array = get_field('image_full_size'); 
                   ?>
            <img src="<?php echo $image_array['url'];?>">
        </div>
        <div class="text text-2-cols">
            <?php the_field('text_2_cols'); ?>

        </div>
        <div class="mti">
            <?php $mti = get_field('mti'); if( mti ): ?>
            <div class="mti-img">
                <img class="mti-img" src="<?php echo esc_url( $mti['mti_img']['url'] ); ?>" alt="<?php echo esc_attr( $mti['image']['alt'] ); ?>" />
            </div>
            <div class="mti-txt">
                <h2><?php echo $mti['mti_title']; ?></h2>
                <p><?php echo $mti['mti_txt']; ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>