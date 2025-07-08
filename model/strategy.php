<?php
/**
 * SECTION: Get all model from parent and child forms
 */
\SmplfyCore\SMPLFY_Log::info('model/strategy/strategy.php');
\SmplfyCore\SMPLFY_Log::info('$form_data before' );
\SmplfyCore\SMPLFY_Log::info($form_data);


// Fallback for testing or unexpected use
if (empty($form_data) || !is_array($form_data) || !isset($form_data['field'])) {
	\SmplfyCore\SMPLFY_Log::error('[PDF Template] $form_data is missing or malformed');
	return;
}

\SmplfyCore\SMPLFY_Log::info('$form_data after' );
\SmplfyCore\SMPLFY_Log::info($form_data);


$variables_strategy = [];

$variables_strategy['form_id']                       = $form_data['form_id'] ?? '';
$variables_strategy['entry_id']                      = $form_data['entry_id'] ?? '';
$variables_strategy['organization_name']             = $form_data['field'][53] ?? '';
$variables_strategy['date']                          = $form_data['field'][13] ?? '';
$variables_strategy['purpose']                       = !empty($form_data['field'][32]) ? wp_strip_all_tags($form_data['field'][32]) : '';
$variables_strategy['nested_form_ids_problems']      = $form_data['field'][10] ?? [];
$variables_strategy['nested_form_ids_target_market'] = $form_data['field'][11] ?? [];
$variables_strategy['nested_form_ids_solutions']     = $form_data['field'][12] ?? [];
$variables_strategy['nested_form_ids_objective']     = $form_data['field'][35] ?? [];
$variables_strategy['accountable_leadership']        = $form_data['field'][17] ?? '';
$variables_strategy['accountable_marketing']         = $form_data['field'][31] ?? '';
$variables_strategy['accountable_sales']             = $form_data['field'][18] ?? '';
$variables_strategy['accountable_operations']        = $form_data['field'][19] ?? '';
$variables_strategy['accountable_systems']           = $form_data['field'][20] ?? '';

\SmplfyCore\SMPLFY_Log::info($variables_strategy);

// Pass variables to PDF template via filter
add_filter('gfpdf_pdf_field_data_' . $variables_strategy['form_id'], function($data) use ($variables_strategy) {
	$data['variables_strategy'] = $variables_strategy;
	// Include nested arrays if they are defined in the global scope
	global $problems_entry_array, $solutions_entry_array, $markets_entry_array, $objective_entry_array;
	$data['problems_entry_array'] = $problems_entry_array ?? [];
	$data['solutions_entry_array'] = $solutions_entry_array ?? [];
	$data['markets_entry_array'] = $markets_entry_array ?? [];
	$data['objective_entry_array'] = $objective_entry_array ?? [];
	\SmplfyCore\SMPLFY_Log::info('gfpdf_pdf_field_data filter data', $data);
	return $data;
}, 10, 1);