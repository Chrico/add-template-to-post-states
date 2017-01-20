<?php declare(strict_types = 1); # -*- coding: utf-8 -*-
/**
 * Plugin Name: Add template name to Post column
 * Description: This Plugin will add the template name attached to a Post to the edit.php columns
 */

namespace ChriCo\AddTemplateToPostStates;

add_action('display_post_states', __NAMESPACE__ . '\add_template', 10, 2);

/**
 *
 * @wp-hook display_post_states
 *
 * @param array $states
 * @param \WP_Post $post
 *
 * @return array $states
 */
function add_template(array $states = [], \WP_Post $post): array {

    $template       = get_page_template_slug($post->ID);
    $page_templates = wp_get_theme()->get_page_templates();

    if ($template !== '' && isset($page_templates[$template])) {
        $states[] = $page_templates[$template];
    }

    return $states;
}