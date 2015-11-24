<!--about step start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
?>

<!--about step start-->
<section id="<?php echo $section->post_name;?>" class="appear about" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>;" ">
    <div class="container">
        <div class="row">
            <div class="common-heading light-color text-center">
                <div class="common-heading light-color text-center  animated ani-hide">
                    <!--<h1 class="animated animate-from-left" style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title();?></h1>-->

                </div>
                <div class="about-details row">
                    <div class="col-lg-6 col-sm-6">
                        <h1 class="abt-intro animated animate-from-left">
                            <?php echo do_shortcode($section_meta['_sonnet_section_headline'][0]);?>
                        </h1>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="animated animate-from-right">
                            <p class="abt-details">
                                <?php echo do_shortcode($section_meta['_sonnet_section_details'][0]);?>
                            </p>
                        </div>
                    </div>
                    <h4 class="animated animate-from-right" style="margin-bottom:50px;"><?php echo do_shortcode($section_meta['_sonnet_section_content'][0]);?></h4>
                </div>

                <?php
                if(@$section_meta['_sonnet_skill_show'][0]){
                ?>
                <div class="skill-progress-bar clearfix">
                    <?php if(@$section_meta['_sonnet_skill_1_title'][0]){ ?>
                    <div class="skillbar clearfix " data-percent="<?php echo $section_meta['_sonnet_skill_1_percentage'][0];?>%">
                        <div class="skillbar-title" style="background: #a7dca1;"><span><?php echo $section_meta['_sonnet_skill_1_title'][0];?></span></div>
                        <div class="skillbar-bar" style="background: #a7dca1;"></div>
                        <div class="skill-bar-percent"><?php echo $section_meta['_sonnet_skill_1_percentage'][0];?>%</div>
                    </div>
                    <?php } ?>
                    <?php if(@$section_meta['_sonnet_skill_2_title'][0]){ ?>
                    <div class="skillbar clearfix " data-percent="<?php echo $section_meta['_sonnet_skill_2_percentage'][0];?>%">
                        <div class="skillbar-title" style="background: #cef09a;"><span><?php echo $section_meta['_sonnet_skill_2_title'][0];?></span></div>
                        <div class="skillbar-bar" style="background: #cef09a;"></div>
                        <div class="skill-bar-percent"><?php echo $section_meta['_sonnet_skill_2_percentage'][0];?>%</div>
                    </div>
                    <?php } ?>
                    <?php if(@$section_meta['_sonnet_skill_3_title'][0]){ ?>
                    <div class="skillbar clearfix " data-percent="<?php echo $section_meta['_sonnet_skill_3_percentage'][0];?>%">
                        <div class="skillbar-title" style="background: #78da8a;"><span><?php echo $section_meta['_sonnet_skill_3_title'][0];?></span></div>
                        <div class="skillbar-bar" style="background: #78da8a;"></div>
                        <div class="skill-bar-percent"><?php echo $section_meta['_sonnet_skill_3_percentage'][0];?>%</div>
                    </div>
                    <?php } ?>
                    <?php if(@$section_meta['_sonnet_skill_4_title'][0]){ ?>
                    <div class="skillbar clearfix " data-percent="<?php echo $section_meta['_sonnet_skill_4_percentage'][0];?>%">
                        <div class="skillbar-title" style="background: #229c63;"><span><?php echo $section_meta['_sonnet_skill_4_title'][0];?></span></div>
                        <div class="skillbar-bar" style="background: #229c63;"></div>
                        <div class="skill-bar-percent"><?php echo $section_meta['_sonnet_skill_4_percentage'][0];?>%</div>
                    </div>
                    <?php } ?>
                    <?php if(@$section_meta['_sonnet_skill_5_title'][0]){ ?>
                    <div class="skillbar clearfix " data-percent="<?php echo $section_meta['_sonnet_skill_5_percentage'][0];?>%">
                        <div class="skillbar-title" style="background: #4a9c5a;"><span><?php echo $section_meta['_sonnet_skill_5_title'][0];?></span></div>
                        <div class="skillbar-bar" style="background: #4a9c5a;"></div>
                        <div class="skill-bar-percent"><?php echo $section_meta['_sonnet_skill_5_percentage'][0];?>%</div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>
<!--about step end-->