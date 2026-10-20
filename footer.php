<footer class="site-footer">
  <div class="container site-footer__row">
    <div>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="brand site-footer__brand"><span class="brand__mark"><svg class="brand__mark-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="4.5" fill="currentColor"/><g stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="12" y1="2" x2="12" y2="5"/><line x1="12" y1="19" x2="12" y2="22"/><line x1="2" y1="12" x2="5" y2="12"/><line x1="19" y1="12" x2="22" y2="12"/><line x1="4.9" y1="4.9" x2="7" y2="7"/><line x1="17" y1="17" x2="19.1" y2="19.1"/><line x1="4.9" y1="19.1" x2="7" y2="17"/><line x1="17" y1="7" x2="19.1" y2="4.9"/></g></svg></span>ひなたコーヒー</a>
      <p class="site-footer__lead">〇〇県ひなた市中央町1-2-3<br>8:00 - 18:00（水休）</p>
    </div>
    <div>
      <h4 class="site-footer__heading">Menu</h4>
      <ul>
        <li class="site-footer__list-item"><a class="site-footer__link" href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
        <li class="site-footer__list-item"><a class="site-footer__link" href="<?php echo esc_url(home_url('/concept/')); ?>">こだわり</a></li>
        <li class="site-footer__list-item"><a class="site-footer__link" href="<?php echo esc_url(home_url('/menu/')); ?>">メニュー</a></li>
      </ul>
    </div>
    <div>
      <h4 class="site-footer__heading">Info</h4>
      <ul>
        <li class="site-footer__list-item"><a class="site-footer__link" href="<?php echo esc_url(home_url('/access/')); ?>">アクセス・予約</a></li>
        <li class="site-footer__list-item"><a class="site-footer__link" href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
        <li class="site-footer__list-item"><a class="site-footer__link" href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
      </ul>
    </div>
    <div>
      <h4 class="site-footer__heading">Social</h4>
      <ul>
        <li class="site-footer__list-item"><a class="site-footer__link" href="#">Instagram</a></li>
        <li class="site-footer__list-item"><a class="site-footer__link" href="#">X（旧Twitter）</a></li>
      </ul>
    </div>
  </div>
  <div class="site-footer__bottom">
    <span>&copy; <?php echo esc_html(date('Y')); ?> Hinata Coffee</span>
    <span>本サイトはWeb制作デモ用のサンプルです</span>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>