<!--design purchase start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
?>
<div id="<?php echo $section->post_name;?>" class="design-purchase" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>;">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <p class="animated animate-from-left">
                    <?php echo do_shortcode($section_meta['_sonnet_section_content'][0]);?>
                </p>
            </div>
            <?php if(@$section_meta['_sonnet_quote_display_button'][0]){?>
            <div class="col-lg-3 text-right animated animate-from-right">
                <div class="btn-effect">
                    <section>
                        <p>
                            <a href="<?php echo $section_meta['_sonnet_quote_button_link'][0];?>" class="btn-custom btn-1 btn-1b btn-d-purchase "><span><?php echo $section_meta['_sonnet_quote_button_text'][0];?></span></a>
                        </p>
                    </section>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!--design purchase end-->