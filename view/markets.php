<?php

\SmplfyCore\SMPLFY_Log::info( '/view/markets.php' );

// Declare global variable
global $variables_strategy, $markets_entry_array;

\SmplfyCore\SMPLFY_Log::info( '$markets_entry_array' );
\SmplfyCore\SMPLFY_Log::info( $markets_entry_array );
?>

    <h1>Target Markets for <?php echo $variables_strategy['organization_name'] ?? 'Unknown Organization'; ?></h1>

    <!-- Markets -->
<?php if (!empty($markets_entry_array) && is_array($markets_entry_array)): ?>
	<?php foreach ($markets_entry_array as $entry): ?>
        <h2 class="heading_dark_background"><?php echo $entry['name'] ?? 'Unnamed Market'; ?></h2>

		<?php if (!empty($entry['demographics'])): ?>
            <h3 class="heading_light_background">Demographics</h3>
            <p><?php echo $entry['demographics']; ?></p>
		<?php endif; ?>

		<?php if (!empty($entry['behaviors'])): ?>
            <h3 class="heading_light_background">Behaviors & Interests</h3>
            <p><?php echo $entry['behaviors']; ?></p>
		<?php endif; ?>

		<?php if (!empty($entry['values'])): ?>
            <h3 class="heading_light_background">Values & Motivation</h3>
            <p><?php echo $entry['values']; ?></p>
		<?php endif; ?>

		<?php if (!empty($entry['scope'])): ?>
            <h3 class="heading_light_background">Market Size & Scope</h3>
            <p><?php echo $entry['scope']; ?></p>
		<?php endif; ?>

		<?php if (!empty($entry['opportunities'])): ?>
            <h3 class="heading_light_background">Opportunities</h3>
            <p><?php echo $entry['opportunities']; ?></p>
		<?php endif; ?>
	<?php endforeach; ?>
<?php else: ?>
    <p>No target markets listed.</p>
<?php endif; ?>