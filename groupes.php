<?php /* Template Name: Groupes */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
    <div class="container mod-groupes">
        <div class="col-12">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="wysiwyg">
				<?php the_content(); ?>
            </div>
        </div>
        <div class="timeLine">
            <div class="intro">
                <p class="text-intro"><?php the_field( 'intro_text' ); ?></p>
            </div>

			<?php
			if ( have_rows( 'group_timeline' ) ):
				while ( have_rows( 'group_timeline' ) ) : the_row();

					if ( have_rows( 'timeline_event' ) ):
						while ( have_rows( 'timeline_event' ) ) : the_row(); ?>

                            <div class="timeLine">
                                <div class="event">
                                    <p class="date"><?php the_sub_field( 'event_date' ); ?></p>
                                    <div class="keyPoint"></div>
                                    <p class="eventName"><?php the_sub_field( 'event_name' ); ?></p>
                                    <button><?php the_sub_field( 'event_button' ); ?></button>
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
                        <div class="infoContainer">
                            <p class="number"><?php the_sub_field( 'event_number' ); ?></p>
                            <h2><?php the_sub_field( 'event_name' ); ?></h2>
                            <p class="text"><?php the_sub_field( 'event_description' ); ?></p>
                            <button><?php the_sub_field( 'event_button' ); ?></button>
                        </div>
                    </div>

				<?php endwhile;
			else : endif;
			?>
        </div>

    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>