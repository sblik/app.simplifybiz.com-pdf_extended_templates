<?php
// ## Get Variables from Objectives

global $variables_strategy;

$objectives_form_id = 82;

// Ensure input is safe and non-empty
$raw_ids   = $variables_strategy['nested_form_ids_objective'] ?? '';
$entry_ids = array_filter(array_map('trim', explode(',', $raw_ids)));

\SmplfyCore\SMPLFY_Log::info('PDF_EXTENDED_TEMPLATES');

$objective_entry_array = [];

// Map field IDs
$objectives_field_id_objective    = 1;
$objectives_field_id_point_person = 5;
$objectives_field_id_due_date     = 6;
$objectives_field_id_due_time     = 7;

foreach ($entry_ids as $entry_id) {
	$entry = GFAPI::get_entry($entry_id);

	if (is_wp_error($entry)) {
		$objective_entry_array[] = [
			'error'     => "Entry ID {$entry_id} not found.",
			'objective' => '',
			'point'     => '',
			'due_date'  => '',
			'due_time'  => '',
		];
	} else {
		$objective_entry_array[] = [
			'objective' => $entry[$objectives_field_id_objective] ?? '',
			'point'     => $entry[$objectives_field_id_point_person] ?? '',
			'due_date'  => $entry[$objectives_field_id_due_date] ?? '',
			'due_time'  => $entry[$objectives_field_id_due_time] ?? '',
		];
	}
}
