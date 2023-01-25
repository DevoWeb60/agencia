<?php

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/style.e2e1a33c.css', [], '1.0.0');
    wp_enqueue_style('fix', get_template_directory_uri() . '/style.css', [], '1.0.0');
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/main.ef23f591.js', [], '1.0.0', true);

    //   <link rel="stylesheet" href="style.e2e1a33c.css">
    //   <script src="main.ef23f591.js" defer=""></script>

});
