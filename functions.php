<?php
add_theme_support('title-tag');

function hinata_enqueue_assets() {
    $uri = get_template_directory_uri();
    wp_enqueue_style('hinata-style', $uri . '/css/style.css', [], '1.1');
    wp_enqueue_script('hinata-main', $uri . '/js/main.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'hinata_enqueue_assets');

add_theme_support('post-thumbnails');

function hinata_register_post_types() {
    register_post_type('hinata_menu', [
        'labels' => [
            'name' => 'メニュー',
            'singular_name' => 'メニュー',
            'add_new_item' => 'メニューを追加',
            'edit_item' => 'メニューを編集',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'menu'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-coffee',
        'supports' => ['title', 'thumbnail', 'custom-fields'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('hinata_menu_category', 'hinata_menu', [
        'labels' => [
            'name' => 'メニューの分類',
            'singular_name' => 'メニューの分類',
            'add_new_item' => '分類を追加',
        ],
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'menu-category'],
    ]);

    register_post_type('hinata_inquiry', [
        'labels' => [
            'name' => 'お問い合わせ',
            'singular_name' => 'お問い合わせ',
        ],
        'public' => false,
        'show_ui' => true,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-email-alt',
        'supports' => ['title', 'custom-fields'],
    ]);
}
add_action('init', 'hinata_register_post_types');

function hinata_redirect_menu_single() {
    if (is_singular('hinata_menu')) {
        wp_safe_redirect(get_post_type_archive_link('hinata_menu'), 301);
        exit;
    }
}
add_action('template_redirect', 'hinata_redirect_menu_single');

require_once get_template_directory() . '/inc/contact-form.php';

add_filter('wpcf7_autop_or_not', '__return_false');

// ブロックパターンの分類
function hinata_register_pattern_category() {
    register_block_pattern_category('hinata-coffee', [
        'label' => 'ひなたコーヒー',
    ]);
}
add_action('init', 'hinata_register_pattern_category');