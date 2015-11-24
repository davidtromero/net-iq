<!--testimonial start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
?>
<div class="testimonial" id="<?php echo $section->post_name;?>" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0]; ?>; ">
    <div class="container">
        <div class="row">
            <div class="common-heading light-color text-center">
                <h1 class="animated animate-from-left"  style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title(); ?></h1>
                <h4 class="animated animate-from-right"><?php echo $section_meta['_sonnet_section_content'][0]; ?></h4>
            </div>
            <ul class="testimonial-post-list">
                <?php
                $testimonials = get_custom_posts("testimonial", 30, false, "DESC");
                $count = count($testimonials);
                for ($i = 0; $i < $count; $i += 2) {
                    $testimonial1_meta = $testimonial2_meta = array();
                    $testimonial1 = $testimonials[$i];
                    $testimonial1_meta = get_post_meta($testimonial1->ID);
                    $testimonial2 = $testimonials[$i + 1];
                    if ($testimonial2) {
                        $testimonial2_meta = get_post_meta($testimonial2->ID);
                    }

                    $testimonial_class = "";
                    if (!$testimonial2) $testimonial_class = "single-testimonial";
                    ?>

                    <li>
                        <div class=" client-wrap <?php echo $testimonial_class; ?>">
                            <div class="client-feed">
                                <p>
                                    <?php echo do_shortcode($testimonial1_meta['_sonnet_testimonial_text'][0]); ?>
                                </p>

                                <div class="test-photo text-center">
                                    <img width="96"  src="<?php echo $testimonial1_meta['_sonnet_testimonial_thumbnail'][0]; ?>"
                                         alt="">
                                </div>
                            </div>
                            <div class="arrow-left-side">
                            </div>
                            <div class="clients-info pull-right text-right lt-pos">
                                <h5><?php echo $testimonial1_meta['_sonnet_testimonial_endorser'][0]; ?></h5>

                                <p>
                                    <?php echo $testimonial1_meta['_sonnet_testimonial_designation'][0]; ?>
                                </p>
                            </div>
                        </div>
                        <?php if($testimonial2){?>
                        <div class="testimonial-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/blog_icon.png" alt="">
                        </div>
                        <div class=" client-wrap">
                            <div class="client-feed">
                                <p>
                                    <?php echo do_shortcode($testimonial2_meta['_sonnet_testimonial_text'][0]); ?>
                                </p>

                                <div class="test-photo text-center">
                                    <img width="96" src="<?php echo $testimonial2_meta['_sonnet_testimonial_thumbnail'][0]; ?>"
                                         alt="">
                                </div>
                            </div>
                            <div class="arrow-right-side">
                            </div>
                            <div class="clients-info pull-left text-left rt-pos">
                                <h5><?php echo $testimonial2_meta['_sonnet_testimonial_endorser'][0]; ?></h5>

                                <p>
                                    <?php echo $testimonial2_meta['_sonnet_testimonial_designation'][0]; ?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<!--testimonial end-->