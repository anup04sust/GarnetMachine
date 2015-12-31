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
              <div class="page-contents col-xs-12 col-sm-12">
                <?php
                if (have_posts()):
                  while (have_posts()): the_post();
                  get_template_part('template-parts/gallery', 'single');
                  endwhile;
                else:
                   get_template_part('content','none');
                endif;
                ?>
              </div>
            </div>
          </div>
        </section>
<?php
get_footer();