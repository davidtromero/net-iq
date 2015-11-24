<!--news step start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
?>
<section id="<?php echo $section->post_name;?>" class="appear news"  style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0];?>; ">
    <div class="purchase-block" style="background-image: url('../../../uploads/2015/05/keepItSimpleBackground-e1432844915456.jpg');">
    <div class="container">
        <div class="row">
            <div class="common-heading light-color text-center">
                <h1 class="animated animate-from-left"  style="color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title();?></h1>
                <h4 class="animated animate-from-right"><?php echo do_shortcode($section_meta['_sonnet_section_content'][0]);?></h4>
            </div>
            <div class="news-carousel">
                <ul class="post-list">
                    <?php
                        $news = get_custom_posts("news",5,false,"DESC");
                        foreach($news as $newsitem){
                            $attachment = get_the_post_thumbnail( $newsitem->ID, "news_thumb" );
                    ?>
                    <li>
                        <?php echo $attachment;?>
                        <div class="pull-left new-desk">
                            <h3><?php echo $newsitem->post_title;?></h3>
                            <p>
                                <?php echo do_shortcode($newsitem->post_content);?>
                            </p>
                        </div>
                        <div class="pull-right cmnt-box text-center" style="margin-right:5%">
                            <strong><?php echo date("d",strtotime($newsitem->post_date)) ?></strong>
                            <p>
                                <?php echo date("F",strtotime($newsitem->post_date)) ?>
                            </p>
                        </div>
                    </li>
                    <?php
                        }
                    ?>

                </ul>
            </div>

<!--            <div class="text-center">-->
<!--                <a href="javascript:;" class="btn-custom  btn-news ">Share It</a>-->
<!--            </div>-->
        </div>
    </div>
    </div>
</section>
<!--news step end-->