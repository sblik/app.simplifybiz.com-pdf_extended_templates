<?php
// ## Get Variables from Target Markets

\SmplfyCore\SMPLFY_Log::info( '/model/markets.php' );

global $variables_strategy;

// Fallback for testing or unexpected use
if ( empty( $form_data ) || ! is_array( $form_data ) || ! isset( $form_data['field'] ) ) {
	\SmplfyCore\SMPLFY_Log::error( '[PDF Template] $form_data is missing or malformed' );

	return;
}

// Declare global variable
global $markets_entry_array;
$markets_entry_array = [];

$markets_form_id = 70;

// Safely retrieve and clean nested entry IDs
$raw_ids   = $variables_strategy['nested_form_ids_target_market'] ?? '';
$entry_ids = array_filter( array_map( 'trim', explode( ',', $raw_ids ) ) );

if ( is_string( $raw_ids ) ) {
	$entry_ids = array_filter( array_map( 'trim', explode( ',', $raw_ids ) ) );
} elseif ( is_array( $raw_ids ) ) {
	$entry_ids = array_filter( $raw_ids, function ( $id ) {
		return is_numeric( $id ) && ! empty( trim( $id ) );
	} );
} else {
	\SmplfyCore\SMPLFY_Log::warn( 'nested_form_ids_target_market is neither a string nor an array', [ 'raw_ids' => $raw_ids ] );
}

// Field mappings
$markets_field_id_name          = 1;
$markets_field_id_demographics  = 2;
$markets_field_id_behaviors     = 3;
$markets_field_id_values        = 4;
$markets_field_id_scope         = 5;
$markets_field_id_opportunities = 8;

foreach ( $entry_ids as $entry_id ) {
	$entry = GFAPI::get_entry( $entry_id );
	if ( is_wp_error( $entry ) ) {
		\SmplfyCore\SMPLFY_Log::error( "Target Market: Failed to get entry ID {$entry_id} - " . $entry->get_error_message() );
		$markets_entry_array[] = [
			'name'          => '',
			'demographics'  => '',
			'behaviors'     => '',
			'values'        => '',
			'scope'         => '',
			'opportunities' => '',
			'error'         => "Entry ID {$entry_id} not found.",
		];
		continue;
	}

	$markets_entry_array[] = [
		'name'          => $entry[ $markets_field_id_name ] ?? '',
		'demographics'  => $entry[ $markets_field_id_demographics ] ?? '',
		'behaviors'     => $entry[ $markets_field_id_behaviors ] ?? '',
		'values'        => $entry[ $markets_field_id_values ] ?? '',
		'scope'         => wp_strip_all_tags( $entry[ $markets_field_id_scope ] ?? '' ),
		'opportunities' => $entry[ $markets_field_id_opportunities ] ?? '',
	];
}

\SmplfyCore\SMPLFY_Log::info( 'Array Target Market:', $markets_entry_array );