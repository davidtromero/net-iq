<?php
global $post;
global $team;
$post = $team;
$team_meta = get_post_meta($team->ID);
global $team_class;
?>
<div class="team-details text-center">
    <img src="<?php echo $team_meta['_sonnet_tm_photo'][0];?>" class="<?php echo $team_meta['_sonnet_tm_style'][0];?>" alt="">

    <div class="team-info-details">
        <div class="row">
            <div class="col-sm-6 col-xs-4 text-left">
                <h1><?php the_title();?></h1>
            </div>
            <div class="col-sm-6 col-xs-8">
                <p class="text-right tm-info">
                    <?php echo do_shortcode($team->post_content);?>
                </p>
                <ul class="team-social-link">
                    <?php if($team_meta['_sonnet_tm_facebook'][0]){?>
                    <li><a href="<?php echo $team_meta['_sonnet_tm_facebook'][0];?>"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    <?php if($team_meta['_sonnet_tm_linkedin'][0]){?>
                        <li><a href="<?php echo $team_meta['_sonnet_tm_linkedin'][0];?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                    <?php if($team_meta['_sonnet_tm_twitter'][0]){?>
                        <li><a href="<?php echo $team_meta['_sonnet_tm_twitter'][0];?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if($team_meta['_sonnet_tm_pinterest'][0]){?>
                        <li><a href="<?php echo $team_meta['_sonnet_tm_pinterest'][0];?>"><i class="fa fa-pinterest"></i></a></li>
                    <?php } ?>
                    <?php if($team_meta['_sonnet_tm_dribbble'][0]){?>
                        <li><a href="<?php echo $team_meta['_sonnet_tm_dribbble'][0];?>"><i class="fa fa-dribbble"></i></a></li>
                    <?php } ?>
                    <?php if($team_meta['_sonnet_tm_github'][0]){?>
                        <li><a href="<?php echo $team_meta['_sonnet_tm_github'][0];?>"><i class="fa fa-github"></i></a></li>
                    <?php } ?>
                    <?php if($team_meta['_sonnet_tm_google'][0]){?>
                        <li><a href="<?php echo $team_meta['_sonnet_tm_google'][0];?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php } ?>
                </ul>
                <div class="back-row ">
                    <button class="goback" onclick="goBack();">Go Back</button>
                </div>
            </div>
        </div>
    </div>
</div>
