<?php get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-hero">
            <div class="container">
            <p class="breadcrumb"><a class="breadcrumb__link" href="<?php echo esc_url(home_url('/')); ?>">TOP</a> / <?php the_title(); ?></p>
            <p class="eyebrow page-hero__eyebrow">Access &amp; Reservation</p>
            <h1 class="page-hero__title">お待ちしております。</h1>
            <p class="page-hero__lead">ご予約はお電話、またはフォームより承っております。当日のご来店ももちろん歓迎です。</p>
            </div>
        </div>

        <section>
            <div class="container grid-2">
            <div>
                <div class="map-embed">
                <iframe class="map-embed__frame" src="https://www.google.com/maps?q=Yanaka+Ginza+Shopping+Street,+Tokyo&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="ひなたコーヒー周辺の地図（サンプル）" allowfullscreen></iframe>
                </div>
                <p style="margin-top:16px;color:var(--ink-soft);font-size:14px;">※本サイトはサンプルのため、実在する商店街（谷中銀座商店街付近）の地図を仮に表示しています。実際の制作では店舗所在地のGoogleマップを埋め込みます。</p>
            </div>
            <div>
                <table class="info-table">
                <tr><th>住所</th><td>〇〇県ひなた市中央町1-2-3</td></tr>
                <tr><th>最寄駅</th><td>ひなた駅 北口 徒歩4分</td></tr>
                <tr><th>駐車場</th><td>専用2台（満車時は近隣コインパーキングをご案内）</td></tr>
                <tr><th>営業時間</th><td>8:00 - 18:00（L.O. 17:30）</td></tr>
                <tr><th>定休日</th><td>毎週水曜日・年末年始</td></tr>
                <tr><th>電話</th><td>000-1234-5678</td></tr>
                <tr><th>座席</th><td>カウンター4席／テーブル12席</td></tr>
                </table>
            </div>
            </div>
        </section>

        <section class="alt">
            <div class="container">
            <div class="section-head">
                <p class="eyebrow section-head__eyebrow">Reservation</p>
                <h2 class="section-head__title">ご予約フォーム</h2>
                <p class="section-head__lead">3名様以上のご来店、貸切のご相談はこちらのフォームが便利です。少人数・当日のご来店はお電話が確実です。</p>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="e58e2c3" title="予約フォーム" html_class="form"]'); ?>            </div>
        </section>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>