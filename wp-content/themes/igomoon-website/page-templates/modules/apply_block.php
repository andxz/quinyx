<section class="module module-apply-block py-5">

    <div class="container">

        <div class="row py-5 d-flex justify-content-center align-items-center">
            <div class="col max-width-600 text-center">

                <?php if( $content['rubrik'] ) : ?>
                        <h1 class=""><?= $content['rubrik'] ?></h1>
                <?php endif ; ?>

                <?php if( $content['text'] ) : ?>
                        <div class=""><?= $content['text'] ?></div>
                <?php endif ; ?>


                <div class="col-12 d-block">
                    <form>
                        <label class="font-weight-bold">Välj årskurs *</label>
                        <select id="select-type-of-school">
                            <option selected>Välj förskola eller grundskola</option>
                                <?php if ( $content['repeater'] ) : ?>
                                
                                    <option>Förskola</option>

                                <?php endif ; ?>

                                <?php if ( $content['repeater_grundskola'] ) : ?>
                            
                                    <option>Grundskola</option>

                                <?php endif ; ?>
                        </select>
                    </form>
                </div>


               <?php if ( $content['repeater'] ) : ?>

                    <div id="forskola" class="school-types">

                        <div class="select-type-of-förskola col-12 py-3">
                            <form>
                                <label class="font-weight-bold">Välj skola*</label>
                                <select id="select-forskola">
                                    <option>Välj förskola</option>
                                        <?php foreach( $content['repeater'] as $item ) : ?>
                                            <option><?= $item['forskola_namn'] ?></option> // "Myran i Märsta" _> myran_i_märsta 
                                        <?php endforeach ; ?>
                                </select>
                            </form>
                        </div>
                        
                        <div class="forskola-info-blocks">  
                            <?php foreach( $content['repeater'] as $item ) : ?>
                                <?php 
                                    $name = strtolower($item['forskola_namn']); // myran i märsta
                                    $name = str_replace(' ', '_', $name); // myran_i_märsta
                                ?>

                                <div class="forskola-info" id="<?= $name ?>">

                                    <?php if( $item['information'] ) : ?>
                                        <div class="text_apply_block_popup text-white p-5 text-left">
                                            <?= $item['information'] ?>

                                            <?php if( $item['cta_link'] ) : ?>
                                                <div class="text-center">
                                                    <a href="<?= $item['cta_link'] ?>" target="_blank" class="cta-button-white cta-button-mobile-white"><?= $item['cta_text'] ?></a>
                                                </div>
                                            <?php endif ; ?>
                        
                                        </div>    
                                    <?php endif ; ?>           
                                </div>
                                

                            <?php endforeach ; ?>
                        </div>

                    </div>

                <?php endif ; ?>



               <?php if ( $content['repeater_grundskola'] ) : ?>

                    <div id="grundskola" class="school-types">

                        <div class="select-type-of-grundskola col-12 py-3">
                            <form>
                                <label class="font-weight-bold">Välj skola*</label>
                                <select id="select-grundskola">
                                    <option>Välj grundskola</option>
                                        <?php foreach( $content['repeater_grundskola'] as $item ) : ?>
                                            <option><?= $item['grundskola_namn'] ?></option> // "Myran i Märsta" _> myran_i_märsta 
                                        <?php endforeach ; ?>
                                </select>
                            </form>
                        </div>
                        
                        <div class="grundskola-info-blocks py-3">  
                            <?php foreach( $content['repeater_grundskola'] as $item ) : ?>
                                <?php 
                                    $name = strtolower($item['grundskola_namn']); // myran i märsta
                                    $name = str_replace(' ', '_', $name); // myran_i_märsta
                                ?>

                                <div class="grundskola-info" id="<?= $name ?>">

                                    <?php if( $item['information'] ) : ?>

                                            <?= $item['information'] ?>

                                            <?= do_shortcode('[gravityform id="' . $item['application_form_id'] . '" title="false" description="false" ajax="true"]') ?>
                        
                                    <?php endif ; ?>           
                                </div>
                                

                            <?php endforeach ; ?>
                        </div>

                    </div>

                    <?php endif ; ?>



            </div>

    </div>

</section>