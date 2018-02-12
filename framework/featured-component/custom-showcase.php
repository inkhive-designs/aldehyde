<?php
/* The Template to Render the showcase
*
*/

//Define all Variables.
?>
<?php if(get_theme_mod('aldehyde_showcase_enable')): ?>
<div id="showcase" class="featured-area">
    <div class="container">
        <div class="showcase-container">
            <div class="showcase-wrapper">
                <?php

                //showcase 1
                $url1 = esc_url ( get_theme_mod('aldehyde_showcase_url1') );
                $title1 = esc_html( get_theme_mod('aldehyde_showcase_title1') );
                $desc1 = esc_html( get_theme_mod('aldehyde_showcase_desc1') );
                $img1 = esc_url ( get_theme_mod('aldehyde_showcase_img1') );
                $image_id1 = aldehyde_get_image_id1($img1);
                $img_size1 = wp_get_attachment_image( $image_id1, $size='showcase-thumb-1' );
                $img_size_mob1 = wp_get_attachment_image( $image_id1, $size='pop-thumb' );


                //showcase 2
                $url2 = esc_url ( get_theme_mod('aldehyde_showcase_url2') );
                $title2 = esc_html( get_theme_mod('aldehyde_showcase_title2') );
                $desc2 = esc_html( get_theme_mod('aldehyde_showcase_desc2') );
                $img2 = esc_url ( get_theme_mod('aldehyde_showcase_img2') );
                $image_id2 = aldehyde_get_image_id2($img2);
                $img_size2 = wp_get_attachment_image( $image_id2, $size='showcase-thumb-2' );
                $img_size_mob2 = wp_get_attachment_image( $image_id2, $size='pop-thumb' );

                //showcase 3
                $url3 = esc_url ( get_theme_mod('aldehyde_showcase_url3') );
                $title3 = esc_html( get_theme_mod('aldehyde_showcase_title3') );
                $desc3 = esc_html( get_theme_mod('aldehyde_showcase_desc3') );
                $img3 = esc_url ( get_theme_mod('aldehyde_showcase_img3') );
                $image_id3 = aldehyde_get_image_id3($img3);
                $img_size3 = wp_get_attachment_image( $image_id3, $size='showcase-thumb-2' );
                $img_size_mob3 = wp_get_attachment_image( $image_id3, $size='pop-thumb' );


                //showcase 4
                $url4 = esc_url ( get_theme_mod('aldehyde_showcase_url4') );
                $title4 = esc_html( get_theme_mod('aldehyde_showcase_title4') );
                $desc4 = esc_html( get_theme_mod('aldehyde_showcase_desc4') );
                $img4 = esc_url ( get_theme_mod('aldehyde_showcase_img4') );
                $image_id4 = aldehyde_get_image_id4($img4);
                $img_size4 = wp_get_attachment_image( $image_id4, $size='showcase-thumb-4' );
                $img_size_mob4 = wp_get_attachment_image( $image_id4, $size='pop-thumb' );


                ?>


                <!-- Showcase 1 -->
                <div class="showcase-item1 col-md-12 col-sm-6">
                    <a href="<?php echo $url1; ?>">
                        <div class="showcase-desktop">
                            <?php echo $img_size1 ?>
                        </div>
                        <div class="showcase-mobile">
                            <?php echo $img_size_mob1 ?>
                        </div>
                        <div class="showcase-caption">
                            <?php if ($title1) : ?>
                                <div class="showcase-title"><span><?php echo $title1 ?></span></div>
                                <div class="showcase-desc"><span><?php echo $desc1 ?></span></div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <!-- Showcase 2-->
                <div class="showcase-item2 col-md-3 col-sm-6">
                    <a href="<?php echo $url2; ?>">
                        <div class="showcase-desktop">
                            <?php echo $img_size2 ?>
                        </div>
                        <div class="showcase-mobile">
                            <?php echo $img_size_mob2 ?>
                        </div>
                        <div class="showcase-caption">
                            <?php if ($title2) : ?>
                                <div class="showcase-title"><span><?php echo $title2 ?></span></div>
                                <div class="showcase-desc"><span><?php echo $desc2 ?></span></div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <!-- Showcase 3-->
                <div class="showcase-item3 col-md-3 col-sm-6">
                    <a href="<?php echo $url3; ?>">
                        <div class="showcase-desktop">
                            <?php echo $img_size3 ?>
                        </div>
                        <div class="showcase-mobile">
                            <?php echo $img_size_mob3?>
                        </div>

                        <div class="showcase-caption">
                            <?php if ($title3) : ?>
                                <div class="showcase-title"><span><?php echo $title3 ?></span></div>
                                <div class="showcase-desc"><span><?php echo $desc3 ?></span></div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <!-- Showcase 4-->
                <div class="showcase-item4 col-md-6 col-sm-6">
                    <a href="<?php echo $url4; ?>">
                        <div class="showcase-desktop">
                            <?php echo $img_size4 ?>
                        </div>
                        <div class="showcase-mobile">
                            <?php echo $img_size_mob4 ?>
                        </div>
                        <div class="showcase-caption">
                            <?php if ($title4) : ?>
                                <div class="showcase-title"><span><?php echo $title4 ?></span></div>
                                <div class="showcase-desc"><span><?php echo $desc4 ?></span></div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>