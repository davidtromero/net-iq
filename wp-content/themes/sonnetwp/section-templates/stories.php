<!--starting step start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
global $story;
global $story_class;
global $index;
$story_classes = array(1=>"col-lg-12 col-sm-12",2=>"col-lg-6 col-sm-6",3=>"col-lg-4 col-sm-4");
$index=-1;
?>
<section id="<?php echo $section->post_name;?>" class="appear start" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; ">
    <div class="container">
        <div class="row feature">
            <div class="common-heading dark-color text-center">
                <h1 class="animated animate-from-left"  style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title();?></h1>
                <h4 class="animated animate-from-right"><?php echo $section_meta['_sonnet_section_content'][0];?></h4>
            </div>
            <div class="feature-wrap">
                <?php
                $stories = get_custom_posts("story",3,"_sonnet_story_order");
                $count = count($stories);
                $story_class = $story_classes[$count];
                foreach($stories as $story){
                    $index++;
                    get_template_part("section-templates/story");
                }
                ?>
            </div>
            <?php
                if(@$section_meta['_sonnet_story_display_button'][0]){
            ?>
            <div class="f-btn-row text-center">
                <h4 class="animated animate-from-left"><?php echo do_shortcode($section_meta['_sonnet_story_section_text'][0]);?></h4>
                <div class="btn-effect">
                    <section>
                        <p>
                           <!-- <a href="<?php echo $section_meta['_sonnet_story_button_link'][0];?>" target="_blank" class="btn-custom btn-1 btn-1b btn-purchase-red "><span style="cursor: none;"><?php echo $section_meta['_sonnet_story_button_text'][0];?></span></a> -->
                        </p>
                    </section>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</section>
<!--starting step end-->