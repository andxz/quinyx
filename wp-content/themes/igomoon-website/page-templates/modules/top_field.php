<section class="module module-top-field py-5 text-white <?= $content['background']?>">

    <div class="container py-5">
        <div class="row d-flex align-items-center mx-auto py-lg-5">
            <div class="col-12 col-lg-6 align-self-stretch p-0 pr-lg-5">
                <div class="pr-lg-4">

                <?php if( $content['headline'] ) { ?>
                    <h1 class="pb-3"><?= $content['headline'] ?></h1>
                <?php } ?>

                <?php if( $content['blurb'] ) { ?>
                    <div class="blurb-top-field pb-3"><?= $content['blurb'] ?></div>
                 <?php } ?>

                <?php if( $content['top_field_cta_link'] ) { ?>
                    <a href="<?= $content['top_field_cta_link'] ?>" class="cta-button cta-button-mobile-white"><?= $content['top_field_cta_text'] ?></a>
                 <?php } ?>

            </div>
            </div>
            <?php if( $content['top_field_image'] ) { ?>
            <div class="col-12 col-lg-6 align-self-stretch bg-cover starpage-top-field-img mt-4 mt-lg-0" style="background-image: url(<?= $content['top_field_image']['url']?>)" title="<?= the_title() ?>">
            </div>
            <?php } ?>
        </div>
    </div>

</section>