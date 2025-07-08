<?php
// ## Get Variables from Problems

global $variables_strategy;

$problems_form_id = 71;

// Get and clean the nested entry IDs
$raw_ids   = $variables_strategy['nested_form_ids_problems'] ?? '';
$entry_ids = array_filter(array_map('trim', explode(',', $raw_ids)));

$problems_entry_array = [];

// Map field IDs
$problems_field_id_name        = 1;
$problems_field_id_description = 3;

foreach ($entry_ids as $entry_id) {
	$entry = GFAPI::get_entry($entry_id);

	if (is_wp_error($entry)) {
		error_log("Problems: Failed to get entry ID {$entry_id} - " . $entry->get_error_message());
		$problems_entry_array[] = [
			'name'        => '',
			'description' => '',
			'error'       => "Entry ID {$entry_id} not found.",
		];
		continue;
	}

	$problems_entry_array[] = [
		'name'        => $entry[$problems_field_id_name] ?? '',
		'description' => $entry[$problems_field_id_description] ?? '',
	];
}
