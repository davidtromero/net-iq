<!--features step start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
?>
<section id="<?php echo $section->post_name;?>" class="appear features" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; ">
    <div class="container">
        <div class="row">
            <div class="common-heading light-color text-center">
                <h1 class="animated animate-from-left"  style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title();?></h1>
                <h4 class="animated animate-from-right"><?php echo do_shortcode($section_meta['_sonnet_section_content'][0]); ?></h4>
            </div>
        </div>
        <div class="row">
            <ul class="post-list">
                <?php
                $i=0;
                    $features = get_custom_posts("feature",10,"_sonnet_feature_order");
                    foreach($features as $feature){
                        $i++;
                        $attachment = get_the_post_thumbnail( $feature->ID, "feature_thumb" );
                        $feature_meta = get_post_meta($feature->ID);
                        $feature_class = $i<=1?"animated animate-from-right":"";
                ?>
                <li>
                    <div class="col-lg-6 col-sm-6 text-center ">
                        <?php echo $attachment;?>
                    </div>
                    <div class="col-lg-6 col-sm-6 f-list <?php echo $feature_class;?>">
                        <h1>
                            <?php echo $feature->post_title;?> </h1>



                        <p>
                            <?php echo do_shortcode($feature->post_content);?>
                        </p>
                        <?php
                            if($feature_meta['_sonnet_feature_display_button']){
                        ?>
                        <div class="btn-effect">
                            <section>
                                <p>
                                    <a href="<?php echo $feature_meta['_sonnet_feature_button_link'][0];?>" class="btn-custom btn-1 btn-1b btn-purchase-feature "><span><?php echo $feature_meta['_sonnet_feature_button_text'][0];?></span></a>
                                </p>
                            </section>
                        </div>
                        <?php } ?>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</section>
<!--features step end-->