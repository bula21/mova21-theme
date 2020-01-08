<?php
/**
 * Markup Template for collapsible items
 */

// set unique id
global $collaps_id;
$collaps_id = $collaps_id ? $collaps_id ++ : 1;
$id         = 'collapse-block-' . $collaps_id;
?>

<div id="<?php echo esc_attr( $id ); ?>" class="mod-collapse col-12 col-md-6">
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
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo $id_content; ?>"
                                aria-expanded="true" aria-controls="collapseOne">
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