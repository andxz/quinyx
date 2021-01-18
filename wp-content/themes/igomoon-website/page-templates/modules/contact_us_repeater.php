<section class="module module-contact-us-repeater py-4 py-lg-5 <?= $content['background']?>">

    <div class="container py-5 max-width-1100">
            <div class="max-width-600 mx-auto px-0 text-center">

                <?php if( $content['rubrik'] ) : ?>
                    <h2 class="mb-3 pb-lg-2 text-md-center font-weight-bold"><?= $content['rubrik'] ?></h2>
                <?php endif ; ?>

                <?php if( $content['text'] ) : ?>
                    <div class="block-repeater-text"><?= $content['text'] ?></div>
                <?php endif ; ?>

            </div>

                <?php if( $content['repeater'] ) : ?>

                    <div class="pt-3 pt-lg-4 px-0 d-flex justify-content-center flex-wrap">

                            <?php foreach( $content['repeater'] as $item ) : ?>

                                <div class="col-12 col-lg-3 text-center">
                                    <div class="p-1">

                                    <?php if( $item['img'] ) : ?>
                                            <img src="<?= $item['img']['url'] ?>" class="contact-us-img pb-2">
                                    <?php endif ; ?>

                                    <?php if( $item['namn'] ) : ?>
                                        <div class="contact-us-repeater-namn px-0 py-2"><?= $item['namn'] ?></div>
                                    <?php endif ; ?>

                                    <?php if( $item['titel'] ) : ?>
                                        <div class="contact-us-repeater-titel px-0 py-1"><?= $item['titel'] ?></div>
                                    <?php endif ; ?>

                                    <?php if( $item['telefonnummer'] ) : ?>
                                        <div class="py-1">
                                            <i class="fas fa-phone"></i> <a href="tel:<?= $item['telefonnummer'] ?>" class="col-12 contact-us-repeater-telefonnummer px-0"><?= $item['telefonnummer'] ?></a>
                                        </div>
                                    <?php endif ; ?>

                                    <?php if( $item['mail'] ) : ?>
                                        <div class="py-1">
                                            <i class="far fa-envelope"></i> <a href="mailto:<?= $item['mail'] ?>" class="col-12 contact-us-repeater-mail px-0"><?= $item['mail'] ?></a>
                                        </div>
                                    <?php endif ; ?>

                                   </div>


                                </div>

                            <?php endforeach ; ?>

                        </div>
                    </div>

                <?php endif ; ?>
    </div>

</section>