<?php
// ## Get Variables from markets
$markets_form_id              = 70;
$entry_ids                    = array_map('trim', explode(',', $variables_strategy['nested_form_ids_target_market']));
$markets_entry_array          = [];
$markets_counter              = 0;
$markets_field_id_name        = 1;
$markets_field_id_demographic = 2;
$markets_field_id_reach       = 3;
$markets_field_id_values      = 4;
$markets_field_id_research    = 5;

//var_dump($entry_ids);


foreach ($entry_ids as $entry_id) {
    $entry                                                = GFAPI::get_entry($entry_id);
    $markets_entry_array[$markets_counter]                = is_wp_error($entry) ? ['error' => "Entry ID $entry_id not found."] : $entry;
    $markets_entry_array[$markets_counter]['name']        = $entry[$markets_field_id_name];
    $markets_entry_array[$markets_counter]['demographic'] = $entry[$markets_field_id_demographic];
    $markets_entry_array[$markets_counter]['reach']       = $entry[$markets_field_id_reach];
    $markets_entry_array[$markets_counter]['values']      = $entry[$markets_field_id_values];
    $markets_entry_array[$markets_counter]['research']    = wp_strip_all_tags($entry[$markets_field_id_research]);


    $markets_counter++;
}

//var_dump($markets_entry_array);