<?php
/**
 * SECTION: Get all model from parent  forms
 */
\SmplfyCore\SMPLFY_Log::info( '/model/marketing.php' );


// Fallback for testing or unexpected use
if ( empty( $form_data ) || ! is_array( $form_data ) || ! isset( $form_data['field'] ) ) {
	\SmplfyCore\SMPLFY_Log::error( '[PDF Template] $form_data is missing or malformed' );

	return;
}

// Declare global variable
global $variables_marketing;
$variables_marketing = [];

$variables_marketing['form_id']                      = $form_data['form_id'] ?? '';
$variables_marketing['entry_id']                     = $form_data['entry_id'] ?? '';
$variables_marketing['organization_name']            = $form_data['field'][187] ?? '';
$variables_marketing['date']                         = $form_data['field'][13] ?? '';
$variables_marketing['objectives']                   = $form_data['field'][86] ?? [];
$variables_marketing['channels']                     = $form_data['field'][107] ?? [];
$variables_marketing['budget_once_off_amount']       = $form_data['field'][179] ?? [];
$variables_marketing['budget_recurring_amount']      = $form_data['field'][180] ?? '';
$variables_marketing['budget_recurring_frequency']   = $form_data['field'][181] ?? '';
$variables_marketing['brand_messaging_core_message'] = $form_data['field'][119] ?? '';
$variables_marketing['brand_messaging_tone']         = $form_data['field'][116] ?? '';
$variables_marketing['content_plan_types']           = $form_data['field'][122] ?? '';
$variables_marketing['content_plan_tools']           = $form_data['field'][130] ?? '';
$variables_marketing['success_metrics']              = $form_data['field'][135] ?? '';
$variables_marketing['resources_time']               = $form_data['field'][144] ?? '';
$variables_marketing['resources_skill']              = $form_data['field'][148] ?? '';
$variables_marketing['resources_outsource']          = $form_data['field'][152] ?? '';
$variables_marketing['action_steps']                 = $form_data['field'][157] ?? '';