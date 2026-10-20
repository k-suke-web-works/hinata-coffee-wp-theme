<?php get_header(); // header.php を読み込む ?>

<main>
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_time('Y年n月j日'); ?></p>
                <?php the_excerpt(); // 一覧では本文の全文ではなく「抜粋」を表示する ?>
            </article>
        <?php endwhile; ?>
    <?php else: ?>
        <p>記事がありません。</p>
    <?php endif; ?>
</main>

<?php get_footer(); // footer.php を読み込む ?>
