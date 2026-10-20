<?php
function hinata_handle_contact_form() {
    $result = [
        'errors' => [],
        'values' => ['name' => '', 'email' => '', 'type' => 'production', 'message' => ''],
    ];

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return $result;
    }

    // 1. 合言葉(nonce)の確認
    if (!isset($_POST['hinata_contact_nonce']) || !wp_verify_nonce($_POST['hinata_contact_nonce'], 'hinata_contact')) {
        $result['errors'][] = '送信に失敗しました。ページを再読み込みして、もう一度お試しください。';
        return $result;
    }

    // 2. ハニーポット(ボット対策)
    if (!empty($_POST['hp_check'])) {
        wp_safe_redirect(home_url('/contact/thanks/'));
        exit;
    }

    // 3. 受け取って、無害な形に整える
    $values = [
        'name' => sanitize_text_field(wp_unslash($_POST['contact_name'] ?? '')),
        'email' => sanitize_email(wp_unslash($_POST['contact_email'] ?? '')),
        'type' => sanitize_key(wp_unslash($_POST['contact_type'] ?? '')),
        'message' => sanitize_textarea_field(wp_unslash($_POST['contact_message'] ?? '')),
    ];
    $result['values'] = $values;

    // 4. 入力チェック
    $types = [
        'production' => 'ホームページ制作のご相談',
        'quote' => 'お見積もり依頼',
        'other' => 'その他',
    ];
    if ($values['name'] === '') {
        $result['errors'][] = 'お名前を入力してください。';
    }
    if (!is_email($values['email'])) {
        $result['errors'][] = 'メールアドレスを正しく入力してください。';
    }
    if (!isset($types[$values['type']])) {
        $result['errors'][] = 'お問い合わせ種別を選んでください。';
    }
    if ($values['message'] === '') {
        $result['errors'][] = 'お問い合わせ内容を入力してください。';
    }
    if (count($result['errors']) > 0) {
        return $result;
    }

    // 5. 保存
    wp_insert_post([
        'post_type' => 'hinata_inquiry',
        'post_status' => 'private',
        'post_title' => $values['name'] . ' 様(' . $types[$values['type']] . ')',
        'meta_input' => [
            'contact_email' => $values['email'],
            'contact_type' => $types[$values['type']],
            'contact_message' => $values['message'],
        ],
    ]);

    // 6. メール送信
    $body = "お名前: {$values['name']}\nメール: {$values['email']}\n種別: {$types[$values['type']]}\n\n{$values['message']}";
    wp_mail(get_option('admin_email'), '【ひなたコーヒー】お問い合わせがありました', $body, ['Reply-To: ' . $values['email']]);

    // 7. 送信完了ページへ
    wp_safe_redirect(home_url('/contact/thanks/'));
    exit;
}