<section class="module module-text-field-toggle mx-auto py-5">

    <div class="py-5">

        <?php if( $content['repeater'] ) : ?>

            <?php foreach( $content['repeater'] as $item ) : ?>

                <div class="container">
                    
                    <div class="row d-flex mx-auto flex-wrap max-width-800 toggle-wrapper">
                        
                        <?php if( $item['rubrik'] ) : ?>

                
                            <div class="col-12 row d-flex justify-content-between toggler">

                                <h2 class="text-field-toggle-header mb-3 pb-lg-2"><?= $item['rubrik'] ?></h2>

                            </div>

                            <?php endif ; ?>

                            <?php if( $item['text'] ) : ?>

                                <div class="col-12 two-blocks-text slide-toggle display-none px-0"><?= $item['text'] ?></div>

                            <?php endif ; ?>

                        </div>

                    </div>
                
            <?php endforeach ; ?>
                
        <?php endif ; ?>
    
    </div>

</section>