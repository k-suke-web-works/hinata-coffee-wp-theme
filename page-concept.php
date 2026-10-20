<?php get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-hero">
            <div class="container">
            <p class="breadcrumb"><a class="breadcrumb__link" href="<?php echo esc_url(home_url('/')); ?>">TOP</a> / <?php the_title(); ?></p>
            <p class="eyebrow page-hero__eyebrow">Our Story</p>
            <h1 class="page-hero__title">一杯のうしろにある、<br>4つのこだわり。</h1>
            <p class="page-hero__lead">豆を選ぶところから、あなたのテーブルに届くまで。ひなたコーヒーがひとつずつ積み重ねてきたことをご紹介します。スクロールしてお読みください。</p>
            </div>
        </div>

        <div class="story-split">
            <div class="story-split__side" data-split-side="left" aria-label="生豆の写真">
            <div class="photo photo--filled"><img class="photo__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/green-beans.jpg" alt="生豆" loading="lazy"></div>
            </div>

            <div class="story-split__center">

            <article class="story-split__chapter" data-left-img="<?php echo esc_url(get_template_directory_uri()); ?>/images/bean-selection.jpg" data-left-alt="生豆の選定" data-right-img="<?php echo esc_url(get_template_directory_uri()); ?>/images/farm-negotiation.jpg" data-right-alt="農園とのやり取り" data-label="豆選びの様子">
                <p class="eyebrow story-split__chapter-eyebrow">01 — 豆選び</p>
                <h3 class="story-split__chapter-title">直接相談できる、豆だけを。</h3>
                <p class="story-split__chapter-text">代理店を挟まず、ご担当者様から直接お話をうかがっています。理由はシンプルで、事業への想いを聞ける方が、言葉選びに迷わないからです。</p>
                <p class="story-split__chapter-text">ヒアリングは一度きりで終わらせず、構成案の段階でも認識をすり合わせながら進めています。</p>
            </article>

            <article class="story-split__chapter" data-left-img="<?php echo esc_url(get_template_directory_uri()); ?>/images/roaster-smoke.jpg" data-left-alt="焙煎機と煙" data-right-img="<?php echo esc_url(get_template_directory_uri()); ?>/images/roasting-log.jpg" data-right-alt="焙煎ログノート" data-label="焙煎の様子">
                <p class="eyebrow story-split__chapter-eyebrow">02 — 焙煎</p>
                <h3 class="story-split__chapter-title">週2回、必要な分だけ焙煎。</h3>
                <p class="story-split__chapter-text">テンプレートの使い回しはしていません。案件ごとに、そのお店らしさに合わせて一からコーディングしています。</p>
                <p class="story-split__chapter-text">制作の過程はすべて記録し、修正のご要望にも同じ考え方で素早く対応できるようにしています。</p>
            </article>

            <article class="story-split__chapter" data-left-img="<?php echo esc_url(get_template_directory_uri()); ?>/images/hand-drip.jpg" data-left-alt="ハンドドリップ" data-right-img="<?php echo esc_url(get_template_directory_uri()); ?>/images/cup-steam.jpg" data-right-alt="カップとお湯の湯気" data-label="抽出の様子">
                <p class="eyebrow story-split__chapter-eyebrow">03 — 抽出</p>
                <h3 class="story-split__chapter-title">一杯ずつ、ハンドドリップで。</h3>
                <p class="story-split__chapter-text">効率だけを優先すれば、もっと早く終わらせることもできます。それでも、表示速度や操作感は妥協せず、ページごとに調整しています。</p>
                <p class="story-split__chapter-text">公開までに少しだけお時間をいただきますが、そのぶん長く使っていただけるサイトになります。</p>
            </article>

            <article class="story-split__chapter" data-left-img="<?php echo esc_url(get_template_directory_uri()); ?>/images/window-seat.jpg" data-left-alt="窓際の席" data-right-img="<?php echo esc_url(get_template_directory_uri()); ?>/images/bookshelf-seat.jpg" data-right-alt="本棚とひとり席" data-label="店内の様子">
                <p class="eyebrow story-split__chapter-eyebrow">04 — 空間</p>
                <h3 class="story-split__chapter-title">長居しても、気まずくない席を。</h3>
                <p class="story-split__chapter-text">初めて来た方も、迷わず目的の情報にたどり着けるように。ナビゲーションや導線を丁寧に設計しています。</p>
                <p class="story-split__chapter-text">派手さより、読みやすさと使いやすさを大切にしています。</p>
            </article>

            </div>

            <div class="story-split__side" data-split-side="right" aria-label="農園の写真">
            <div class="photo photo--filled"><img class="photo__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/farm.jpg" alt="農園" loading="lazy"></div>
            </div>
        </div>

        <section class="alt text-center">
            <div class="container" style="max-width:560px;">
            <p class="eyebrow" style="justify-content:center;">Next</p>
            <h2 style="margin:16px 0 20px;">実際に、味わいに来てください。</h2>
            <p style="color:var(--ink-soft);margin-bottom:28px;">メニューの詳細や、ご予約方法はこちらからご確認いただけます。</p>
            <div class="button-group button-group--center">
                <a href="<?php echo esc_url(home_url('/menu/')); ?>" class="btn btn--outline">メニューを見る</a>
                <a href="<?php echo esc_url(home_url('/access/')); ?>" class="btn btn--primary">ご予約・アクセス</a>
            </div>
            </div>
        </section>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>