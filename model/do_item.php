<?php
// ## Get Variables from Do Item

\SmplfyCore\SMPLFY_Log::info('/model/do_item.php');

global $variables_do_items;

// Fallback for testing or unexpected use
if (empty($form_data) || !is_array($form_data) || !isset($form_data['field'])) {
	\SmplfyCore\SMPLFY_Log::error('[PDF Template] $form_data is missing or malformed');
	return;
}

// Declare global variable
global $do_items_entry_array;
$do_items_entry_array = [];

$do_item_form_id = 78;

// Ensure input is safe and non-empty
$raw_ids   = $variables_do_items['nested_form_ids_do_item'] ?? '';
$entry_ids = array_filter(array_map('trim', explode(',', $raw_ids)));

\SmplfyCore\SMPLFY_Log::info('PDF_EXTENDED_TEMPLATES');

// Map field IDs
$do_items_field_id_action_step    = 11;
$do_items_field_id_do_item    = 1;
$do_items_field_id_point_person   = 5;
$do_items_field_id_due_date   = 6;
$do_items_field_id_due_time   = 7;
$do_items_field_id_status   = 9;


foreach ($entry_ids as $entry_id) {
	$entry = GFAPI::get_entry($entry_id);

	if (is_wp_error($entry)) {
		$opportunities_entry_array[] = [
			'error'     => "Entry ID {$entry_id} not found.",
			'action_step' => '',
			'do_item' => '',
			'point_person' => '',
			'due_date' => '',
			'due_time' => '',
			'status' => '',
		];
	} else {
		$objective_entry_array[] = [
			'action_step' => $entry[$do_items_field_id_action_step] ?? '',
			'do_item' => $entry[$do_items_field_id_do_item] ?? '',
			'point_person' => $entry[$do_items_field_id_point_person] ?? '',
			'due_date' => $entry[$do_items_field_id_due_date] ?? '',
			'due_time' => $entry[$do_items_field_id_due_time] ?? '',
			'status' => $entry[$do_items_field_id_status] ?? '',
		];
	}
}
