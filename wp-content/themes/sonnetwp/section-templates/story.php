<?php
global $post;
global $story;
$post = $story;
global $story_class;
global $index;
$story_meta = get_post_meta($story->ID);
$styles = array(1=>"hi-icon-effect-1st",2=>"hi-icon-effect-2nd",3=>"hi-icon-effect-3rd");
$story_style = $styles[$story_meta['_sonnet_story_icon_style'][0]];
$indexes = array("hi-icon-effect-1st","hi-icon-effect-2nd","hi-icon-effect-3rd");
?>
<style type="text/css">
    <?php echo ".{$indexes[$index]} .hi-icon:after {" ;?>
        box-shadow: 0 0 0 4px <?php echo $story_meta['_sonnet_story_icon_bg_color'][0]; ?>;
    }
</style>
<div class="<?php echo $story_class;?> text-center <?php echo $story_meta['_sonnet_story_animation'][0];?>">
    <div class="feature-row">
        <div class="f-icon <?php echo $indexes[$index];?>">
            <a href="#" class="hi-icon " style="background-color: <?php echo $story_meta['_sonnet_story_icon_bg_color'][0]; ?>;cursor: display;">
                <i><img width="75" src="<?php echo $story_meta['_sonnet_story_icon'][0]; ?>"/></i>
            </a>
        </div>
        <h2 class="" style="color: #1d1d1b;font-weight:bold;font-size: 18px;"><?php the_title();?></h2>
        <p>
            <?php echo do_shortcode($story_meta['_sonnet_story_details'][0]);?>
        </p>
    </div>
</div>
