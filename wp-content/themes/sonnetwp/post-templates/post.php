<?php
global $post;
global $current_class;
global $sonnetwp;
$current_class = ($current_class == 'odd') ? 'even' : 'odd';
$postmeta = get_post_meta($post->ID);
$colors = array("#5bb46c","#43bccc","#8075c6","#ecaf69","#0fc5ef");
$alternate_view_enabled = $sonnetwp['blog_alternate_view'];
$bg_color = @$postmeta['_sonnet_post_bg_color']['0'];
setup_postdata($post);
//if(!$bg_color) {

//if(!$bg_color) {
if($alternate_view_enabled && $current_class=="even"){
    $bg_color_index = mt_rand(0,4);
    $bg_color=$colors[$bg_color_index];
}else{
    $bg_color = @$postmeta['_sonnet_post_bg_color']['0'];
}
//}


//if(!$text_color) {
if($alternate_view_enabled && $current_class=="even"){
    $text_color = "#ffffff";
}else{
    $text_color  = @$postmeta['_sonnet_post_text_color']['0'];
}
//}


//if(!$title_color) {
if($alternate_view_enabled && $current_class=="even"){
    $title_color = "#ffffff";
}else{
    $title_color  = @$postmeta['_sonnet_post_title_color']['0'];
}
//}

//if(!$title_hover_color ) {
if($alternate_view_enabled && $current_class=="even") {
    $title_hover_color = "rgba(255,255,255,0.5)";
}else{
    $title_hover_color  = @$postmeta['_sonnet_post_title_hover_color']['0'];
}
//}


//if(!$date_color) {
if($alternate_view_enabled && $current_class=="even"){
    $date_color = "rgba(255,255,255,0.5)";
}else{
    $date_color  = @$postmeta['_sonnet_post_date_color']['0'];
}
//}
//print_r($postmeta);


?>
<section class="blog" style="background-color: <?php echo $bg_color; ?>; color: <?php echo $text_color; ?>;">
    <div class="container">
        <div class="row">
            <h1><?php echo strtoupper(get_the_date("j M"));?></h1>
            <div class="ath-date-row" style="color: <?php echo $date_color; ?>;">
                <div class="author">
                    <i class="fa fa-edit"></i>
                    <?php the_author();?>
                </div>
                <div class="date">
                    <i class="fa fa-clock-o"></i>
                    <?php the_time();?>
                </div>
                <div class="comments">
                    <i class="fa fa-comments-o"></i>
                    <?php comments_number();?>
                </div>
            </div>
            <?php
            if(has_post_thumbnail()){
                ?>
                <div class="col-lg-6" style="color: <?php echo $title_color; ?>;">
                    <h2 class="<?php echo $current_class;?>" style="color: <?php echo $text_color; ?>;"><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h2>
                    <p>
                        <?php the_excerpt();?>
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <?php the_post_thumbnail();?>
                </div>
            <?php
            } else {
                ?>
                <div class="col-lg-12  single-blog">
                    <h2  class="<?php echo $current_class;?>" style="color: <?php echo $title_color; ?>;"><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h2>
                    <p>
                        <?php the_excerpt();?>
                    </p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>