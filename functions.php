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

// 空き状況の表示 [puremam_vacancy]
function puremam_vacancy_shortcode() {
    if (!function_exists('get_field')) {
        return '';
    }

    $front_page_id = (int) get_option('page_on_front');
    $facilities = [
        'vacancy_1' => 'ぴゅあまむ１',
        'vacancy_2' => 'ぴゅあまむ２',
    ];
    $labels = [
        'open' => '空きあり',
        'full' => '満室',
    ];

    ob_start();
    ?>
    <div class="vacancy__container">
      <p class="vacancy__title">現在の空き状況</p>
      <div class="vacancy__cards">
        <?php foreach ($facilities as $field => $name): ?>
          <?php
          $status = get_field($field, $front_page_id);
          if (!isset($labels[$status])) {
              $status = 'full';
          }
          ?>
          <div class="vacancy__card">
            <span class="vacancy__lamp vacancy__lamp--<?php echo esc_attr($status); ?>" aria-hidden="true"></span>
            <span class="vacancy__name"><?php echo esc_html($name); ?></span>
            <span class="vacancy__status"><?php echo esc_html($labels[$status]); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('puremam_vacancy', 'puremam_vacancy_shortcode');