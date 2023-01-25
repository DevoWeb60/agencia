<?php
add_filter('next_posts_link_attributes', function ($attr) {
    return $attr . ' class="btn"';
});
