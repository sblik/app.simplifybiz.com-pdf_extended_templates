<?php
// ## Get Variables from Target Markets

global $variables_strategy;

$markets_form_id = 70;

// Safely retrieve and clean nested entry IDs
$raw_ids   = $variables_strategy['nested_form_ids_target_market'] ?? '';
$entry_ids = array_filter(array_map('trim', explode(',', $raw_ids)));

$markets_entry_array = [];

// Field mappings
$markets_field_id_name        = 1;
$markets_field_id_demographic = 2;
$markets_field_id_reach       = 3;
$markets_field_id_values      = 4;
$markets_field_id_research    = 5;

foreach ($entry_ids as $entry_id) {
	$entry = GFAPI::get_entry($entry_id);

	if (is_wp_error($entry)) {
		error_log("Target Market: Failed to get entry ID {$entry_id} - " . $entry->get_error_message());
		$markets_entry_array[] = [
			'name'        => '',
			'demographic' => '',
			'reach'       => '',
			'values'      => '',
			'research'    => '',
			'error'       => "Entry ID {$entry_id} not found.",
		];
		continue;
	}

	$markets_entry_array[] = [
		'name'        => $entry[$markets_field_id_name] ?? '',
		'demographic' => $entry[$markets_field_id_demographic] ?? '',
		'reach'       => $entry[$markets_field_id_reach] ?? '',
		'values'      => $entry[$markets_field_id_values] ?? '',
		'research'    => wp_strip_all_tags($entry[$markets_field_id_research] ?? ''),
	];
}
