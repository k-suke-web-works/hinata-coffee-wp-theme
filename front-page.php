<?php get_header(); ?>

<main>

  <section class="hero">
    <div class="container hero__row">
      <div class="hero__copy">
        <p class="eyebrow hero__eyebrow">Neighborhood Coffee Stand</p>
        <h1 class="hero__title">陽だまりのような、<br><em class="hero__highlight">街の一杯</em>を。</h1>
        <p class="hero__lead">この「ひなたコーヒー」も、私が手がけたサンプル制作の一つです。地域のお店に寄り添うホームページを、ヒアリングからデザイン、コーディングまで一貫してお作りします。</p>
        <div class="button-group">
          <a href="<?php echo esc_url(home_url('/access/')); ?>" class="btn btn--primary">ご予約・アクセス</a>
          <a href="<?php echo esc_url(home_url('/menu/')); ?>" class="btn btn--outline">メニューを見る</a>
        </div>
      </div>
      <div class="hero__visual">
        <div class="photo photo--filled"><img class="photo__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero-counter.jpg" alt="ひなたコーヒーの店内カウンターと窓辺の光" loading="lazy"></div>
      </div>
    </div>
    <div class="container">
      <div class="hero__stats">
        <div class="hero__stats-item"><div class="hero__stats-label">営業時間</div><div class="hero__stats-value">8:00 - 18:00（水休）</div></div>
        <div class="hero__stats-item"><div class="hero__stats-label">アクセス</div><div class="hero__stats-value">ひなた駅 北口 徒歩4分</div></div>
        <div class="hero__stats-item"><div class="hero__stats-label">お知らせ</div><div class="hero__stats-value">冬季限定メニュー販売中</div></div>
      </div>
    </div>
  </section>

  <section id="concept-teaser">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow section-head__eyebrow">Our Commitment</p>
        <h2 class="section-head__title">豆選びも、内装も、<br>ひとつずつ理由があります。</h2>
        <p class="section-head__lead">産地・焙煎・空間づくりまで、こだわりのすべてをストーリーとしてまとめました。</p>
      </div>
      <div class="grid-4">
        <div class="feature-card">
          <div class="photo photo--filled feature-card__photo"><img class="photo__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/bean-selection.jpg" alt="生豆の選定" loading="lazy"></div>
          <div class="feature-card__body">
            <span class="feature-card__tag">豆選び</span>
            <h3 class="feature-card__title">直接相談できる、豆だけを。</h3>
            <p class="feature-card__text">代理店を挟まず、ご担当者様から直接お話をうかがっています。事業への想いを聞くところから始めます。</p>
          </div>
        </div>
        <div class="feature-card">
          <div class="photo photo--filled feature-card__photo"><img class="photo__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/beans-roaster.jpg" alt="生豆と焙煎機" loading="lazy"></div>
          <div class="feature-card__body">
            <span class="feature-card__tag">焙煎</span>
            <h3 class="feature-card__title">週2回、必要な分だけ焙煎。</h3>
            <p class="feature-card__text">テンプレートの使い回しはしていません。案件ごとに、そのお店らしさに合わせて一から丁寧にコーディングしています。</p>
          </div>
        </div>
        <div class="feature-card">
          <div class="photo photo--filled feature-card__photo"><img class="photo__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hand-drip.jpg" alt="ハンドドリップ" loading="lazy"></div>
          <div class="feature-card__body">
            <span class="feature-card__tag">抽出</span>
            <h3 class="feature-card__title">一杯ずつ、ハンドドリップで。</h3>
            <p class="feature-card__text">効率だけを優先せず、表示速度や操作感をページごとに調整しています。</p>
          </div>
        </div>
        <div class="feature-card">
          <div class="photo photo--filled feature-card__photo"><img class="photo__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/interior-wood.jpg" alt="木の温もりある店内" loading="lazy"></div>
          <div class="feature-card__body">
            <span class="feature-card__tag">空間</span>
            <h3 class="feature-card__title">長居しても、気まずくない席を。</h3>
            <p class="feature-card__text">初めて来た方も迷わず目的の情報にたどり着けるよう、ナビゲーションや導線を丁寧に設計しています。</p>
          </div>
        </div>
      </div>
      <p style="margin-top:32px;"><a href="<?php echo esc_url(home_url('/concept/')); ?>" class="btn btn--outline">こだわりのストーリーを読む →</a></p>
    </div>
  </section>

  <section class="alt">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow section-head__eyebrow">Menu Pickup</p>
        <h2 class="section-head__title">人気のメニュー</h2>
        <p class="section-head__lead">定番から季節限定まで。テイクアウトにも対応しています。</p>
      </div>
      <div class="grid-3">
        <?php
        $pickup_query = new WP_Query([
          'post_type' => 'hinata_menu',
          'posts_per_page' => 3,
          'orderby' => 'date',
          'order' => 'ASC',
          'meta_key' => 'pickup',
          'meta_value' => '1',
        ]);
        ?>
        <?php while ($pickup_query->have_posts()): $pickup_query->the_post(); ?>
          <?php get_template_part('template-parts/menu-item', null, ['price_suffix' => '～']); ?>
        <?php endwhile; ?>
      </div>
      <?php wp_reset_postdata(); ?>
      <p style="margin-top:32px;"><a href="<?php echo esc_url(home_url('/menu/')); ?>" class="btn btn--outline">メニュー全体を見る →</a></p>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="section-head">
        <p class="eyebrow section-head__eyebrow">News</p>
        <h2 class="section-head__title">お知らせ</h2>
      </div>
      <div class="news-list">
        <?php
        $news_query = new WP_Query([
          'post_type' => 'post',
          'posts_per_page' => 3
        ]);
        ?>
        <?php if ($news_query->have_posts()) : ?>
          <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
            <?php get_template_part('template-parts/news-row'); ?>
          <?php endwhile; ?>
        <?php else : ?>
          <p>お知らせはまだありません。</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  <section class="alt">
    <div class="container grid-2">
      <div class="map-embed">
        <iframe class="map-embed__frame" src="https://www.google.com/maps?q=Yanaka+Ginza+Shopping+Street,+Tokyo&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="ひなたコーヒー周辺の地図（サンプル）" allowfullscreen></iframe>
      </div>
      <div>
        <p class="eyebrow">Access</p>
        <h2 style="margin:14px 0 20px;font-size:28px;">お待ちしています</h2>
        <table class="info-table">
          <tr><th>住所</th><td>〇〇県ひなた市中央町1-2-3</td></tr>
          <tr><th>営業時間</th><td>8:00 - 18:00（L.O. 17:30）</td></tr>
          <tr><th>定休日</th><td>毎週水曜日</td></tr>
          <tr><th>電話</th><td>000-1234-5678</td></tr>
        </table>
        <p style="margin-top:24px;"><a href="<?php echo esc_url(home_url('/access/')); ?>" class="btn btn--primary">アクセス・ご予約の詳細 →</a></p>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>