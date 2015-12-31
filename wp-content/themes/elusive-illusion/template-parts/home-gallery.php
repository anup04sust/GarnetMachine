<?php
/*
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
global $eli_options;
$album = $eli_options['gallery_album'];
$img_count = intval($eli_options['gallery_block_img_count']);

$gl_query = array(
  'posts_per_page'=>$img_count,
  'include'=>$album,
);
$galleries = get_eli_galleries($gl_query);
if (!empty($galleries)) :
  ?>
  <section id="gallery-tiles" class="page-block clearfix">
    <div class="<?php theme_layout_style(); ?>">
      <div class="row">
        <div class="col-xs-12">
          <h3 class="block-title"><?php echo $eli_options['gallery_block_title'] ?></h3>
        </div>
      </div>
      <div class="gallery-wrap clearfix">      
        <?php foreach($galleries as $key=>$img):
          $gcol = get_eli_gallery_grid_col($img->grid_size);
          ?>
        <div class="gcol-xs-<?php echo $gcol .' '.$img->grid_size; ?> gallery-gcol">
            <div class="thumbnail gallery-thumb">
              <img alt="<?php echo $img->title; ?>" src="<?php echo $img->thumbnail; ?>">
              <div class="caption">              
                <?php echo wpautop($img->title);?>
              </div>
              <a title=" <?php echo $img->title;?>" href="<?php echo $img->cover_preview; ?>" class="thumbnail-links"></a>
            </div>
            </div>          
        <?php endforeach;
          ?>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <p class="block-bottom text-capitalize text-center"><a class="btn btn-link" href="<?php echo get_post_type_archive_link( 'eli_gallery' ); ?>">View Full Gallery &RightArrow;</a></p>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
