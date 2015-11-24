<!--news step start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
$connected = new WP_Query( array(
    'connected_type' => 'page_to_sections',
    'connected_items' => $section->ID,
    'nopaging' => true,
) );
//print_r($connected);
?>
<section id="<?php echo $section->post_name;?>" class="appear"  style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; ">
    <div class="container">
        <div class="row">
            <div class="common-heading light-color text-center">
                <h1 class="animated animate-from-left"><?php the_title();?></h1>
                <h4 class="animated animate-from-right"><?php echo do_shortcode($section_meta['_sonnet_section_content'][0]);?></h4>
            </div>
            <?php
            if($connected->have_posts()){
                $connected->the_post();
                the_content();
            }
//            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<!--news step end-->