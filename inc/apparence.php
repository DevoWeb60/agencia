<?php
add_action('customize_register', function (WP_Customize_Manager $manager) {
    $manager->add_section('agencia_appearence', [
        'title' => __('Agencia Appearence'),
        'description' => __('Manage Agencia Appearence'),
    ]);

    $manager->add_setting('logo', [
        'sanitize_callback' => 'esc_url_raw'
    ]);
    $manager->add_control(new WP_Customize_Image_Control($manager, 'logo', [
        'label' => __('Logo'),
        'section' => 'agencia_appearence',
    ]));
});
