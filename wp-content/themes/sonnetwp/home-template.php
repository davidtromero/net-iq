<?php
/**
Template Name: Home Template
*/
if(is_archive() || is_category() || is_tag()){
    get_template_part("home");
    die();
}
get_header( );
get_template_part("section-templates/banner");
?>
<?php
global $section;
global $section_meta;
$sections = get_custom_posts("section",40,"_sonnet_section_order");
foreach($sections as $section){
    setup_postdata($section);
    $section_id = $section->ID;
    $section_meta = get_post_meta($section_id);
    $section_type = $section_meta['_sonnet_section_type'][0];
    $section_template = get_section_template($section_type);
    if($section_template){
        get_template_part("section-templates/{$section_template}");
    }
}
//echo get_template_part("section-templates/banner");
//echo get_template_part("section-templates/aboutus");
?>
<?php get_footer(); ?>