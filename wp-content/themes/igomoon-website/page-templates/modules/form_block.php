<section class="module module-form-block py-5">

    <div class="container">

        <div class="row py-5 d-flex justify-content-center align-items-center">
            <div class="col max-width-600 text-center">

                <?php if( $content['rubrik'] ) : ?>
                        <h1 class=""><?= $content['rubrik'] ?></h1>
                <?php endif ; ?>

                <?php if( $content['text'] ) : ?>
                        <div class=""><?= $content['text'] ?></div>
                <?php endif ; ?>

                <?= do_shortcode('[gravityform id="' . $content['form_id'] . '" title="false" description="false" ajax="true"]') ?>


            </div>



        </div>

    </div>

</section>