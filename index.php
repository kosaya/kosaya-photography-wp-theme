<?php get_header(); ?>

<div class="main" id="main">

  <?php // Include portfolio
    get_template_part('templates/portfolio'); ?>

  <?php // List any other pages by their menu order.
    $pages_args = array(
      'post_type' => 'page',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC'
    );
    $pages = get_posts( $pages_args );
  ?>
  
  <?php foreach ( $pages as $post ) : setup_postdata( $post ); ?>
  <div id="<?php echo $post->post_name; ?>" class="<?php echo $post->post_name; ?> page inner">
    <div class="container">
      <div class="row">
        <div class="col-md-12 title">
          <h2><?php the_title(); ?></h2>
        </div><!--title-->
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-<?php the_field('left_content_width'); ?>">
          <?php the_field('left_content'); ?>
        </div>
        <div class="col-sm-<?php the_field('right_content_width'); ?>">
          <?php the_field('right_content'); ?>
        </div>
      </div>
    </div>
  </div><!--<?php echo $post->post_name; ?>-->
  <?php endforeach; ?>

  <?php // Include contact form
    get_template_part('templates/contact'); ?>

</div><!--main-->

<?php get_footer(); ?>