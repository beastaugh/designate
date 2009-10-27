<?php
/*
Plugin Name: Designate
Plugin URI: http://github.com/ionfish/designate/
Description: Add a per-post stylesheet to customise every post.
Author: Benedict Eastaugh
Version: 1.2
Author URI: http://extralogical.net/
.
Designate is released under the GPL. Please see the LICENCE file for details.
.
*/

/**
 * Set this constant to false to use post IDs rather than post slugs in
 * stylesheet names.
 *
 * E.g., a post with an ID of 27 will have a name of post-style-27.css rather
 * than arent-kittens-adorable.css.
 *
 * This is particularly useful when you have several posts with the same
 * permalink slug.
 */
define('DESIGNATE_USE_POST_SLUGS', true);

/**
 * Set a custom stylesheet for each post or page.
 * 
 * Stylesheets should be added in the 'post-styles' directory in your
 * WP_CONTENT_DIR.
 * 
 * You can override the programmatically-generated stylesheet name by adding a
 * custom field to your post or page with the key 'stylesheet' and the
 * stylesheet name (e.g., 'my_style.css') as the value.
 * 
 * Please note that if two posts have the same permalink slug, they will have
 * the same stylesheet. If several of your posts which you wish to style have
 * the same permalink, set the DESIGNATE_USE_POST_SLUGS constant to false.
 *
 * @uses get_post_meta
 * @uses content_url
 */
function designate_stylesheet() {
    global $post;
    
    if (!is_single() && !is_page() && !(is_home() && have_posts())) return;
    
    $custom = get_post_meta($post->ID, 'stylesheet', true);
    
    if ($custom && strlen($custom) > 0)
        $slug = preg_replace('/\.css$/', '', $custom);
    elseif ($post->post_name && DESIGNATE_USE_POST_SLUGS === true)
        $slug = $post->post_name;
    else
        $slug = 'post-style-' . $post->ID;
    
    if (strlen($slug) > 0) {
        $location = "/post-styles/$slug.css";
        
        if (file_exists(WP_CONTENT_DIR . $location))
            printf('<link type="text/css" rel="stylesheet" href="%s" />' . "\n\n",
                content_url($location));
    }
}

add_action('wp_head', 'designate_stylesheet');

?>