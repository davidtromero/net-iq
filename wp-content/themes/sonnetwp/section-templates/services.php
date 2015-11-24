<!--services step start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
$service_classes = array(1=>"col-lg-12 col-sm-12",2=>"col-lg-6 col-sm-6",3=>"col-lg-4 col-sm-4");
?>
<section id="<?php echo $section->post_name;?>" class="appear services" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; ">
    <div class="container">
        <div class="row">
            <div class="common-heading text-center">
                <h1 class="<?php echo $service_meta['_sonnet_service_animation'][0];?>"  style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title();?></h1>
                <h4 class="<?php echo $service_meta['_sonnet_service_animation'][0];?>"><?php echo $section_meta['_sonnet_section_content'][0];?></h4>
            </div>
            <?php
            $services = get_custom_posts("service",5, "_sonnet_service_order");
//            print_r($services);
            $count = count($services);
            $service_class = $service_classes[$count];

            foreach($services as $service){
                $service_meta = get_post_meta($service->ID);
            ?>

            <div class="<?php echo $service_class;?> text-center">
                <div class="service-box <?php echo $service_meta['_sonnet_service_animation'][0];?>" style="float:left;width:20%;">
                    <i class="fa <?php echo $service_meta['_sonnet_service_icon'][0];?>"></i>
                    <h4><?php echo do_shortcode($service->post_title);?></h4>
                    <p>
                        <?php echo do_shortcode($service->post_content);?>
                    </p>
                </div>
            </div>
            <?php }?>

        </div>
    </div>
</section>
<!--services step end-->