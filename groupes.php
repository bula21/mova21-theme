<?php /* Template Name: Groupe */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-groupes">
    <div class="header">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <p class="text-intro"><?php the_field( 'intro_text' ); ?></p>
    </div>
    <div class="timeLine">
        <h2 class="tl-title"></h2>
        <div class="tl-line"></div>
        <?php
		if ( have_rows( 'group_timeline' ) ):
			while ( have_rows( 'group_timeline' ) ) : the_row();
				if ( have_rows( 'timeline_event' ) ):
					while ( have_rows( 'timeline_event' ) ) : the_row(); ?>
        <div class="event">
            <svg class="arrow" viewBox="0 -2 24 24">
                <path d="M24 22h-24l12-20z" /></svg>
            <div class="cta-bloc">
                <p class="date"><?php the_sub_field( 'event_date' ); ?></p>
                <p class="eventName"><?php the_sub_field( 'event_name' ); ?></p>
                <?php if ( get_sub_field( 'event_button' ) ): $link = get_sub_field( 'event_button' ); ?>
                <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                    <p class="cta-button"><?php echo $link['title']; ?> →</p>
                </a>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile;
				else : endif;
			endwhile;
		else : endif;
		?>
    </div>
    <div class="event-infos">
        <?php

		if ( have_rows( 'tm-event-info' ) ):
			while ( have_rows( 'tm-event-info' ) ) : the_row(); ?>
        <div class="info">
            <p class="date"><?php the_sub_field( 'event_date' ); ?></p>
            <h2><?php the_sub_field( 'event_name' ); ?></h2>
            <div class="callToAction">
                <p class="text"><?php the_sub_field( 'event_text' ); ?></p>
                <?php if ( get_sub_field( 'event_button' ) ): $link = get_sub_field( 'event_button' ); ?>
                <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                    <button class="btn-black"><?php echo $link['title']; ?></button>
                </a>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile;
		else : endif;
		?>
    </div>
    <?php endwhile; endif; ?>

    <?php get_footer(); ?>