<section class="module module-img-top-field <?= $content['background']?> img-top-field bg-cover" style="background-image: url(<?= $content['img_top_field']['url']?>)" title="<?= the_title() ?>">

    <?php if( $content['img_top_field']['url'] ) : ?>
            <div class="black-overlay text-white">

                <div class="container">
                    <div class="py-5 max-width-700 <?php if( $content['center_div'] ) : ?> mx-auto text-lg-center <?php endif ; ?>">

                            <div class="max-width-800 py-lg-5 px-0">

                                <?php if( $content['rubrik'] ) : ?>
                                    <h1 class="rubrik-img-top-field mb-3"><?= $content['rubrik'] ?></h1>
                                <?php endif ?>

                                <?php if( $content['text'] ) : ?>
                                    <div class=".img-top-field-blurb pb-1"><?= $content['text'] ?></div>
                                <?php endif ?>

                                <?php if( $content['cta_link'] ) { ?>
                                    <a href="<?= $content['cta_link'] ?>" class="cta-button"><?= $content['cta_text'] ?></a>
                                <?php } ?>

                            </div>
                    </div>
                </div>
            </div>
    <?php endif ?>

</section>