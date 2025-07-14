<?php
// ## Get Variables from Threats

\SmplfyCore\SMPLFY_Log::info('/model/threats.php');

global $variables_do_items;

// Fallback for testing or unexpected use
if (empty($form_data) || !is_array($form_data) || !isset($form_data['field'])) {
	\SmplfyCore\SMPLFY_Log::error('[PDF Template] $form_data is missing or malformed');
	return;
}

// Declare global variable
global $threats_entry_array;
$threats_entry_array = [];

$threats_form_id = 76;

// Ensure input is safe and non-empty
$raw_ids   = $variables_do_items['nested_form_ids_threats'] ?? '';
$entry_ids = array_filter(array_map('trim', explode(',', $raw_ids)));

\SmplfyCore\SMPLFY_Log::info('PDF_EXTENDED_TEMPLATES');

// Map field IDs
$threats_field_id_threat    = 1;

foreach ($entry_ids as $entry_id) {
	$entry = GFAPI::get_entry($entry_id);

	if (is_wp_error($entry)) {
		$objective_entry_array[] = [
			'error'     => "Entry ID {$entry_id} not found.",
			'threat' => '',
		];
		} else {
		$objective_entry_array[] = [
			'threat' => $entry[$threats_field_id_threat] ?? '',
		];
	}
}
