<?php
// ## Get Variables from Opportunities

\SmplfyCore\SMPLFY_Log::info('/model/opportunities.php');

global $variables_do_items;

// Fallback for testing or unexpected use
if (empty($form_data) || !is_array($form_data) || !isset($form_data['field'])) {
	\SmplfyCore\SMPLFY_Log::error('[PDF Template] $form_data is missing or malformed');
	return;
}

// Declare global variable
global $opportunities_entry_array;
$opportunities_entry_array = [];

$opportunities_form_id = 73;

// Ensure input is safe and non-empty
$raw_ids   = $variables_do_items['nested_form_ids_opportunities'] ?? '';
$entry_ids = array_filter(array_map('trim', explode(',', $raw_ids)));

\SmplfyCore\SMPLFY_Log::info('PDF_EXTENDED_TEMPLATES');

// Map field IDs
$opportunities_field_id_opportunity    = 1;

foreach ($entry_ids as $entry_id) {
	$entry = GFAPI::get_entry($entry_id);

	if (is_wp_error($entry)) {
		$opportunities_entry_array[] = [
			'error'     => "Entry ID {$entry_id} not found.",
			'opportunity' => '',
		];
	} else {
		$objective_entry_array[] = [
			'opportunity' => $entry[$opportunities_field_id_opportunity] ?? '',
		];
	}
}
