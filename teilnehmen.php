<?php /* Template Name: Teilnehmen */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-teilnehmen">
    <div class="header">
        <div class="infos">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <p><?php the_field('text_intro'); ?></p>
        </div>
        <div class="illustration">
            <img src="" alt="">
        </div>
    </div>
    <div class="choice-container">


        <div class="row">
            <?php
			global $collaps_id;
			$collaps_id ++;
			$id = 'collapse-block-' . $collaps_id;
			?>

            <div id="<?php echo esc_attr( $id ); ?>" class="mod-collapse-big">
                <?php if ( have_rows( 'fragen' ) ): ?>
                <div class="accordion" id="<?php echo $id; ?>-item">
                    <?php
						$count = 1;
						while ( have_rows( 'fragen' ) ) : the_row();
							$id_head    = esc_attr( $id . '-item-head-' . $count );
							$id_content = esc_attr( $id . '-item-content-' . $count );
							?>
                    <div class="collapse-item">
                        <div class="collapse-title" id="<?php echo $id_head; ?>">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo $id_content; ?>" aria-expanded="true" aria-controls="collapseOne">
                                <?php the_sub_field( 'frage' ); ?>
                            </button>
                        </div>
                        <div id="<?php echo $id_content; ?>" class="collapse content" aria-labelledby="<?php echo $id_head; ?>">
                            <p>
                                <?php the_sub_field( 'antwort' ); ?>
                                <p>
                        </div>
                    </div>
                    <?php
							$count ++;
						endwhile;
						?>
                </div>
                <?php
				else :
					// no rows found

				endif;

				?>
            </div>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>