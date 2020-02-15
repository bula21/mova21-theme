<?php /* Template Name: Groupes */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
<div class="container mod-helfen">
    <div class="header">
        <div class="col-12">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="wysiwyg">
                <?php the_content(); ?>
            </div>
        </div>
        <p class="text-intro"><?php the_field('text_intro'); ?></p>
    </div>
    <div class="crew-info">
          <?php $text_bloc = get_field('text_bloc'); ?>
           <h2><?php echo $text_bloc['group_title']; ?></h2>
        <p><?php echo $text_bloc['group_text']; ?></p>
    </div>
    
    <div class="helper-bloc">
         <?php $helper_bloc = get_field('inscription_bloc'); ?>
        <h2><?php echo $helper_bloc['title']; ?></h2>
        <div class="row">
        <p><?php echo $helper_bloc['text']; ?></p>
        <button><?php echo $helper_bloc['button']; ?></button>
        </div>
    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>