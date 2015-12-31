<?php
/*
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
$post_id = get_the_ID();
$gallery_images = get_post_meta($post_id, '_gattachment', TRUE);
?>
<div <?php post_class('single-post'); ?>>
  <div id="gattachment-gallery" class="gattachment clearfix row">
    
  <?php if (!empty($gallery_images)): 
    $gattachments = maybe_unserialize($gallery_images);  
        foreach ($gattachments as $attid => $img) {
        if(!empty($img)){
          $attachment = get_gallery_attachment($attid);          
          $rand_size = 3;
          $thumb = wp_get_attachment_image_src($attid,'medium');
          $thumb_src = empty($thumb[0])?  $img['thumbnail']:$thumb[0];
          echo sprintf('<div class="ggird col-xs-%5$s"><figure id="preview-wrap-%1$s" class="thumbnail"><a class="gattachment-preview" href="%2$s" title="%4$s"> <img src="%3$s" alt="%1$s"></a></figure></div>',$attid,$img['url'],$thumb_src,$attachment->title,$rand_size);
        }        
      }
    ?>

  <?php else: ?>
    <div class="entry-content">      
      <p class="alert alert-info"><?php _e('No gallery image found!!!')?></p>
    </div>
  <?php
  endif;
  ?>
  </div>
  <footer class="entry-footer">
    <?php
  the_post_navigation(array(
    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next') . '</span> ' .    
    '<span class="post-title">%title</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous') . '</span> ' .    
    '<span class="post-title">%title</span>',    
    'screen_reader_text'=> __('Gallery navigation'),
  ));
  ?>
</footer>
</div>
