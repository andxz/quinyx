<section class="module module-four-blocks py-5 mx-auto <?= $content['background']?> 
    <?php if( $content['margin_top_minus_100px'] ) : ?>
    margin-top-minus-100
    <?php endif ; ?>">


    <div class="container max-width-1100 p-0">
        <div class="row d-flex mx-auto">
            <div class="col">

                <?php if( $content['repeater'] ) : ?>
                    <div class="d-flex row">

                    <?php foreach( $content['repeater'] as $item ) : ?>

                        <div class="col-12 col-lg-3 four-blocks-repeater">

                            <div class="repeater-col p-4 white-bg shadow mb-4 mb-lg-0">

                            <?php if( $item['icon'] ) : ?>

                                <img src="<?= $item['icon']['url'] ?>" class="reapeater-icon pb-2">

                            <?php endif ; ?>

                            <?php if( $item['rubrik'] ) : ?>

                                <h3 class="mb-1"><?= $item['rubrik'] ?> </h3>

                            <?php endif ; ?>

                            <?php if( $item['repeater_text'] ) : ?>

                                <div class="reapter-text"><?= $item['repeater_text'] ?> </div>

                            <?php endif ; ?>

                            <?php if( $item['cta_link']['url'] ) : ?>

                                <?php if ( $item ['open_in_new_window'] ) : ?>

                                    <a href="<?= $item['cta_link']['url'] ?>" class="blue-link" target="_blank"> <?= $item['cta_text'] ?> <i class="fas fa-external-link-alt"></i></a>

                                <?php else : ?>

                                    <a href="<?= $item['cta_link']['url'] ?>" class="blue-link"> <?= $item['cta_text'] ?> <i class="fas fa-arrow-right"></i></a>

                                <?php endif ; ?>

                            <?php endif ; ?>

                             </div>

                        </div>

                    <?php endforeach ; ?>

                    </div>
                 <?php endif ; ?>

                </div>
        </div>
    </div>

</section>