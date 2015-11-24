<?php
error_reporting(0);
global $post;
global $team;
$post = $team;
global $team_class;
$team_meta = get_post_meta($team->ID);
?>
<div class="<?php echo $team_class;?> text-center ">
    <a href="javascript:;" class="team-member " >
        <img src="<?php echo $team_meta['_sonnet_tm_thumb'][0];?>" alt=""  class="<?php echo $team_meta['_sonnet_tm_animation'][0];?>" >
        <div class="team-title <?php echo $team_meta['_sonnet_tm_animation'][0];?>">
            <?php the_title();?>
            <p class="designation">
                <?php echo $team_meta['_sonnet_tm_designation'][0];?>
            </p>
        </div>

    </a>
    <div class="team-member-hidden-profile" style="display: none;">
        <?php
        get_template_part("section-templates/team-member-details");
        ?>
    </div>
</div>
