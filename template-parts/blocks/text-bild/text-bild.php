<?php
/**
 * Component: Text-Bild
 * ACF 🖤️ Gutenberg
 * Beispiel Komponente für Text-Bild
 */

$id = 'testimonial-' . $block['id'];
var_dump( $block );

// Load values and assing defaults.
$text             = get_field( 'text' ) ? : 'Your testimonial here...';
$image            = get_field( 'bild' ) ? : 295;
$background_color = get_field( 'background_color' );
$position         = get_field( 'position' ) ? : 'links';
?>

<div id="<?php echo esc_attr( $id ); ?>">
    <div>
		<?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div>
    <blockquote>
        <span><?php echo $text; ?></span>
    </blockquote>
</div>