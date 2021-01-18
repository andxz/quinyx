<section class="module module-blocks-repeater py-4 py-lg-5 <?= $content['background']?>">

    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center mx-auto">
            <div class="col-12 max-width-700 align-self-stretch px-0">

                <?php if( $content['rubrik'] ) : ?>
                    <h2 class="mb-3 pb-lg-2 text-md-center"><?= $content['rubrik'] ?></h2>
                <?php endif ; ?>

                <?php if( $content['text'] ) : ?>
                    <div class="block-repeater-text"><?= $content['text'] ?></div>
                <?php endif ; ?>

            </div>

                <?php if( $content['repeater'] ) : ?>

                    <div class="col-12 max-width-1100 align-self-stretch pt-3 pt-lg-4 px-0">
                        <div class="d-flex row">

                            <?php foreach( $content['repeater'] as $item ) : ?>

                                <div class="col-12 <?= $content['col']?>">
                                    <div class="p-1">

                                    <?php if( $item['rubrik'] ) : ?>
                                        <h5 class="blue h4-blocks-repeater text-left mb-2"><?= $item['rubrik'] ?></h5>
                                    <?php endif ; ?>

                                    <?php if( $item['repeater_text'] ) : ?>
                                        <div class="blocks-reapter-text pb-1"><?= $item['repeater_text'] ?> </div>
                                    <?php endif ; ?>

                                    </div>
                                </div>

                            <?php endforeach ; ?>

                        </div>

                    </div>

                <?php endif ; ?>

        </div>
    </div>

</section>