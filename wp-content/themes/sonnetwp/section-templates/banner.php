<!--banner start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
global $sonnetwp;
//print_r($sonnetwp['banner_file']);
?>
<section class="banner appear" id="home" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-image: url(<?php echo $sonnetwp['banner_file']['url'];?>);">
    <div class="container">
        <div class="row start">
        <!--this is the white rounded rectangle -->
            <div class="common-heading light-color text-center ban-head-pos-home entry-title">
                <div class="border-top-bot">
                    <h1><?php echo do_shortcode($sonnetwp['banner_text_1']);?></h1>
                    <!--h3 class="extra"><em><?php echo do_shortcode($sonnetwp['banner_text_2']);?></em></h3-->
                    <h4><?php echo do_shortcode($sonnetwp['banner_text_3']);?></h4>
                </div>
            </div>
            <?php if($sonnetwp['button_text']){?>
            <div class="text-center str">
                <a href="#banner-section" id="" class="btn btn-tour ">
                    <?php echo $sonnetwp['button_text'];?> </a>
            </div>
            <?php }?>
        </div>
    </div>
</section>
<!--banner end-->