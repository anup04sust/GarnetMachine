<?php
/*
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
?>
<div <?php post_class('entry-404');?>>
	<header class="entry-header">
		<h2 class="entry-title"><?php _e( 'Oops!'); ?></h1>
		<h4 class="page-subtitle"><?php _e( 'This is awkward.'); ?></h1>
	</header><!-- .page-header -->
  <div class="entry-content">
    <p><?php _e( 'You\'re looking for something that doesn\'t exist...'); ?></p>
   <p><?php _e( 'Perhaps searching can help.'); ?></p>
			<?php get_search_form(); ?>
  </div>
</div>
