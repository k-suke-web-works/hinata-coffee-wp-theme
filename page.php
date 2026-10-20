<?php get_header(); ?>

    <main>
        <?php while (have_posts()): the_post();?>
            <div class="page-hero">
                <div class="container">
                    <p class="breadcrumb"><a class="breadcrumb__link" href="<?php echo esc_url(home_url('/')); ?>">TOP</a> / <?php the_title(); ?></p>
                    <h1 class="page-hero__title"><?php the_title(); ?></h1>
                </div>
            </div>

            <section>
                <div class="container" style="max-width:720px;">
                    <?php the_content(); ?>
                </div>
            </section>
        <?php endwhile; ?>
    </main>

<?php get_footer(); ?>