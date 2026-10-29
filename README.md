# Hinata Coffee WordPress テーマ

架空のコーヒースタンド「ひなたコーヒー」の静的サイト([k-suke-web-works/hinata-coffee](https://github.com/k-suke-web-works/hinata-coffee))を、WordPressのオリジナルテーマ(クラシックテーマ)として作り直したものです。

お知らせ・メニュー・固定ページ・お問い合わせ・予約のすべてを、お店の方が管理画面から更新・確認できることを目標にしています。

> 店舗名・住所・メニュー・写真・文章はすべて制作用の架空のサンプルです。

## 主な実装

### テンプレート構成

| ページ | テンプレート | 内容 |
|---|---|---|
| トップ | `front-page.php` | 最新のお知らせ3件、おすすめメニュー3品を自動で表示 |
| お知らせ一覧 | `home.php` | 投稿の一覧(日付・カテゴリー付き) |
| お知らせ詳細 | `single.php` | 投稿の詳細 |
| メニュー | `archive-hinata_menu.php` | カスタム投稿タイプの一覧を、分類ごとに表示 |
| こだわり | `page-concept.php` | スクロールに合わせて写真が切り替わるページ |
| アクセス・予約 | `page-access.php` | 地図、店舗情報、予約フォーム(Contact Form 7) |
| お問い合わせ | `page-contact.php` | 自作のお問い合わせフォーム |
| その他の固定ページ | `page.php` | 送信完了ページなど、本文を管理画面で書くページ |

共通部分は `header.php` / `footer.php`、繰り返し使う部品は `template-parts/` に分けています。

### メニュー(カスタム投稿タイプ)

- カスタム投稿タイプ `hinata_menu` と、分類用のカスタムタクソノミー `hinata_menu_category`(コーヒー / ドリンク・フード)を `functions.php` で登録
- 価格(`price`)とおすすめの目印(`pickup`)はカスタムフィールドで管理
- メニューページは `WP_Query` の `tax_query` で分類ごとに、トップページは `meta_key` / `meta_value` でおすすめだけを取得
- メニューのカードは `template-parts/menu-item.php` に部品化し、`get_template_part()` の引数で、トップページだけ価格に「〜」を付けて表示
- メニュー1品ごとのURLは、一覧ページへ301リダイレクト(`template_redirect`)

### お問い合わせフォーム(自作)

プラグインを使わず、WordPressの関数で作っています(`inc/contact-form.php`)。

- `wp_nonce_field()` / `wp_verify_nonce()` による不正な送信(CSRF)の防止
- 画面に見えない入力欄(ハニーポット)によるボット対策
- `sanitize_text_field()` などによる入力値の無害化と、PHP側での入力チェック(選択肢の値も、決められた値かを確認)
- 入力エラー時は、エラーと入力内容を同じページに再表示(出力時は `esc_attr()` などでエスケープ)
- 送信内容は、管理画面だけで見られる非公開の投稿タイプ `hinata_inquiry` に保存し、管理者へ `wp_mail()` で通知
- 送信後は送信完了ページ(`/contact/thanks/`)へリダイレクトし、再読み込みによる二重送信を防止

### 予約フォーム(Contact Form 7)

- Contact Form 7 で作成したフォームを `do_shortcode()` でテンプレートに埋め込み、テーマのCSSに合わせて表示
- お客様への自動返信メール、Flamingo による送信内容の保存

### ブロックエディタ対応

- `theme.json`(バージョン3)で、エディタで選べる色をテーマの7色に、文字の大きさを3段階に限定(自由な色・大きさは選べない設定)。お店の方が記事を書いても、デザインから外れにくくしています
- フォント(見出し・ボタンはゴシック体、本文は明朝体)と、ボタンブロックの標準のデザインを、テーマのボタンと同じ見た目に設定
- 本文のブロック同士の間隔を、テーマのCSS(`.post__body`)でそろえる
- ブロックパターン「期間限定メニューのお知らせ」を `patterns/` に登録(独自の分類「ひなたコーヒー」)。お店の方は、文字を書き換えるだけでお知らせを作れます

### その他

- ナビゲーションの現在地表示(`is_front_page()`、`is_page()`、`is_post_type_archive()` などの条件分岐タグで `aria-current="page"` を付与)
- CSS・JavaScriptは `wp_enqueue_style()` / `wp_enqueue_script()` で読み込み
- `<title>` は `add_theme_support('title-tag')` で自動出力

## 動作確認環境

- WordPress 7.1
- PHP 8.2(XAMPP)
- Contact Form 7 6.1 / Flamingo 2.6

## セットアップ

1. このフォルダを `wp-content/themes/hinata-coffee` に置き、「外観 → テーマ」で有効化
2. 「設定 → パーマリンク」で「投稿名」を選んで保存
3. 固定ページを作成

   | タイトル | スラッグ | 備考 |
   |---|---|---|
   | トップ | `top` | |
   | お知らせ | `news` | |
   | こだわり | `concept` | |
   | アクセス・予約 | `access` | |
   | お問い合わせ | `contact` | |
   | 送信完了 | `thanks` | 親ページ: お問い合わせ |

4. 「設定 → 表示設定」で、ホームページを「トップ」、投稿ページを「お知らせ」に設定
5. 投稿のカテゴリー(お知らせ / 営業 / イベント / メニュー)と、メニューの分類(コーヒー `coffee` / ドリンク・フード `drink-food`)を作成
6. メニューを登録し、アイキャッチ画像、カスタムフィールド `price`(価格)、必要に応じて `pickup`(値 `1` でトップページに表示)を設定
7. Contact Form 7 で予約フォームを作成し、`page-access.php` のショートコードのIDを置き換える

## ファイル構成

```
hinata-coffee/
├─ style.css                 テーマ情報
├─ theme.json                エディタの色・文字の大きさ・フォント・ボタンの設定
├─ functions.php             テーマ設定、CSS・JSの読み込み、投稿タイプ・分類の登録
├─ inc/contact-form.php      お問い合わせフォームの処理
├─ header.php / footer.php
├─ front-page.php / home.php / single.php / index.php
├─ page.php / page-concept.php / page-access.php / page-contact.php
├─ archive-hinata_menu.php
├─ template-parts/
│   ├─ news-row.php          お知らせ1行分
│   └─ menu-item.php         メニューのカード
├─ patterns/
│   └─ news-limited-menu.php ブロックパターン(期間限定メニューのお知らせ)
├─ css/style.css
├─ js/main.js
└─ images/
```

## 今後の改善予定

- カテゴリー一覧・検索結果・404ページ用のテンプレート(`archive.php`、`search.php`、`404.php`)
- 価格やおすすめの入力欄を、Advanced Custom Fields で入力しやすくする
- Contact Form 7 のフォームIDをテンプレートに直接書かない形にする

## 更新履歴

- 1.1: ブロックエディタ対応(`theme.json`、ブロックパターン、本文のブロックの間隔)
- 1.0: 初版