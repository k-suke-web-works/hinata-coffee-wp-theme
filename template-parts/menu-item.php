<div class="menu-item">
  <div class="photo photo--filled menu-item__photo">
    <?php the_post_thumbnail('large', ['class' => 'photo__img', 'loading' => 'lazy']); ?>
  </div>
  <div class="menu-item__info">
    <h3 class="menu-item__name"><?php the_title(); ?></h3>
    <span class="menu-item__price">¥<?php echo esc_html(number_format((int) get_post_meta(get_the_ID(), 'price', true))); ?><?php echo esc_html($args['price_suffix'] ?? ''); ?></span>
  </div>
</div>