<section class="module module-contact-us py-5">
    
    <div class="col-12 contact-head light-blue-bg d-flex justify-content-center align-items-center mx-auto">
        
        <?php if( $content['header_text'] ) : ?>
            <?= $content['header_text'] ?>
        <?php endif ; ?>

        <?php if( $content['cta_link'] ) : ?>
            <a href="<?= $content['cta_link'] ?>" class="blue-link-contact-head pl-1"><?= $content['cta_text'] ?> <i class="fas fa-arrow-right"></i></a> 
        <?php endif ; ?>

    </div>
        

    <div class="container">

            <div class="col text-center pt-4">
            
                <?php if( $content['kontaktformular_rubrik'] ) : ?>
                    <h1 class="contact-us-headline"><?= $content['kontaktformular_rubrik'] ?></h1>
                <?php endif ; ?>
                            
                <?php if( $content['kontaktformular_text'] ) : ?>
                    <div class="blurb-text-field-repeater mx-auto max-width-600"><?= $content['kontaktformular_text'] ?></div>
                <?php endif ?> 
    
            </div>

        <div class="row py-5">

                <div class="col-12 col-lg-8 pt-5 pt-lg-0">

                    <div class="contact-field-form">
                        <?= do_shortcode('[gravityform id="' . $content['contact_form_field_form_id'] . '" title="false" description="false" ajax="true"]') ?>
                    </div>

                </div>

                <div class="col-12 col-lg-4 d-flex">
                    <div class="col-12 d-flex flex-column pt-5 pt-lg-0">

                        <?php if( $content['rubrik'] ) : ?>
                            <h2 class="pt-5 pt-lg-0"><?= $content['rubrik'] ?></h2>
                        <?php endif ; ?>

                        <?php if( $content['text'] ) : ?>
                            <div class="blurb-text-field-repeater pb-4"><?= $content['text'] ?></div>
                        <?php endif ?>

                            <?php if( $content['repeater'] ) : ?>
                                    <?php foreach( $content['repeater'] as $schoolType ) : ?>

                                        <div class="repeater-wrapper toggle-wrapper">

                                            <?php if( $schoolType['rubrik'] ) : ?>
                                                <div class="toggler">
                                                    <h3 class="schooltype-headline"><?= $schoolType['rubrik'] ?></h3>
                                                </div>
                                            <?php endif ; ?>
                                                    
                                                <?php if( $schoolType['repeater_skolnamn'] ) : ?>
                                                    <div class="repeater-content display-none slide-toggle">
                                                        <?php foreach( $schoolType['repeater_skolnamn'] as $schoolRepeater ) : ?>

                                                            <div class="toggle-wrapper">
                                                                <?php if( $schoolRepeater['rubrik'] ) : ?>
                                                                    <h4 class="school-repeater-headline toggler pl-3 my-3"><?= $schoolRepeater['rubrik'] ?></h4>
                                                                <?php endif ; ?>

                                                                <?php if( $schoolRepeater['repeater_kontaktinfo'] ) : ?>
                                                                    <div class="repeater-info-content display-none slide-toggle pl-3">
                                                                        <?php foreach( $schoolRepeater['repeater_kontaktinfo'] as $schoolContactInfo ) : ?>

                                                                            <div class="school-contact-info-block py-3 d-flex flex-column">
                                                                                <?php if( $schoolContactInfo['namn'] ) : ?>
                                                                                    <div class="col-12 school-contact-info px-0 blue font-weight-bold"><?= $schoolContactInfo['namn'] ?></div>
                                                                                <?php endif ; ?>
                                                                                <?php if( $schoolContactInfo['position'] ) : ?>
                                                                                    <div class="col-12 school-contact-info px-0"><?= $schoolContactInfo['position'] ?></div>
                                                                                <?php endif ; ?>
                                                                                <?php if( $schoolContactInfo['telefonnummer'] ) : ?>
                                                                                    <a href="tel:<?= $schoolContactInfo['telefonnummer'] ?>" class="col-12 school-contact-info contact-link px-0"><?= $schoolContactInfo['telefonnummer'] ?></a>
                                                                                <?php endif ; ?>
                                                                                <?php if( $schoolContactInfo['mail'] ) : ?>
                                                                                    <a href="mailto:<?= $schoolContactInfo['mail'] ?>" class="col-12 school-contact-info contact-link px-0"><?= $schoolContactInfo['mail'] ?></a>
                                                                                <?php endif ; ?>
                                                                            </div>

                                                                        <?php endforeach ; ?>
                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        <?php endforeach ; ?>
                                                    </div>
                                                <?php endif ?>



                                        </div>
                                    <?php endforeach ; ?>
                            <?php endif ?>


                    </div>
                </div>

        </div>

    </div>

</section>