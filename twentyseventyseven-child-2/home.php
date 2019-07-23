<?php get_header(); ?>

<div class="row">
  <div class="span8">
    <h1>News</h1>

    <?php

    //$args = '';

    if ( of_get_option('limit-post-frontpage') == 1 ) {
      $show_post = new WP_Query( 'posts_per_page='.of_get_option('limit-post-frontpage-value') );
    }
    else {
      $show_post = new WP_Query();
    }

    //$show_post = new WP_Query( $args );

    //var_dump($show_post);

    if ( $show_post->have_posts() ) : while ( $show_post->have_posts() ) : $show_post->the_post(); ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <p><em><?php the_time('l, F jS, Y'); ?></em></p>
      <hr>

    <?php endwhile;
    wp_reset_postdata();
    else: ?>
    <p><?php _e('Sorry, there are no posts.'); ?></p>
  <?php endif; ?>

</div>
<div class="span4">

  <?php
  if ( of_get_option( 'show-sidebar-frontpage', 1 ) == 1 ) {
    get_sidebar();   
  }
  ?> 

</div>
</div>

<?php get_footer(); ?>