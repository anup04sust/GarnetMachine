<?php
/*
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
?>
<div <?php post_class(); ?>>
  <?php if (is_singular() || is_page()): ?>
    <div class="entry-content">   
      <?php the_content(); ?> 
    </div>
  <?php else: ?>
    <?php if (has_post_thumbnail()): ?>
      <div class="row entry-content-wrap">
        <figure class="featured-image col-xs-8 col-xs-offset-2 col-sm-3 col-sm-offset-0">
          <?php the_post_thumbnail('full'); ?>
        </figure>
        <div class="entry-content col-xs-10  col-sm-9">  
          <header class="entry-header">
            <h3 class="entry-title"><?php the_title() ?></h3>
          </header>
          <div class="entry-excerpt">
            <?php the_excerpt(); ?> 
            <a class="btn btn-link" href="<?php the_permalink() ?>">Learn More →</a>
          </div>

        </div>
      </div>
    <?php else: ?>
      <div class="entry-content">  
        <header class="entry-header">
          <h3 class="entry-title"><?php the_title() ?></h3>
        </header>
        <div class="entry-excerpt">
          <?php the_excerpt(); ?> 
          <a class="btn btn-link" href="<?php the_permalink() ?>">Learn More →</a>
        </div>

      </div>
    <?php endif; //has_post_thumbnail ?>
  <?php endif; //is_singular ?>

</div>
