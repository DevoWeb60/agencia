<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="container">
            <header class="bien-header">
                <div>
                    <h1 class="bien__title"><?php the_title(); ?></h1>
                    <div class="bien__meta">
                        <div class="bien__location"><?= agencia_plugin_city(get_post()) ?></div>
                        <div class="bien__price">
                            <?php agencia_plugin_price() ?>
                        </div>
                    </div>
                    <div class="bien__actions">
                        <button class="btn btn-filled">Contacter l'agence</button>
                        <button class="btn">Appeler</button>
                    </div>

                    <!--
        <form action="" class="bien__form form-2column">
          <div class="form-group">
            <input type="text" id="username" class="form-control">
            <label for="username">Pseudo</label>
          </div>
          <div class="form-group">
            <input type="text" id="email" class="form-control">
            <label for="email">Email</label>
          </div>
          <textarea placeholder="Message" class="form-control full"></textarea>
          <button type="submit" class="btn">Commenter</button>
        </form>
        -->
                </div>
                <div>
                    <div class="bien__photos js-slider">
                        <?php foreach (get_attached_media('image', get_post()) as $image) : ?>
                            <a href="<?= wp_get_attachment_url($image->ID) ?>">
                                <img class="bien__photo" src="<?= wp_get_attachment_image_url($image->ID, 'property-carousel') ?>" alt="">
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </header>




            <div class="bien-body">
                <h2 class="bien-body__title"><?= __('Description', 'agencia') ?></h2>
                <div class="formatted"><?php the_content() ?></div>
            </div>


            <?php
            $options = get_the_terms(get_post(), 'property_option');
            ?>
            <section class="bien-options">
                <div class="bien-option"><img src="<?= get_template_directory_uri() ?>/assets/area.78237e19.svg" alt=""> <?= __('Superficie', 'agencia') ?> : <?= get_field('surface') ?>m² </div>
                <div class="bien-option"><img src="<?= get_template_directory_uri() ?>/assets/rooms.b02e3d15.svg" alt=""> <?= __('Rooms', 'agencia') ?> : <?= get_field('rooms') ?></div>
                <div class="bien-option"><img src="<?= get_template_directory_uri() ?>/assets/elevator-fill.117c4510.svg" alt=""> <?= __('Floor', 'agencia') ?> : <?= get_field('floor') ?> </div>
                <?php foreach ($options as $option) : ?>
                    <div class="bien-option"><img src="<?= the_field('icone', $option) ?>" alt=""><?= $option->name ?></div>
                <?php endforeach; ?>
            </section>

        </div>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>