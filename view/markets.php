<?php

\SmplfyCore\SMPLFY_Log::info( '/view/markets.php' );

// Declare global variable
global $variables_strategy;
global $markets_entry_array;

\SmplfyCore\SMPLFY_Log::info( '$markets_entry_array' );
\SmplfyCore\SMPLFY_Log::info( $markets_entry_array );
?>

<h1>Target Markets for <?php echo esc_html( $variables_strategy['organization_name'] ?? '' ); ?></h1>

<!-- Markets ------------------------------------------------------------------------------------------------ -->


<?php if ( ! empty( $markets_entry_array ) && is_array( $markets_entry_array ) ): ?>
	<?php foreach ( $markets_entry_array as $entry ): ?>
        <h2><?php echo esc_html( $entry['name'] ?? '' ); ?></h2>
		<?php if ( ! empty( $entry['demographics'] ): ?>
            <h3>Demographics</h3>
            <p><?php echo esc_html( $entry['demographics'] ?? '' ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $entry['behaviors'] ): ?>
            <h3>Behaviors & Interests</h3>
            <p><?php echo esc_html( $entry['behaviors'] ?? '' ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $entry['values'] ): ?>
            <h3>Values & Motivation</h3>
            <p><?php echo esc_html( $entry['values'] ?? '' ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $entry['scope'] ): ?>
            <h3>Market Size & Scope</h3>
            <p><?php echo esc_html( $entry['scope'] ?? '' ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $entry['opportunities'] ): ?>
            <h3>Opportunities</h3>
            <p><?php echo esc_html( $entry['opportunities'] ?? '' ); ?></p>
		<?php endif; ?>


	<?php endforeach; ?>

<?php else: ?>

    <p>No target markets listed.</p>

<?php endif; ?>
