<!--contact step start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
?>
<div id="<?php echo $section->post_name;?>" class="appear contact" style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; ">
    <!--div class="purchase-block" style="background-image: url('../../../uploads/2015/05/easyStreetFooterBackground-e1432842072784.jpg');"-->
    <div class="container">
        <div class="row">
            <div class="common-heading dark-color text-center">
                <h1 class="animated animate-from-left"  style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title();?></h1>
                <h4 class="animated animate-from-right"><?php echo do_shortcode($section_meta['_sonnet_section_content'][0]); ?></h4>
                

         
            </div>
            <form role="form">

       <div class="form-group">
                    <!--<label for="ename">Your Name (Required)</label>
                    <input type="text" placeholder="" id="ename" class="form-control">
                </div>-->

                    <!--div class="form-group">
                        <label for="eemail">Connect with one of our account representatives today.</label>
                        <input type="text" placeholder="" id="eemail" class="form-control">
                    </div-->

                   <!-- <div class="form-group">
                        <label for="esubject">Subject</label>
                        <input type="text" placeholder="" id="esubject" class="form-control">
                    </div>-->


                    <!--<div class="form-group">
                        <label>Your Message</label>
                        <textarea id="emessage" class="form-control" rows="8"></textarea>
                    </div>-->

                <div class="clearfix"></div>
                <!--div class="text-center">

                    <button class="btn btn-send " id="sendmail" type="submit"><span>Send</span></button>

                </div-->
         

            </form>

        </div>
    </div>
   </div>
</div>
<!--contact step end-->