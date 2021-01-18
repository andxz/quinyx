<section class="module module-text-field-repeater py-5 <?= $content['background']?>">

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mx-auto">
            <div class="col align-self-stretch pt-4 pb-0 px-0 py-lg-5 flex-column <?= $content['width']?>">

                <?php if( $content['text_field_repeater_rubrik'] ) : ?>
                    <h2 class=""><?= $content['text_field_repeater_rubrik'] ?></h2>
                <?php endif ; ?>
                
                <?php foreach( $content['repeater'] as $item ) : ?>

                    <?php if( $item['rubrik'] ) : ?>
                        <h4 class=""><?= $item['rubrik'] ?></h4>
                    <?php endif ; ?>

                    <?php if( $item['text'] ) : ?>
                        <div class="blurb-text-field-repeater pb-4"><?= $item['text'] ?></div>
                    <?php endif ?>

                <?php endforeach ; ?>

            </div>
        </div>
    </div>

</section>