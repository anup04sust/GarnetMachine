
<?php
/*
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
get_header();
global $eli_options;
$albums = get_terms('gallery-album', array('hierarchical' => FALSE, 'hide_empty' => FALSE, 'parent' => 0));
?>  
<?php get_template_part('template-parts/page', 'banner'); ?> 
<section id="inner-content" class="no-sidebar-inner">
  <div class="<?php theme_layout_style(); ?>">
    <div class="row">
      <div class="page-contents col-xs-12">
        <?php
        if (!empty($albums)):
          foreach ($albums as $album):
            ?>
            <div class="album-wrap">
              <h2 class="album-title"><?php echo $album->name; ?> </h2>
              <div class="row">
                <?php
                $gargs = array(
                  'post_type' => 'eli_gallery',
                  'posts_per_page' => 3,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'gallery-album',
                      'field' => 'term_id',
                      'terms' => $album->term_id,
                    ),
                  ),
                );
                $galleries = get_posts($gargs);
                foreach ($galleries as $gallery):
                  $thumbnail_att_id = get_field('listing_cover_image', $gallery->ID);
                  $list_cover = wp_get_attachment_url($thumbnail_att_id);
                  ?>
                  <div class="col-xs-6 col-sm-4 gallery-item">
                    <div class="thumbnail">
                      <img src="<?php echo $list_cover; ?>" alt="<?php echo $gallery->post_title; ?>" />
                      <a class="caption" href="<?php echo get_the_permalink($gallery->ID); ?>">
                        <span><?php echo $gallery->post_title; ?></span>
                      </a>
                    </div>
                  </div>
                  <?php
                endforeach;
                ?>
              </div>
              <?php
              $album_link = get_term_link($album);
              if (!empty($galleries))
                echo sprintf('<a href="%s" class="btn btn-link">View Album →</a>', $album_link);
              ?>
            </div>
            <?php
          endforeach;
        elseif (have_posts()):

          while (have_posts()): the_post();
            get_template_part('template-parts/gallery', 'loops');
          endwhile;


        else:
          get_template_part('content', 'none');
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();
