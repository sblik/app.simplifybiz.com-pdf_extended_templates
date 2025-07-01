<?php

/**
 * Template Name: SMPLFY Strategy
 * Version: 0.1
 * Description: PDF version of business strategy
 * Author: Andre Nell
 * Author URI: https://simplifybiz.com
 * Group: SMPLFY
 * License: GPLv2
 * Required PDF Version: 4.0
 * Tags: space, solar system, getting started
 */

/* Prevent direct access to the template (always good to strategy this) */
if (!class_exists('GFForms')) {
    return;
}


/**
 * Load our template-specific settings
 */

$show_meta_data = !empty($settings['world_show_meta_data']) ? $settings['world_show_meta_data'] : 'No';

/**
 * All Gravity PDF v4/v5/v6 templates have access to the following model:
 *
 * @var array $form The current Gravity Form array
 * @var array $entry The raw entry data
 * @var array $form_data The processed entry data stored in an array
 * @var object $settings The current PDF configuration
 * @var array $fields An array of Gravity Form fields which can be accessed with their ID number
 * @var array $config The initialised template config class – eg. /config/zadani.php
 */


$upload_dir   = wp_upload_dir();
$template_dir = trailingslashit($upload_dir['basedir']) . 'PDF_EXTENDED_TEMPLATES/';

// Define paths to included files

$strategy_variables      = $template_dir . 'model/strategy/strategy.php';
$objectives_variables    = $template_dir . 'model/strategy/objectives.php';
$problems_variables      = $template_dir . 'model/strategy/problems.php';
$target_market_variables = $template_dir . 'model/strategy/target_market.php';
$solutions_variables     = $template_dir . 'model/strategy/solutions.php';


$styles_file   = $template_dir . 'view/styles.php';
$header_file   = $template_dir . 'view/header.php';
$strategy_file = $template_dir . 'view/strategy.php';
$footer_file   = $template_dir . 'view/footer.php';

/* ---------------------------------------------------------------------------------------------------- */
include $strategy_variables;
include $objectives_variables;
include $problems_variables;
include $solutions_variables;
include $target_market_variables;

//
include $styles_file;
include $header_file;
include $strategy_file;
include $footer_file;

