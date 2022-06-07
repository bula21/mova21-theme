<?php /* Template Name: Bula */ ?>

<?php is_rest()?:get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
    <div class="container mod-basicTemplate">
        <div class="row header">
            <div class="col-12">
                <div class="h1-background">
                    <div class="background"></div>
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="h2-background"></div>
                    <h2><?php the_field( 'main-h2' ); ?></h2>
                </div>
                <div class="image-intro">
					<?php
                    $image_array = get_field( 'image_full_size' );
					the_aid_picture_tag( $image_array['id'], 'bula-fullwidth', 'bula-fullwidth_2x' );
					?>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="text text-2-cols">
				<?php the_field( 'text_2_cols' ); ?>

            </div>
            <!--
        <div class="mti">
            <?php $mti = get_field( 'mti' );
			if ( $mti ): ?>

            <?php if ( $mti['mti_img'] ): ?>
            <div class="mti-img">
                <img class="mti-img" src="<?php echo esc_url( $mti['mti_img']['url'] ); ?>" alt="<?php echo esc_attr( $mti['mti_img']['alt'] ); ?>" />
            </div>
            <?php endif; ?>
            <div class="mti-txt">
                <h2><?php echo $mti['mti_title']; ?></h2>
                <p><?php echo $mti['mti_txt']; ?></p>
            </div>
            <?php endif; ?>
        </div>
-->
        </div>
    </div>
<?php endwhile; endif; ?>

<?php is_rest()?:get_footer(); ?>
