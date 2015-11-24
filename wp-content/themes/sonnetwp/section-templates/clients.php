<!--clients start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
global $clients;
?>
<div id="<?php echo $section->post_name;?>" class="clients" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; ">
    <div class="container">
        <div class="row">
            <div class="common-heading dark-color text-center">
                <h1 class="animated animate-from-left"  style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title();?></h1>
                <h4 class="animated animate-from-right"><?php echo do_shortcode($section_meta['_sonnet_section_content'][0]); ?></h4>
            </div>
            <div style="text-align: center;">
            <ul class="client-logo">
                <?php
                $clients = new Attachments('sonnet_clients', $section->ID);
                if ($clients->exist()) {
                    while ($attachment = $clients->get()) {
                        $link =  $clients->field("link") . 'class="attachments-track-id"';
                        $title = $clients->field("title");
                        $thumbnail = $clients->field("attachment-thumbnail");
                        $class = $clients->field('class');
                        get_template_part("section-templates/client", "item");
                    }
                }
                ?>
            </ul>
                <div style="clear:both;font-size:0px;line-height:0px;"><!--spacing div --></div>
            </div>
        </div>
    </div>
</div>
<!--clients end-->