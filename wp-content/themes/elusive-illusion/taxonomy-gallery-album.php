<?php
/*
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
get_header();
global $eli_options;
?>  
<?php get_template_part('template-parts/page', 'banner'); ?> 
<section id="inner-content" class="no-sidebar-inner">
  <div class="<?php theme_layout_style(); ?>">
    <div class="row">
      <div class="page-contents col-xs-12">
        <div class="album-wrap album-page">              
          <div class="row">
            <?php
            if (have_posts()):
              while (have_posts()): the_post();

                $galler_id = get_the_ID();
                $thumbnail_att_id = get_field('listing_cover_image', $galler_id);
                $list_cover = wp_get_attachment_url($thumbnail_att_id);
                ?>
                <div class="col-xs-6 col-sm-4 gallery-item">
                  <div class="thumbnail">
                    <img src="<?php echo $list_cover; ?>" alt="<?php the_title() ?>" />
                    <a class="caption" href="<?php the_permalink(); ?>">
                      <span><?php the_title() ?></span>
                    </a>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
            <?php
            if (function_exists('wp_paginate')) {
              wp_paginate();
            }
            else {
              the_posts_pagination(array(
                'prev_text' => __('Previous page'),
                'next_text' => __('Next page'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page') . ' </span>',
              ));
            }
            ?> 
          </div>

          <?php
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
