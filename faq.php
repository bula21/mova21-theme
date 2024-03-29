<?php /* Template Name: FAQ */ ?>

<?php is_rest()?:get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>

<div class="container mod-faq">
    <div class="row">
        <div class="col-12 header">
            <div class="infos">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <?php if ( $intro = get_field( 'text_intro' ) ): ?>
                <div class="post-intro">
                    <?php echo nl2br( $intro ); ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="illustration">
		        <?php
		        if ( has_post_thumbnail() ) {
			        the_aid_picture_tag(get_post_thumbnail_id(), 'large' );
		        }
		        ?>
            </div>
        </div>
    </div>
    <div>
        <div class="d-inline-block">
            <?php
				if ( have_rows( 'faqs' ) ):
					while ( have_rows( 'faqs' ) ) : the_row();
						get_template_part( 'template-parts/collapse', 'items' );
					endwhile;

				else :

					// no rows found

				endif;
				?>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="wysiwyg">
                    <?php the_field( 'more-content' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>

<?php is_rest()?:get_footer(); ?>
