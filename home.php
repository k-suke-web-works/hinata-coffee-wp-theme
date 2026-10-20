<?php get_header(); ?>

<main>

  <div class="page-hero">
    <div class="container">
      <p class="breadcrumb"><a class="breadcrumb__link" href="<?php echo esc_url(home_url('/')); ?>">TOP</a> / お知らせ</p>
      <p class="eyebrow page-hero__eyebrow">News</p>
      <h1 class="page-hero__title">お知らせ</h1>
      <p class="page-hero__lead">営業時間の変更や新メニュー、イベント出店などの最新情報をお届けします。</p>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="news-list">
        <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>
                <?php get_template_part('template-parts/news-row'); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p>お知らせはまだありません。</p>
        <?php endif; ?>
      </div>
    </div>
  </section>

</main>


<?php get_footer(); ?>