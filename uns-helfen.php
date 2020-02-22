<?php /* Template Name: Uns helfen */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container mod-helfen">

    <div class="header">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <p class="text-intro"><?php the_field('text_intro'); ?></p>
    </div>

    <?php $text_bloc = get_field('text_bloc'); ?>
    <?php if($text_bloc['group_title']): ?>
    <div class="crew-info">
        <h2><?php echo $text_bloc['group_title']; ?></h2>
        <?php echo $text_bloc['group_text']; ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <?php
			global $collaps_id;
			$collaps_id ++;
			$id = 'collapse-block-' . $collaps_id;
			?>

        <div id="<?php echo esc_attr( $id ); ?>" class="mod-collapse-big">
            <h2><?php the_sub_field( 'ueberschrift' ); ?></h2>

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
                    <div id="<?php echo $id_content; ?>" class="collapse" aria-labelledby="<?php echo $id_head; ?>">
                        <div class="card-body">
                            <?php the_sub_field( 'antwort' ); ?>
                        </div>
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
    <?php $helper_bloc = get_field('inscription_bloc'); ?>
    <?php if($helper_bloc['text']): ?>
    <div class="helper-bloc">
        <h2><?php echo $helper_bloc['title']; ?></h2>
        <div class="row">
            <p><?php echo $helper_bloc['text']; ?></p>
            <button class="btn-black"><?php echo $helper_bloc['button']; ?></button>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
