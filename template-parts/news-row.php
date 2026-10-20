<?php
$categories =get_the_category();
$category_name = $categories ? $categories[0]->name : '';
?>
<a href="<?php the_permalink(); ?>" class="news-list__row">
    <time class="news-list__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
    <span class="news-list__tag"><?php echo esc_html($category_name); ?></span>
    <span class="news-list__title"><?php the_title(); ?></span>
    <span class="news-list__arrow">→</span>
</a>
