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

// File paths (models and views)
$model_files = [
	'Strategy Variables'      => $template_dir . 'model/strategy.php',
	'Objectives Variables'    => $template_dir . 'model/objectives.php',
	'Problems Variables'      => $template_dir . 'model/problems.php',
	'Solutions Variables'     => $template_dir . 'model/solutions.php',
	'Target Market Variables' => $template_dir . 'model/target_market.php',
];

$view_files = [
	'Styles View'   => $template_dir . 'view/styles.php',
	'Header View'   => $template_dir . 'view/header.php',
	'Strategy View' => $template_dir . 'view/strategy.php',
	'Footer View'   => $template_dir . 'view/footer.php',
];

/**
 * Safely include a file and log if it fails
 */
function safe_include($filepath, $label = '', $vars = []) {
	if (file_exists($filepath)) {
		extract($vars); // bring passed variables into local scope
		require_once $filepath;
	} else {
		$label = $label ? " ({$label})" : '';
		error_log("[PDF Template] Missing include{$label}: {$filepath}");
	}
}

// ⚠️ Load model files in correct order: strategy.php MUST come first
safe_include($model_files['Strategy Variables'], 'Strategy Variables', [
	'form_data' => $form_data,
]);

// Load remaining model files
foreach ($model_files as $label => $file) {
	if ($label === 'Strategy Variables') continue;
	safe_include($file, $label);
}

// Load views
foreach ($view_files as $label => $file) {
	safe_include($file, $label);
}
