<?php
/*
 * Template Name: Contact Us
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
get_header();
global $eli_options;
get_template_part('templatepart/page', 'banner');
?> 
<section id="inner-content">
  <div class="<?php theme_layout_style(); ?>">
    <div class="row">
      <div class="page-contents  col-xs-12">
        <div class="entry-content">
          <?php
          if (have_posts()):
            while (have_posts()): the_post();
              the_content();
            endwhile;
          endif;
          ?>
          <div class="clearfix">
            <div class="col-xs-12 col-sm-4">
              <?php echo do_shortcode($eli_options['contact_form_shortcode']); ?>
            </div>
            <div class="col-xs-12 col-sm-7 col-sm-offset-1">
              <div class="embed-responsive embed-responsive-16by9">
                <?php echo $eli_options['contact_map_script']; ?>
              </div>
              <div class="address-box">
                <?php
                $addr = $eli_options['contact_address'];
                if (!empty($addr)):
                  $addr = str_replace(PHP_EOL, '<br />', $addr);
                  ?>
                  <address class="address">
                    <?php echo $addr; ?>
                  </address>
                <?php endif; ?>
                <?php if (!empty($eli_options['contact_phone'])): ?>
                  <p class="addr-phone"><a href="tel:<?php echo $eli_options['contact_phone']; ?>" class="phone" rel="top"><?php echo $eli_options['contact_phone']; ?></a></p>            
                <?php endif; ?>
                <?php if (!empty($eli_options['contact_email'])): ?>
                  <p class="addr-email"><a href="mailto:<?php echo $eli_options['contact_email']; ?>" class="email" rel="top"><?php echo $eli_options['contact_email']; ?></a></p>            
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();
