<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.svg" type="image/svg+xml">
<link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon-32.png" sizes="32x32" type="image/png">
<link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon-16.png" sizes="16x16" type="image/png">
<link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/apple-touch-icon.png">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="container site-header__bar">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="brand"><span class="brand__mark"><svg class="brand__mark-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="4.5" fill="currentColor"/><g stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="12" y1="2" x2="12" y2="5"/><line x1="12" y1="19" x2="12" y2="22"/><line x1="2" y1="12" x2="5" y2="12"/><line x1="19" y1="12" x2="22" y2="12"/><line x1="4.9" y1="4.9" x2="7" y2="7"/><line x1="17" y1="17" x2="19.1" y2="19.1"/><line x1="4.9" y1="19.1" x2="7" y2="17"/><line x1="17" y1="7" x2="19.1" y2="4.9"/></g></svg></span>ひなたコーヒー</a>
    <nav class="site-nav" id="site-nav">
      <ul class="site-nav__list">
        <li><a class="site-nav__link" href="<?php echo esc_url(home_url('/')); ?>"<?php if (is_front_page()) echo ' aria-current="page"'; ?>>TOP</a></li>
        <li><a class="site-nav__link" href="<?php echo esc_url(home_url('/concept/')); ?>"<?php if (is_page('concept')) echo ' aria-current="page"'; ?>>こだわり</a></li>
        <li><a class="site-nav__link" href="<?php echo esc_url(home_url('/menu/')); ?>"<?php if (is_post_type_archive('hinata_menu')) echo ' aria-current="page"'; ?>>メニュー</a></li>
        <li><a class="site-nav__link" href="<?php echo esc_url(home_url('/access/')); ?>"<?php if (is_page('access')) echo ' aria-current="page"'; ?>>アクセス・予約</a></li>
        <li><a class="site-nav__link" href="<?php echo esc_url(home_url('/news/')); ?>"<?php if (is_home() || is_singular('post')) echo ' aria-current="page"'; ?>>お知らせ</a></li>
        <li><a class="site-nav__link" href="<?php echo esc_url(home_url('/contact/')); ?>"<?php if (is_page('contact')) echo ' aria-current="page"'; ?>>お問い合わせ</a></li>
        <li class="site-nav__cta"><a href="<?php echo esc_url(home_url('/access/')); ?>" class="btn btn--primary">ご予約はこちら</a></li>
      </ul>
    </nav>
    <button class="nav-toggle" data-nav-toggle aria-expanded="false" aria-controls="site-nav" aria-label="メニューを開く">
      <span class="nav-toggle__bar"></span><span class="nav-toggle__bar"></span><span class="nav-toggle__bar"></span>
    </button>
  </div>
</header>
