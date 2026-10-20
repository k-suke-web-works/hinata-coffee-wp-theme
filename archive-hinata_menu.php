<?php get_header(); ?>

<main>

  <div class="page-hero">
    <div class="container">
      <p class="breadcrumb"><a class="breadcrumb__link" href="<?php echo esc_url(home_url('/')); ?>">TOP</a> / メニュー</p>
      <p class="eyebrow page-hero__eyebrow">Menu</p>
      <h1 class="page-hero__title">コーヒーも、フードも、<br>すべてお店で仕込んでいます。</h1>
      <p class="page-hero__lead">価格はすべて税込表示です。テイクアウトをご希望の方は、レジにてお申し付けください。</p>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="section-head">
        <p class="eyebrow section-head__eyebrow">Coffee</p>
        <h2 class="section-head__title">コーヒー</h2>
        <p class="section-head__lead">Hot／Ice、どちらも同一料金でご用意しています。</p>
      </div>
      <?php
      $coffee_query = new WP_Query([
        'post_type' => 'hinata_menu',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC',
        'tax_query' => [
          [
            'taxonomy' => 'hinata_menu_category',
            'field' => 'slug',
            'terms' => 'coffee',
          ],
        ],  
      ]);
      ?>
      <div class="grid-3">
        <?php while ($coffee_query->have_posts()): $coffee_query->the_post(); ?>
          <?php get_template_part('template-parts/menu-item'); ?>
        <?php endwhile; ?>
      </div>
      <?php wp_reset_postdata(); ?>
    </div>
  </section>

  <section class="alt">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow section-head__eyebrow">Drink &amp; Food</p>
        <h2 class="section-head__title">ドリンク・フード</h2>
      </div>
      <?php
      $drink_food_query = new WP_Query([
        'post_type' => 'hinata_menu',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC',
        'tax_query' => [
          [
            'taxonomy' => 'hinata_menu_category',
            'field' => 'slug',
            'terms' => 'drink-food',
          ],
        ],  
      ]);
      ?>
      <div class="grid-3">
        <?php while ($drink_food_query->have_posts()): $drink_food_query->the_post(); ?>
          <?php get_template_part('template-parts/menu-item'); ?>
        <?php endwhile; ?>
      </div>
      <?php wp_reset_postdata(); ?>
      <p style="margin-top:28px;color:var(--ink-soft);font-size:14px;">※アレルギー表示については店頭スタッフまでお気軽にお問い合わせください。</p>
    </div>
  </section>

  <section class="text-center">
    <div class="container" style="max-width:560px;">
      <p class="eyebrow" style="justify-content:center;">Takeout</p>
      <h2 style="margin:16px 0 20px;">テイクアウトも承っています。</h2>
      <p style="color:var(--ink-soft);margin-bottom:28px;">お電話でのご予約もお受けしています。混雑状況はお知らせページでご確認ください。</p>
      <a href="<?php echo esc_url(home_url('/access/')); ?>" class="btn btn--primary">アクセス・ご予約</a>
    </div>
  </section>

</main>

<?php get_footer(); ?>