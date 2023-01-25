<?php

add_filter('comment_form_default_fields', function (array $fields) {
    // foreach ($fields as $k => $field) {
    //     var_dump($k);
    //     var_dump(esc_html($field));
    //     echo '<br><br><br><br>';
    // }
    $authorLabel = __('Name');

    $fields['author'] = ' <div class="form-group">
                            <input type="text" id="author" name="author" class="form-control" required>
                            <label for="author">' . $authorLabel . '</label>
                        </div>';
    $fields['email'] = '<div class="form-group">
                            <input type="text" id="email" name="email" class="form-control" required>
                            <label for="email">E-mail</label>
                        </div>';
    unset($fields['url']);
    return $fields;
});

add_filter('comment_form_defaults', function (array $fields): array {
    $commentLabel = _x('Comment', 'noun');
    $fields['title_reply'] = '';
    $fields['class_submit'] = 'btn';
    $fields['class_form'] = 'form-2column';
    $fields['comment_field'] = '
        <textarea name="comment" id="comment" placeholder="' . $commentLabel . '" class="form-control full" required></textarea>
    ';
    return $fields;
});


add_filter('comment_form_fields', function (array $fields): array {
    $newFields = [];
    foreach ($fields as $k => $value) {
        if ($k !== 'comment') {
            if ($k === 'cookies') {
                $newFields['comment'] = $fields['comment'];
            }
            $newFields[$k] = $value;
        }
    }
    if (!isset($newFields['comment'])) {
        $newFields['comment'] = $fields['comment'];
    }
    return $newFields;
});
