<?php get_header(); ?>

    <main>
        <?php while (have_posts()): the_post();
            $categories = get_the_category();
            $category_name = $categories ? $categories[0]->name : '';
        ?>
            <div class="page-hero">
                <div class="container">
                    <p class="breadcrumb"><a class="breadcrumb__link" href="<?php echo esc_url(home_url('/')); ?>">TOP</a> / <a class="breadcrumb__link" href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a> / <?php the_title(); ?></p>
                    <p class="eyebrow page-hero__eyebrow">News</p>
                    <h1 class="page-hero__title"><?php the_title(); ?></h1>
                    <p class="page-hero__lead">
                        <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                        <span class="news-list__tag"><?php echo esc_html($category_name); ?></span>
                    </p>
                </div>
            </div>

            <section>
                <div class="container" style="max-width:720px;">
                    <div class="post__body">
                        <?php the_content(); ?>
                    </div>
                    <p class="post__back">
                        <a class="btn btn--outline" href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ一覧に戻る</a>
                    </p>
                </div>
            </section>
        <?php endwhile; ?>
    </main>

<?php get_footer(); ?>