<!--newsletter start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
?>
<div class="newsletter" id="<?php echo $section->post_name;?>" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; ">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1 class="animated animate-from-left"  style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title();?></h1>
                <p class="animated animate-from-right">
                    <?php echo do_shortcode($section_meta['_sonnet_section_content'][0]);?>
                </p>
            </div>
            <div class="col-lg-7">
                <form role="form" action="<?php echo $section_meta['_sonnet_subscription_form_url'][0];?>" method="POST" class="form-inline animated animate-from-left">
                    <div class="form-group col-lg-9 col-xs-12 col-sm-9">
                        <input type="email" placeholder="Enter email" id="<?php echo $section_meta['_sonnet_subscription_email_id'][0];?>" name="<?php echo $section_meta['_sonnet_subscription_email_id'][0];?>" class="form-control">
                    </div>
                    <div class="col-lg-3 col-xs-12 col-sm-3">
                        <button class="btn btn-newsletter col-xs-12 " type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--newsletter end-->