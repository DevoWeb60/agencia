<?php
add_filter('next_posts_link_attributes', function ($attr) {
    return $attr . ' class="btn"';
});

add_filter('nav_menu_css_class', function (array $classes, WP_Post $item): array {
    if (is_singular('property') || is_post_type_archive('property')) {
        $classes = array_filter($classes, function ($class) {
            return $class !== 'current_page_parent';
        });
    }

    if (is_singular('property')) {
        $property = get_queried_object();
        $category = get_field('property_category', $property);
        if ($category === 'buy') {
            $condition = agencia_is_buy_url($item->url);
        } else {
            $condition = agencia_is_rent_url($item->url);
        }
        if ($condition === true) {
            $classes[] = 'current_page_parent';
        }
    }
    return $classes;
}, 10, 2);
