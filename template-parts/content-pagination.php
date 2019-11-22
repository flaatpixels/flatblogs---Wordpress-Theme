<div class="blog-post-pagination">
  <?php the_posts_pagination(
    array(
        'mid_size' => 2,
        'prev_text' => __( '<', 'textdomain' ),
        'next_text' => __( '>', 'textdomain' ),
    )
  ); ?>
</div>