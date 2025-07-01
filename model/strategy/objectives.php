<?php
// ## Get Variables from Objectives
$objectives_form_id               = 82;
$entry_ids                        = array_map('trim', explode(',', $variables_strategy['nested_form_ids_objective']));
$objective_entry_array            = [];
$objectives_counter               = 0;
$objectives_field_id_objective    = 1;
$objectives_field_id_point_person = 5;
$objectives_field_id_due_date     = 6;
$objectives_field_id_due_time     = 7;


foreach ($entry_ids as $entry_id) {
    $entry                                      = GFAPI::get_entry($entry_id);
    $objective_entry_array[$objectives_counter] = is_wp_error($entry) ? ['error' => "Entry ID $entry_id not found."] : $entry;
//    var_dump($entry);
    $objective_entry_array[$objectives_counter]['objective'] = $entry[1];
    $objective_entry_array[$objectives_counter]['point']     = $entry[5];
    $objective_entry_array[$objectives_counter]['due_date']  = $entry[6];
    $objective_entry_array[$objectives_counter]['due_time']  = $entry[7];

    $objectives_counter++;
}

//var_dump($objective_entry_array);