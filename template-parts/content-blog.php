<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flatblogs
 */

?>


<article id="post-<?php the_ID(); ?>" class="post-card <?= has_post_thumbnail() ? 'postHeader--thumbnail' : '' ?>" >
  

  <?php if(has_post_thumbnail()) : ?>
    <div class="thumbnail-container">
      <?= the_post_thumbnail('thumb-square-image-size'); ?>
    </div>
  <?php endif; ?>

  <div class="<?= has_post_thumbnail() ? 'postContent--thumbnail' : '' ?>">
    <header class="entry-header">
      <?php
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      ?>
    </header>

    <div class="entry-content entry-content__card">
      <?php the_excerpt(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
      <a href="<?= esc_url( get_permalink() ) ?>" rel="bookmark" class="btn-primary">Lire</a>
    </footer>
  </div>

  <!--<footer class="entry-footer">
    <?php flatblogs_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
