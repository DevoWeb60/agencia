<article class="news">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?= the_permalink() ?>" title="<?= esc_attr(the_title()); ?>" class="news__image">
            <?= the_post_thumbnail('post-thumbnail') ?>
        </a>
    <?php else : ?>
        <img width="250" height="250" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mPcWA8AAecBMnAWmMIAAAAASUVORK5CYII=" class="news__image">
    <?php endif; ?>
    <div class="news__body">
        <header class="news__header">
            <?php $categories = get_the_category();
            if (!empty($categories)) : ?>
                <a class="news__tag" href="<?= get_term_link($categories[0]) ?>"><?= $categories[0]->name ?></a>
            <?php endif; ?>
            <a class="news__title" href="<?= the_permalink() ?>"><?php the_title() ?></a>
            <div class="news__date"><?= sprintf(__('Published on %s at %s', 'agencia'), get_the_date(), get_the_time()) ?></div>
        </header>
        <div class="news__content"><?= the_excerpt() ?></div>
        <a href="<?= the_permalink() ?>" class="news__action">
            Lire la suite
            <?= agencia_icon('arrow') ?>
        </a>
    </div>
</article>