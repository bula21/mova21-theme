<?php
/**
 * Markup Template for organigram items
 */
?>

<div class="mod-organigram-items col-12">
    <div class="wysiwyg"><?php the_sub_field( 'text' ); ?></div>

	<?php if ( have_rows( 'members' ) ):
		$count = 1;
		?>
        <div class="organigram-items-list">
			<?php
			while ( have_rows( 'members' ) ) :
				the_row();
				$id_head    = esc_attr( $id . '-item-head-' . $count );
				$id_content = esc_attr( $id . '-item-content-' . $count );
				?>
                <div class="member">
                    <div class="member-pic">
						<?php
						$foto = get_sub_field( 'foto' );
						the_aid_picture_tag( $foto );
						?>
                    </div>
                    <div class="member-name">
						<?php the_sub_field( 'name' ); ?>
                    </div>
                    <div class="member-name">
						<?php the_sub_field( 'funktion' ); ?>
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