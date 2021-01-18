<?php if( $content['repeater'] ) : ?>

    <?php foreach( $content['repeater'] as $item ) : ?>

        <section class="module module-two-blocks mx-auto py-5 <?= $item['background']?>">

            <div class="container max-width-1100 px-3 px-lg-0 py-lg-5">
                
                        <div class="row d-flex mx-auto flex-wrap <?= $item['reversed_layout'] ? 'flex-lg-row-reverse' : '' ?>">
                    
                            <div class="col-12 col-lg-6 px-0 px-lg-5 pt-4 pb-4 pb-lg-5">

                                <?php if( $item['sub_rubrik_two_blocks'] ) : ?>

                                    <div class="sub-rubrik-two-blocks"><?= $item['sub_rubrik_two_blocks'] ?></div>

                                <?php endif ; ?>

                                <?php if( $item['rubrik_two_blocks'] ) : ?>

                                    <h2 class="mb-3 pb-lg-2"><?= $item['rubrik_two_blocks'] ?></h2>

                                <?php endif ; ?>

                                <?php if( $item['text_two_blocks'] ) : ?>

                                    <div class="two-blocks-text pb-1 pb-lg-0"><?= $item['text_two_blocks'] ?></div>

                                <?php endif ; ?>

                                <?php if( $item['cta_link'] ) : ?>

                                <a href="<?= $item['cta_link'] ?>" class="blue-link"><?= $item['cta_text'] ?> <i class="fas fa-arrow-right"></i></a> 

                                <?php endif ; ?>

                                <?php if( $item['cta_repeater'] ) : ?>

                                    <div class="col px-0 pt-3">

                                        <?php foreach( $item['cta_repeater'] as $link ) : ?>

                                            <?php if( $link['cta_link']['url'] ) : ?>

                                                <a href="<?= $link['cta_link']['url'] ?>" class="white-cta-button mr-2 mb-2"> <?= $link['cta_text'] ?> </a>
                                            
                                            <?php endif ; ?>

                                        <?php endforeach ; ?>

                                    </div>

                                <?php endif ; ?>

                            </div>

                                <?php if( $item['two_blocks_image'] ) : ?>

                                    <div class="col-12 col-lg-6 bg-cover two-blocks-img" style="background-image: url(<?= $item['two_blocks_image']['url']?>)" title="<?= the_title() ?>"></div>

                                <?php endif ; ?>
                        </div>

                </div>

        </section>

    <?php endforeach ; ?>
            
<?php endif ; ?>