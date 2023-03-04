<?php
$property = $args['property'];
$class = $args['class'] ?? '';
?>
<div class="highlighted <?= $class ?>">
    <?= get_the_post_thumbnail($property, 'property-thumbnail-home') ?>
    <div class="highlighted__body">
        <div class="highlighted__title"><a href="<?= get_the_permalink($property) ?>"><?= get_the_title($property) ?></a></div>
        <div class="highlighted__price"><?= agencia_plugin_price($property) ?></div>
        <div class="highlighted__location"><?= agencia_plugin_city($property) ?></div>
        <div class="highlighted__space"><?= the_field('surface', $property) ?>m²</div>
    </div>
</div>