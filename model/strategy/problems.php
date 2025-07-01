<?php
// ## Get Variables from Problems
$problems_form_id              = 71;
$entry_ids                     = array_map('trim', explode(',', $variables_strategy['nested_form_ids_problems']));
$problems_entry_array          = [];
$problems_counter              = 0;
$problems_field_id_name        = 1;
$problems_field_id_description = 3;

var_dump($entry_ids);


foreach ($entry_ids as $entry_id) {
    $entry                                                  = GFAPI::get_entry($entry_id);
	if (is_wp_error($entry)) {
		// Optionally log the error
		error_log('Failed to get entry ID ' . $entry_id . ': ' . $entry->get_error_message());
		continue; // Skip this entry
	}
    $problems_entry_array[$problems_counter]['name']        = $entry[$problems_field_id_name];
    $problems_entry_array[$problems_counter]['description'] = $entry[$problems_field_id_description];


    $problems_counter++;
}

var_dump($problems_entry_array);