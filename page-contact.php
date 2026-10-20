<?php
$contact = hinata_handle_contact_form();
get_header();
?>

<main>
<?php while (have_posts()): the_post(); ?>
  <div class="page-hero">
    <div class="container">
      <p class="breadcrumb"><a class="breadcrumb__link" href="<?php echo esc_url(home_url('/')); ?>">TOP</a> / <?php the_title(); ?></p>
      <p class="eyebrow page-hero__eyebrow">Contact</p>
      <h1 class="page-hero__title">お問い合わせ</h1>
      <p class="page-hero__lead">ホームページ制作のご相談、お見積もりに関するお問い合わせはこちらから。</p>
    </div>
  </div>

  <section>
    <div class="container">
        <?php if (count($contact['errors']) > 0): ?>
        <div class="form__errors" role="alert">
            <ul>
            <?php foreach ($contact['errors'] as $error): ?>
                <li><?php echo esc_html($error); ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        <form class="form" method="post" action="<?php echo esc_url(get_permalink()); ?>">
        <?php wp_nonce_field('hinata_contact', 'hinata_contact_nonce'); ?>
        <div class="form__honeypot" aria-hidden="true">
          <label for="c-hp">この欄は入力しないでください</label>
          <input id="c-hp" type="text" name="hp_check" tabindex="-1" autocomplete="off">
        </div>
        <div>
          <label for="c-name">お名前</label>
          <input id="c-name" type="text" name="contact_name" value="<?php echo esc_attr($contact['values']['name']); ?>" required>        </div>
        <div>
          <label for="c-email">メールアドレス</label>
          <input id="c-email" type="email" name="contact_email" value="<?php echo esc_attr($contact['values']['email']); ?>" required>
        </div>
        <div class="form__field--full">
          <fieldset>
            <label>お問い合わせ種別</label>
            <div class="form__radio-group">
              <label><input type="radio" name="contact_type" value="production" <?php checked($contact['values']['type'], 'production'); ?>> ホームページ制作のご相談</label>
              <label><input type="radio" name="contact_type" value="quote" <?php checked($contact['values']['type'], 'quote'); ?>> お見積もり依頼</label>
              <label><input type="radio" name="contact_type" value="other" <?php checked($contact['values']['type'], 'other'); ?>> その他</label>
            </div>
          </fieldset>
        </div>
        <div class="form__field--full">
          <label for="c-message">お問い合わせ内容</label>
          <textarea id="c-message" name="contact_message" required placeholder="ご相談内容をご記入ください"><?php echo esc_textarea($contact['values']['message']); ?></textarea>
        </div>
        <div class="form__field--full">
          <button type="submit" class="btn btn--primary">送信する</button>
        </div>
      </form>
    </div>
  </section>
<?php endwhile; ?>
</main>

<?php get_footer(); ?>