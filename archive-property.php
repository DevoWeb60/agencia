<?php get_header();
// $cities = get_terms([
//     'taxonomy' => 'property_city',
//     // 'hide_empty' => false,
// ]);
// $types = get_terms([
//     'taxonomy' => 'property_type',
//     // 'hide_empty' => false,
// ]);
// $currentCity = get_query_var('city');
// $currentPrice = get_query_var('price');
// $currentType = get_query_var('type');
// $currentRooms = get_query_var('rooms');
?>

<div class="container page-properties">
    <div class="search-form">
        <h1 class="search-form__title">Tout nos biens</h1>
        <p>Retrouver tous nos biens sur le secteur de <strong>Montpellier</strong></p>
        <hr>
        <?php get_template_part('template-parts/search', 'property'); ?>
    </div>



    <?php if (have_posts()) :
        $i = 0;
        while (have_posts()) :
            the_post();
            $i++;
            set_query_var('property-large', $i === 7);
            get_template_part('template-parts/property');
        endwhile;
    endif; ?>


</div>


<?php if (get_query_var('paged', 1) > 1) : ?>
    <?= agencia_paginate(); ?>
<?php elseif ($nextPostLink = get_next_posts_link(__('More properties +', 'agencia'))) : ?>
    <div class="pagination">
        <?= $nextPostLink; ?>
    </div>
<?php endif; ?>
<?php get_footer(); ?>