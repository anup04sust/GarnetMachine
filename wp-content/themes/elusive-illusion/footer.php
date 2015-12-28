<?php
/*
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
?>
</div><!-- /#main-contents -->
<?php global $eli_options; ?>
<?php get_sidebar('footer');?>
<footer id="footer" class="site-footer clearfix">
  <div class="<?php theme_layout_style(); ?>">
    <div class="row">
      <div class="footer-nav col-xs-12 col-sm-6  col-md-6 pull-right">
        <?php
        if ($eli_options['show_footer_nav']) {
          wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'container' => '',
            'container_class' => '',
            'container_id' => 'footer_menu',
            'menu_class' => 'custom-nav',
            'depth' => 1,
          ));
        }
        ?>
      </div>
      <div class="copyright col-xs-12 col-sm-6 col-md-6 pull-right">
        <?php echo wpautop($eli_options['site_copyright']); ?>
      </div>
    </div>
  </div>
  <?php if (!empty($eli_options['livechat_active'])): ?>
  <div class="navbar navbar-footer">
    <div class="<?php theme_layout_style(); ?>">
      <div class="row">
        <div class="social-navigation col-xs-12 col-sm-2">
          <?php theme_social_links(); ?>
        </div>
        <div class="contact-navigation col-xs-12 col-sm-10">
          <ul class="online-contact">
            <?php if (!empty($eli_options['contact_email'])): ?>
              <li class="email"><a href="mailto:<?php echo $eli_options['contact_email']; ?>" target="_top"><i class="fa fa-envelope"></i> <?php echo $eli_options['contact_email']; ?></a></li>
            <?php endif; ?>
            <?php if (!empty($eli_options['contact_phone'])): ?>
              <li class="email"><a href="tel:<?php echo $eli_options['contact_phone']; ?>" target="_top"><i class="fa fa-phone"></i> <?php echo $eli_options['contact_phone']; ?></a></li>
            <?php endif; ?>
            <?php if (!empty($eli_options['livechat_active'])): ?>
              <li class="live-contact"><a class="live-chat" href="javascript:void(0)" target="_top"><i class="fa fa-comment-o"></i> <strong> Live Chat</strong><span class="online-status <?php echo $eli_options['livechat_status']; ?>"><?php echo ($eli_options['livechat_status'] == 'online') ? __('Online') : __('Offline');
            ; ?></span></a></li>
                <?php endif; ?>
          </ul>

        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</footer><!-- /#footer navbar-fixed-bottom -->
</div>

<?php wp_footer(); ?>

</body>
</html>
