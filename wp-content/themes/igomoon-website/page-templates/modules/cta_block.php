<section class="module module-cta-block py-5 <?= $content['background']?>">

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mx-auto">
            <div class="col align-self-stretch pt-4 pb-0 px-0 py-lg-5 d-flex justify-content-center align-items-center flex-column <?= $content['width']?>">

                <?php if( $content['rubrik'] ) : ?>
                    <h2 class="pb-lg-2 text-center"><?= $content['rubrik'] ?></h2>
                <?php endif ; ?>

                <?php if( $content['text'] ) : ?>
                    <div class="blurb-cta-block"><?= $content['text'] ?>

                    </div>
                 <?php endif ?>

                <?php if( $content['link_or_form'] == 'link' ) : ?>
                        
                        <a href="<?= $content['cta_link'] ?>" class="cta-button" 
                            <?php if( $content['cta_external_link'] ) : ?>
                                target="_blank"
                            <?php endif ?>
                        ><?= $content['cta_text'] ?></a>

                <?php else : ?>
                        
                        <div class="cta-button" id="show_hidden_form"><?= $content['cta_text'] ?></div>

                        <div id="hidden_form" class="module-apply-block pt-4">

                            <?= do_shortcode('[gravityform id="' . $content['form_id'] . '" title="false" description="false" ajax="true"]') ?>

                        </div>

                <?php endif ; ?>

            </div>
        </div>
    </div>

</section>