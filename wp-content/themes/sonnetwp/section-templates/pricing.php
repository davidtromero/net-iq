<!--price step start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
$pricing_classes = array(1=>"col-lg-12 col-sm-12",2=>"col-lg-6 col-sm-6",3=>"col-lg-4 col-sm-4",4=>"col-lg-3 col-sm-3");
?>
<section id="<?php echo $section->post_name;?>" class="appear price" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; ">
    <div class="container">
        <div class="row">
            <div class="common-heading light-color text-center">
                <h1 class="animated animate-from-left"  style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title();?></h1>
                <h4 class="animated animate-from-right"><?php echo $section_meta['_sonnet_section_content'][0];?></h4>
            </div>
        </div>
        <div class="row">
            <?php
                $pricing = get_custom_posts("pricingtable",4,"_sonnet_pricing_order");
                $count = count($pricing);
                $pricingc = $pricing_classes[$count];
                foreach($pricing as $price){
                    $price_meta = get_post_meta($price->ID);
                    $is_popular = @$price_meta['_sonnet_pricing_featured'][0];
                    $mpclass ="";
                    if($is_popular) $mpclass = "most-popular";
            ?>
                    <div class="<?php echo $pricingc ;?>">
                        <div class="pricing-table <?php echo $price_meta['_sonnet_pricing_animation'][0];?> <?php echo $mpclass;?>" style="opacity: 1; left: 0px;">
                            <div class="pricing-head">
                                <h1> <?php echo $price->post_title;?> </h1>
                                <h2>
                                    <span class="note">$</span><?php echo $price_meta['_sonnet_pricing_price'][0];?> </h2>
                            </div>
                            <ul class="list-unstyled">
                                <?php
                                    $elements =$price_meta['_sonnet_pricing_elements'][0];
                                    $el_parts = explode("\n",$elements);
                                    foreach($el_parts as $el){
                                        $el = do_shortcode($el);
                                        echo "<li>{$el}</li>";
                                    }
                                ?>
                            </ul>
                            <div class="price-actions">
                                <a href="<?php echo $price_meta['_sonnet_pricing_button_link'][0];?>" class="btn"><?php echo $price_meta['_sonnet_pricing_button'][0];?></a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>
<!--pricing step end-->