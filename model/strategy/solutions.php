<?php
// ## Get Variables from solutions
$solutions_form_id              = 72;
$entry_ids                      = array_map('trim', explode(',', $variables_strategy['nested_form_ids_solutions']));
$solutions_entry_array          = [];
$solutions_counter              = 0;
$solutions_field_id_name        = 1;
$solutions_field_id_description = 3;

//var_dump($entry_ids);


foreach ($entry_ids as $entry_id) {
    $entry                                                    = GFAPI::get_entry($entry_id);
    $solutions_entry_array[$solutions_counter]                = is_wp_error($entry) ? ['error' => "Entry ID $entry_id not found."] : $entry;
    $solutions_entry_array[$solutions_counter]['name']        = $entry[$solutions_field_id_name];
    $solutions_entry_array[$solutions_counter]['description'] = wp_strip_all_tags($entry[$solutions_field_id_description]);


    $solutions_counter++;
}

//var_dump($solutions_entry_array);