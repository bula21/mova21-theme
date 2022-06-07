<?php /* Template Name: Groupe */ ?>

<?php is_rest()?:get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-groupes">
    <div class="header">
        <div class="infos">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <p class="text-intro"><?php the_field( 'intro_text' ); ?></p>
        </div>
        <div class="illustration">
	        <?php
	        if ( has_post_thumbnail() ) {
		        the_aid_picture_tag(get_post_thumbnail_id(), 'large' );
	        }
	        ?>
        </div>
    </div>
    <div class="body-container">
        <div class="timeLine">
            <?php
		if ( have_rows( 'group_timeline' ) ):
			while ( have_rows( 'group_timeline' ) ) : the_row();
				if ( have_rows( 'timeline_event' ) ):
					while ( have_rows( 'timeline_event' ) ) : the_row(); ?>
            <div class="tl-event">
                <div class="cta-bloc">
                    <p class="date"><?php the_sub_field( 'event_date' ); ?></p>
                    <p class="eventName"><?php the_sub_field( 'event_name' ); ?></p>
                    <div class="eventTextInfoBox">
                         <p class="eventTextInfo"><?php the_sub_field( 'event_textInfo' ); ?></p>
                    </div>
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
        <div class="events-container">
            <?php
		if ( have_rows( 'tm-event-info' ) ):
			while ( have_rows( 'tm-event-info' ) ) : the_row(); ?>
            <div class="event">
                <h2 class="title"><?php the_sub_field( 'event_name' ); ?></h2>
                <div class="rightCol">
                    <p class="text"><?php the_sub_field( 'event_text' ); ?></p>
                    <?php if ( get_sub_field( 'event_button' ) ): $link = get_sub_field( 'event_button' ); ?>
                    <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                        <button class="btn">
                            <p>
                                <?php echo $link['title']; ?> <span class="btn_arrow">→</span>
                            </p>
                        </button>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile;
		else : endif;
		?>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>

<?php is_rest()?:get_footer(); ?>
