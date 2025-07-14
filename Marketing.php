<?php
/**
 * Template Name: SMPLFY Marketing Plan
 * Version: 0.2
 * Description: PDF version of Marketing Plan
 * Author: Andre Nell
 * Author URI: https://simplifybiz.com
 * Group: SMPLFY
 * License: GPLv2
 * Required PDF Version: 4.0
 * Tags: space, solar system, getting started
 */

// Prevent direct access
if (!class_exists('GFForms')) {
	return;
}
\SmplfyCore\SMPLFY_Log::info('PDF_EXTENDED_TEMPLATES');

/**
 * Gravity PDF exposes the following variables:
 *
 * @var array  $form      The current Gravity Form array
 * @var array  $entry     The raw entry data
 * @var array  $form_data The processed entry data
 * @var object $settings  The current PDF configuration
 * @var array  $fields    An array of Gravity Form fields
 * @var array  $config    The initialized template config
 */

// Load template settings
$show_meta_data = !empty($settings['world_show_meta_data']) ? $settings['world_show_meta_data'] : 'No';

// Set up base path
$upload_dir   = wp_upload_dir();
$template_dir = trailingslashit($upload_dir['basedir']) . 'PDF_EXTENDED_TEMPLATES/';

// Declare global variables
global $variables_marketing;

// Initialize globals to avoid undefined variable issues
$variables_marketing = [];
// File paths (models and views)
$model_files = [
	'Marketing Variables'      => $template_dir . 'model/marketing.php',
];

$view_files = [
	'Styles View'   => $template_dir . 'view/styles.php',
	'Header View'   => $template_dir . 'view/header.php',
	'Marketing View' => $template_dir . 'view/marketing.php',
	'Footer View'   => $template_dir . 'view/footer.php',
];

/**
 * Safely include a file and log if it fails
 */
function safe_include($filepath, $label = '', $vars = []) {
	if (file_exists($filepath)) {
		extract($vars); // Bring passed variables into local scope
		require_once $filepath;
	} else {
		$label = $label ? " ({$label})" : '';
		error_log("[PDF Template] Missing include{$label}: {$filepath}");
	}
}

// Load model files in correct order: strategy.php MUST come first
safe_include($model_files['Marketing Variables'], 'Marketing Variables', [
	'form_data' => $form_data,
]);

// Load remaining model files, passing globals
foreach ($model_files as $label => $file) {
	if ($label === 'Marketing Variables') {
		continue;
	}
	safe_include($file, $label, [
		'form_data' => $form_data,
		'variables_marketing' => $variables_marketing,
	]);
}

// Log globals for debugging
\SmplfyCore\SMPLFY_Log::info('Global variables after models', [
	'variables_marketing' => $variables_marketing,
]);

// Load views, passing globals
foreach ($view_files as $label => $file) {
	safe_include($file, $label, [
		'form_data' => $form_data,
		'variables_strategy' => $variables_marketing,
	]);
}
