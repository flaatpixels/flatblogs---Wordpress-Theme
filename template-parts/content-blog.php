<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flatblogs
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>

  <header class="entry-header">
    <?php
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    ?>
  </header>

  <div class="entry-content entry-content__card">
    <?php the_excerpt(); ?>
  </div><!-- .entry-content -->
  
  <footer class="entry-footer">
    <a href="<?= esc_url( get_permalink() ) ?>" rel="bookmark" class="entry-footer-plus">Lire</a>
  </footer>

  <!--<footer class="entry-footer">
    <?php flatblogs_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
