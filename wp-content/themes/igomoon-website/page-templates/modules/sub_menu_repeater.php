<section class="module module-sub-menu-repeater <?= $content['background']?>">

    <div class="container">
        <div class="py-4 d-flex justify-content-center align-items-center">

            <?php foreach( $content['menu_repeater'] as $link ) : ?>

                <?php if( $link['cta_link']['url'] ) : ?>
                    <a href="<?= $link['cta_link']['url'] ?>" class="white-cta-button"> <?= $link['cta_text'] ?> </a>
                <?php endif ; ?>

            <?php endforeach ; ?>

        </div>
    </div>

</section>