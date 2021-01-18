<section class="module module-text-field position-relative py-5 <?= $content['background']?>">

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mx-auto">
            <div class="col align-self-stretch pt-4 pb-0 px-0 py-lg-5 d-flex justify-content-center align-items-center flex-column <?= $content['width']?>">

                <?php if( $content['rubrik'] ) : ?>
                    <h2 class="pb-lg-2 text-center"><?= $content['rubrik'] ?></h2>
                <?php endif ; ?>

                <?php if( $content['text'] ) : ?>
                    <div class="blurb"><?= $content['text'] ?>

                    <?php if( $content['blue_text'] ) : ?>
                         <div class="blue-text text-center"><?= $content['blue_text'] ?></div>
                    <?php endif ?>

                    </div>
                 <?php endif ?>

                <?php if( $content['cta_link'] ) : ?>
                    <a href="<?= $content['cta_link'] ?>" class="cta-button"><?= $content['cta_text'] ?></a>
                <?php endif ?>

            </div>
        </div>
    </div>

</section>