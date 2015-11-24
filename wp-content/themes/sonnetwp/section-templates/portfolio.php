<!--portfolio step start-->
<?php
global $post;
global $section;
global $section_meta;
$post = $section;
global $attachments;
$tags = array();
$attachments = new Attachments('sonnet_portfolio', $section->ID);
if ($attachments->exist()) {
    while ($attachment = $attachments->get()) {
        $_tag =str_replace(", ",",",$attachments->field("tags"));
        $atags = explode(",", $_tag);
        $tags = array_unique(array_merge($tags, $atags));
    }
}
?>
<style type="text/css">
    .portfolio-filter ul li a:hover, .filter:hover, .filter.selected{
        color: <?php echo $section_meta['_sonnet_portfolio_tag_text_hover_color'][0]; ?>;
        background: <?php echo $section_meta['_sonnet_portfolio_tag_bg_hover_color'][0]; ?>;
    }

    .portfolio-filter ul li a{
        color: <?php echo $section_meta['_sonnet_portfolio_tag_text_color'][0]; ?>;
        background: <?php echo $section_meta['_sonnet_portfolio_tag_bg_color'][0]; ?>;
    }
</style>
<section id="<?php echo $section->post_name;?>" class="appear portfolio"
         style="color: <?php echo $section_meta['_sonnet_section_text_color'][0];?>; background-color:<?php echo $section_meta['_sonnet_section_color'][0]; ?>; ">

    <div>
        <div class="common-heading light-color text-center">
            <h1 class="animated animate-from-left"  style="background-image:url(<?php echo $section_meta['_sonnet_section_bg'][0];?>); color: <?php echo $section_meta['_sonnet_section_title_color'][0];?>"><?php the_title(); ?></h1>
            <h4 class="animated animate-from-right"><?php echo $section_meta['_sonnet_section_content'][0]; ?></h4>
        </div>
        <!-- THE FILTER STYLED FOR MEGAFOLIO -->

        <div class="portfolio-filter animated animate-from-left">
            <ul>
                <li><a href="#" class="filter selected" data-category="cat-all">All</a><div class="portfolio-title" style="color:#fff;"></div></li>
                <?php
                foreach($tags as $tag)
                    if(!empty($tag))
                    echo '<li><a href="#" class="filter" data-category="'.$tag.'">'.$tag.'</a></li>';
                ?>
<!--                <li><a href="#" class="filter" data-category="cat-one">Creative</a></li>-->
<!--                <li><a href="#" class="filter" data-category="cat-two">Painting</a></li>-->
<!--                <li><a href="#" class="filter" data-category="cat-three">Photography</a></li>-->
<!--                <li><a href="#" class="filter" data-category="cat-four">Visual</a></li>-->
<!--                <li><a href="#" class="filter last-child" data-category="cat-five">Graphics</a></li>-->
            </ul>
        </div>

        <div class="container-fullwidth animated  animate-from-left">
            <!-- The GRID System -->

            <div class="megafolio-container light-bg-entries">
                <?php
                $attachments = new Attachments('sonnet_portfolio', $section->ID);
                if ($attachments->exist()) {
                    while ($attachment = $attachments->get()) {
                        $atags = explode(",", $attachments->field("tags"));
                        $tags = array_unique(array_merge($tags, $atags));
                        $counteranimation = $attachments->field("title");
                        get_template_part("section-templates/portfolio", "item");
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if(@$section_meta['_sonnet_quote_display'][0]){
    ?>
    <div class="purchase-block" style="background-image: url(<?php echo @$section_meta['_sonnet_quote_bg'][0]; ?>);">
        <div class="container">
            <div class="row">
                <div class="quote  text-center light-color">
                    <i class="fa top"></i>
                    <?php echo $section_meta['_sonnet_quote'][0]; ?>
                    <i class="fa bot"></i>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</section>
<!--portfolio step end-->