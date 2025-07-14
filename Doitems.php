<?php
/**
 * Template Name: SMPLFY Do Items
 * Version: 0.2
 * Description: PDF version of Do Items
 * Author: Andre Nell
 * Author URI: https://simplifybiz.com
 * Group: SMPLFY
 * License: GPLv2
 * Required PDF Version: 4.0
 * Tags: space, solar system, getting started
 */

// Prevent direct access
if ( ! class_exists( 'GFForms' ) ) {
	return;
}
\SmplfyCore\SMPLFY_Log::info( 'PDF_EXTENDED_TEMPLATES' );

/**
 * Gravity PDF exposes the following variables:
 *
 * @var array $form The current Gravity Form array
 * @var array $entry The raw entry data
 * @var array $form_data The processed entry data
 * @var object $settings The current PDF configuration
 * @var array $fields An array of Gravity Form fields
 * @var array $config The initialized template config
 */

// Load template settings
$show_meta_data = ! empty( $settings['world_show_meta_data'] ) ? $settings['world_show_meta_data'] : 'No';

// Set up base path
$upload_dir   = wp_upload_dir();
$template_dir = trailingslashit( $upload_dir['basedir'] ) . 'PDF_EXTENDED_TEMPLATES/';

// Declare global variables
global $variables_do_items, $threats_entry_array, $opportunities_entry_array, $do_items_entry_array;

// Initialize globals to avoid undefined variable issues
$variables_do_items        = [];
$threats_entry_array       = [];
$opportunities_entry_array = [];
$do_items_entry_array      = [];

// File paths (models and views)
$model_files = [
	'Do Items Variables'      => $template_dir . 'model/do_items.php',
	'Threats Variables'       => $template_dir . 'model/threats.php',
	'Opportunities Variables' => $template_dir . 'model/opportunities.php',
	'Do Item Variables'       => $template_dir . 'model/do_item.php',
];

$view_files = [
	'Styles View'   => $template_dir . 'view/styles.php',
	'Header View'   => $template_dir . 'view/header.php',
	'Do Items View' => $template_dir . 'view/do_items.php',
	'Footer View'   => $template_dir . 'view/footer.php',
];

/**
 * Safely include a file and log if it fails
 */
function safe_include( $filepath, $label = '', $vars = [] ) {
	if ( file_exists( $filepath ) ) {
		extract( $vars ); // Bring passed variables into local scope
		require_once $filepath;
	} else {
		$label = $label ? " ({$label})" : '';
		error_log( "[PDF Template] Missing include{$label}: {$filepath}" );
	}
}

// Load model files in correct order: strategy.php MUST come first
safe_include( $model_files['Do Items Variables'], 'Do Items Variables', [
	'form_data' => $form_data,
] );

// Load remaining model files, passing globals
foreach ( $model_files as $label => $file ) {
	if ( $label === 'Do Items Variables' ) {
		continue;
	}
	safe_include( $file, $label, [
		'form_data'                 => $form_data,
		'variables_do_items'        => $variables_do_items,
		'threats_entry_array'       => $threats_entry_array,
		'opportunities_entry_array' => $opportunities_entry_array,
		'do_item_entry_array'       => $do_items_entry_array,
	] );
}

// Log globals for debugging
\SmplfyCore\SMPLFY_Log::info( 'Global variables after models', [
	'variables_do_items'       => $variables_do_items,
	'threats_entry_array'       => $threats_entry_array,
	'opportunities_entry_array' => $opportunities_entry_array,
	'do_item_entry_array'       => $do_items_entry_array,
] );

// Load views, passing globals
foreach ( $view_files as $label => $file ) {
	safe_include( $file, $label, [
		'form_data'                 => $form_data,
		'variables_do_items'        => $variables_do_items,
		'threats_entry_array'       => $threats_entry_array,
		'opportunities_entry_array' => $opportunities_entry_array,
		'do_item_entry_array'       => $do_items_entry_array,
	] );
}
