<?php
/*
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">       
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?php echo ELUSICVE_THEME_ASSETS; ?>js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <?php
    wp_head();
    global $eli_options;
    $body_class = !empty($eli_options['is_fixed_top']) ? 'fixed-topper' : '';
    ?>
  </head>
  <body <?php body_class($body_class); ?>> 
    <?php do_action('eli_after_body'); ?>
    <div id="page-wrap" class="clearfix">
      <header id="header" class="site-header clearfix <?php echo!empty($eli_options['is_fixed_top']) ? 'fixed-top' : ''; ?> " <?php echo!empty($eli_options['is_fixed_top']) ? 'data-spy="affix"' : ''; ?> data-offset-top="20">
        <div class="topbar clearfix">
          <div class="<?php theme_layout_style(); ?>">
            <?php do_action('eli_header_top'); ?>
          </div>
        </div>
        <div class="header-inner">
          <div class="<?php theme_layout_style(); ?>">
            <div class="row">
              <div class="navbar-header pull-left col-sm-3">            
                <button id="mm-button-toggle" class="navbar-toggle " type="button">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <h1 class="site-title"><a class="navbar-brand" data-animate="fadeInLeft" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php
                    if (!empty($eli_options['show_logo'])) {
                      printf('<img class="img-responsive logo pull-left" src="%s" alt="logo"/>', $eli_options['logo_url']['url']);
                    }
                    ?>
                    <span class="main_title sr-only"><?php bloginfo('name'); ?></span>

                  </a></h1>             
              </div>
              <?php theme_primary_menu(); ?>
            </div>
          </div>
        </div>      
      </header><!-- /#header -->
      <div id="main-contents" class="site-contents clearfix">      