<!--team step start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
global $team_class;
global $team;
$team_classes = array(1=>"col-lg-12 col-sm-12",2=>"col-lg-6 col-sm-6",3=>"col-lg-4 col-sm-4",4=>"col-lg-3 col-sm-3");
?>
<section id="<?php echo $section->post_name;?>" class="appear team" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; ">
    <div class="container">
        <div class="row">
            <div class="common-heading dark-color text-center">
                <h1 class="animated animate-from-left"  style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"> <?php the_title();?></h1>
                <h4 class="animated animate-from-right"><?php echo $section_meta['_sonnet_section_content'][0];?></h4>
            </div>
        </div>
        <div class="row">
            <div class="team-row">
                <div class="team-container">
                    <div class="team-list">
                        <?php
                            $teammembers = get_custom_posts("team",4,false);
                            $count = count($teammembers);
                            $team_class = $team_classes[$count];
                            foreach($teammembers as $team)
                                get_template_part("section-templates/team-member");
                        ?>
                    </div>
                    <div class="team-description" style="">
                        <p class="designation">
                            <?php echo $team_meta['_sonnet_tm_designation'][0];?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--team step end-->