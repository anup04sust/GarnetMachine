<?php
/*
 * Template Name: Front Page 2
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
get_header();
global $eli_options;
?>  
        <?php get_template_part('template-parts/home', 'camera-slider'); ?> 
        <?php get_template_part('template-parts/home', 'products'); ?> 
        <?php get_template_part('template-parts/service', 'widgets'); ?> 
        <?php get_template_part('template-parts/home', 'gallery'); ?> 
        <section id="inner-content">
          <div class="<?php theme_layout_style(); ?>">
            <div class="row">
              <div class="entry-content col-xs-12">
                <?php
                if (have_posts()):
                  while (have_posts()): the_post();
                    the_content();
                  endwhile;
                endif;
                ?>
              </div>
            </div>
          </div>
        </section>
<?php
get_footer();