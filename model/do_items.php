<?php
/**
 * SECTION: Get all model from parent  forms
 */

use SmplfyCore\SMPLFY_Log;

SMPLFY_Log::info( '/model/do_items.php' );
// Fallback for testing or unexpected use
if ( empty( $form_data ) || ! is_array( $form_data ) || ! isset( $form_data['field'] ) ) {
	SMPLFY_Log::error( '[PDF Template] $form_data is missing or malformed' );

	return;
}

// Declare global variable
global $variables_do_items;

$variables_do_items['form_id']                       = $form_data['form_id'] ?? '';
$variables_do_items['entry_id']                      = $form_data['entry_id'] ?? '';
$variables_do_items['organization_name']             = $form_data['field'][46] ?? '';
$variables_do_items['objective']                     = $form_data['field'][45] ?? '';
$variables_do_items['action_step']                   = $form_data['field'][42] ?? '';
$variables_do_items['due_date']                      = $form_data['field'][43] ?? '';
$variables_do_items['due_time']                      = $form_data['field'][44] ?? '';
$variables_do_items['status']                        = $form_data['field'][40] ?? '';
$variables_strategy['nested_form_ids_threats']       = $form_data['field'][31] ?? 'No Threats';
$variables_do_items['nested_form_ids_opportunities'] = $form_data['field'][32] ?? 'No Opportunities';
$variables_do_items['nested_form_ids_do_items']      = $form_data['field'][28] ?? '';