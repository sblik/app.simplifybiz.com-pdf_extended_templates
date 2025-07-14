<?php
/**
 * SECTION: Get all model from parent and child forms
 */

use SmplfyCore\SMPLFY_Log;

SMPLFY_Log::info( '/model/strategy.php' );


// Fallback for testing or unexpected use
if ( empty( $form_data ) || ! is_array( $form_data ) || ! isset( $form_data['field'] ) ) {
	SMPLFY_Log::error( '[PDF Template] $form_data is missing or malformed' );

	return;
}

// Declare global variable
global $variables_strategy;
$variables_strategy = [];

$variables_strategy['form_id']                       = $form_data['form_id'] ?? '';
$variables_strategy['entry_id']                      = $form_data['entry_id'] ?? '';
$variables_strategy['organization_name']             = $form_data['field'][53] ?? '';
$variables_strategy['date']                          = $form_data['field'][13] ?? '';
$variables_strategy['purpose']                       = $form_data['field'][32] ?? '';
$variables_strategy['nested_form_ids_target_market'] = $form_data['field'][11] ?? [];
$variables_strategy['solutions']                     = $form_data['field'][42] ?? '';
$variables_strategy['nested_form_ids_objective']     = $form_data['field'][35] ?? [];
$variables_strategy['budget_marketing']              = $form_data['field'][48] ?? '';
$variables_strategy['budget_sales']                  = $form_data['field'][49] ?? '';
$variables_strategy['budget_operations']             = $form_data['field'][47] ?? '';
$variables_strategy['budget_admin']                  = $form_data['field'][46] ?? '';
$variables_strategy['budget_profit']                 = $form_data['field'][52] ?? '';
$variables_strategy['accountable_leadership']        = $form_data['field'][17] ?? '';
$variables_strategy['accountable_marketing']         = $form_data['field'][31] ?? '';
$variables_strategy['accountable_sales']             = $form_data['field'][18] ?? '';
$variables_strategy['accountable_operations']        = $form_data['field'][19] ?? '';
$variables_strategy['accountable_systems']           = $form_data['field'][20] ?? '';