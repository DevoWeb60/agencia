<?php
$large = get_query_var('property-large', false);
?>
<a class="property <?php if ($large) {
                        echo "property--large";
                    } ?>" href="<?php the_permalink() ?>" title="<?= esc_attr(the_title()) ?>">
    <div class="property__image">
        <?php the_post_thumbnail($large ? 'property-thumbnail-large' : 'property-thumbnail'); ?>
    </div>
    <div class="property__body">
        <div class="property__location"><?php agencia_plugin_city() ?></div>
        <h3 class="property__title"><?php the_title() ?> - <?php the_field('surface') ?>m²</h3>
        <div class="property__price"><?php agencia_plugin_price() ?></div>
    </div>
</a>