<?php get_header(); ?>

<div class="single">

  <section class="single-work-section">
    <div class="inner">
      <article class="single-work-article">
        <div class="single-work__thumb">
          <img class="single-work__img" src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnails'); ?>" alt="">
        </div>

        <div class="single-work__wrap">

          <div class="single-work__info">
            <h2 class="single-work__ttl"><a class="single-work__link" href="<?php the_field('url'); ?>" target="_blank"><?php the_title(); ?> <i class="far fa-window-restore"></i></a></h2>
            <ul class="single-work__develop">
              <?php if( get_field('wordpress') ):?>
                <li class="single-work__develop-item single-work__develop-item--wp"><?php the_field('wordpress'); ?></li>
              <?php endif; ?>
              <li class="single-work__develop-item"><?php the_field('develop'); ?></li>
            </ul>
          </div>

          <div class="single-work__content">
            <?php the_content(); ?>
          </div>

        </div>
        
      </article>

      <ul class="pager">
        <li class="pager__link pager__next">
          <?php if (get_next_post()):?>
            <?php next_post_link('%link', '<'); ?>
          <?php endif; ?>
        </li>
        <li class="pager__top"><a href="<?php echo home_url(); ?>">PAGE TOP</a>
        <li class="pager__link pager__prev">
          <?php if (get_previous_post()):?>
            <?php previous_post_link('%link', '>'); ?>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </section>
  
</div>

<?php get_footer(); ?>