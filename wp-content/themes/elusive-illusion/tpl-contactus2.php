<?php
/*
 * Template Name: Contact Us TPL2
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
            <div class="col-xs-12 col-sm-9">
              <?php echo do_shortcode($eli_options['contact_form_shortcode']); ?>
            </div>
            <div class="col-xs-12 col-sm-3">
              <div class="contact-sideinner">
                <div class="contact-social">
                  <h3>Keep in Touch!</h3>
                   <?php theme_social_links(); ?>
                </div>
                <div class="address-box">
                   <h3>Contact Info</h3>
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
                   <p class="addr-phone"><strong><?php _e('Phone')?>: </strong> <a href="tel:<?php echo $eli_options['contact_phone']; ?>" class="phone" rel="top"><?php echo $eli_options['contact_phone']; ?></a></p>            
                  <?php endif; ?>
                  <?php if (!empty($eli_options['contact_fax'])): ?>
                    <p class="addr-phone"><strong><?php _e('Fax')?>: </strong><a href="javascript:void(0)" class="fax" rel="top"><?php echo $eli_options['contact_fax']; ?></a></p>            
                  <?php endif; ?>
                  <?php if (!empty($eli_options['contact_email'])): ?>
                    <p class="addr-email"><strong><?php _e('Email')?>: </strong><a href="mailto:<?php echo $eli_options['contact_email']; ?>" class="email" rel="top"><?php echo $eli_options['contact_email']; ?></a></p>            
                  <?php endif; ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid full-map-container">
    <div class="embed-responsive embed-responsive-16by9">
      <?php echo $eli_options['contact_map_script']; ?>
    </div>
  </div>
</section>

<?php
get_footer();
