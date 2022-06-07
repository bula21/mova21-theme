<?php /* Template Name: International */ ?>

<?php is_rest()?:get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : 
    the_post(); ?>
<div class="container mod-international">
    <div class="header">
        <?php if( have_rows('header') ): ?>
        <?php while( have_rows('header') ): the_row(); 
            $headerImage = get_sub_field('intro_img');
        ?>
        <div class="text">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <p><?php the_sub_field( 'intro_text' ); ?></p>
        </div>
        <img src="<?php echo esc_url( $headerImage['url'] ); ?>">
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="good-to-know">
        <?php if( have_rows('good_to_know') ): ?>
        <?php while( have_rows('good_to_know') ): the_row(); ?>
        <div class="gtn-container">
            <h2 class="gtn-title"><?php the_sub_field('gtk_title'); ?></h2>
            <?php if( have_rows('gtk_info_bloc') ): ?>
            <?php while( have_rows('gtk_info_bloc') ): the_row(); 
            $icon = get_sub_field('icon'); ?>
            <div class="gtn-bloc">
                <img src="<?php echo esc_url( $icon['url'] ); ?>">
                <h3><?php the_sub_field( 'title' ); ?></h3>
                <p><?php the_sub_field( 'text' ); ?></p>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="bloc-textImg">
        <?php if( have_rows('txt_img_bloc') ): ?>
        <?php while( have_rows('txt_img_bloc') ): the_row(); 
            $image = get_sub_field('img');
        ?>
        <img src="<?php echo esc_url( $image['url'] ); ?>">
        <div class="text">
            <h2><?php the_sub_field( 'title' ); ?></h2>
            <p><?php the_sub_field( 'txt' ); ?></p>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="bloc-txt">
        <?php if( have_rows('txt_bloc') ): ?>
        <?php while( have_rows('txt_bloc') ): the_row(); ?>
            <h2><?php the_sub_field( 'title' ); ?></h2>
            <p><?php the_sub_field( 'txt' ); ?></p>
            <button>
            
<!--            Buttons are missing. They need to appear only if they exist-->
            
            </button>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<?php endwhile; endif; ?>

<?php is_rest()?:get_footer(); ?>
