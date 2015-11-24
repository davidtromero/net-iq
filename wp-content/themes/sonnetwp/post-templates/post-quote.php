<?php
global $post;
global $current_class;
global $sonnetwp;
$current_class = ($current_class == 'odd') ? 'even' : 'odd';
$postmeta = get_post_meta($post->ID);
$colors = array("#5bb46c","#43bccc","#8075c6","#ecaf69","#0fc5ef");
$alternate_view_enabled = $sonnetwp['blog_alternate_view'];;
setup_postdata($post);
//if(!$bg_color) {
    if($alternate_view_enabled && $current_class=="even"){
        $bg_color_index = mt_rand(0,6);
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
            <div class="common-heading light-color text-center ban-head-pos">
                <div class="quote text-center light-color" style=" color: <?php echo $title_color; ?>;">
                    <p>
                        <i class=" fa fa-quote-left top"></i>
                        <?php echo $post->post_content;?>
                        <i class=" fa fa-quote-right bot"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>