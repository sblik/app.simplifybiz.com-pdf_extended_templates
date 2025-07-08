<?php
// ## Get Variables from Solutions

global $variables_strategy;

$solutions_form_id = 72;

// Safely get and clean the nested entry IDs
$raw_ids   = $variables_strategy['nested_form_ids_solutions'] ?? '';
$entry_ids = array_filter(array_map('trim', explode(',', $raw_ids)));

$solutions_entry_array = [];

// Field mappings
$solutions_field_id_name        = 1;
$solutions_field_id_description = 3;

foreach ($entry_ids as $entry_id) {
	$entry = GFAPI::get_entry($entry_id);

	if (is_wp_error($entry)) {
		error_log("Solutions: Failed to get entry ID {$entry_id} - " . $entry->get_error_message());
		$solutions_entry_array[] = [
			'name'        => '',
			'description' => '',
			'error'       => "Entry ID {$entry_id} not found.",
		];
		continue;
	}

	$solutions_entry_array[] = [
		'name'        => $entry[$solutions_field_id_name] ?? '',
		'description' => wp_strip_all_tags($entry[$solutions_field_id_description] ?? ''),
	];
}
