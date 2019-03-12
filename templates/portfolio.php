<?php
  $portfolio_args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1,
    'orderby' => 'rand',
    'order' => 'DESC'
  );
  $portfolio_images = get_posts( $portfolio_args );
?>

<div id="portfolio" class="portfolio page inner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 title">
        <h2>Portfolio</h2>
      </div><!--title-->
    </div>
    <div class="row">
      <div class="col-md-12 items">
        <div id="masonry">
          <div class="grid-sizer"></div>
          <div class="gutter-sizer"></div>
          <?php // List out the images
          foreach ( $portfolio_images as $post ) : setup_postdata( $post );
            $this_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
            echo "<div class='item'><img src='".$this_thumbnail['0']."' class='image' title='".get_the_title($post->ID)."'></div>";
          endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div><!--portfolio-->

<div class="popup-view">
  <div class="image">
    <img src="">
  </div>
</div>