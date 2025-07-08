<?php

\SmplfyCore\SMPLFY_Log::info( '/view/strategy.php' );

// Declare global variable
global $variables_strategy;
global $markets_entry_array;
global $objective_entry_array;

\SmplfyCore\SMPLFY_Log::info( '$markets_entry_array' );
\SmplfyCore\SMPLFY_Log::info( $markets_entry_array );
?>

<h1>STRATEGY for <?php echo esc_html( $variables_strategy['organization_name'] ?? '' ); ?></h1>

<!-- Purpose ------------------------------------------------------------------------------------------------ -->
<table class="smplfyTables" id="table_purpose">
    <tr>
        <th class="bg_black">Why we are in Business</th>
    </tr>
	<?php if ( ! empty( $variables_strategy['purpose'] ) ): ?>
        <tr>
            <td><?php echo( $variables_strategy['purpose'] ); ?></td>
        </tr>
	<?php else: ?>
        <tr>
            <td>No purpose listed.</td>
        </tr>
	<?php endif; ?>
</table>

<!-- Target Market ------------------------------------------------------------------------------------------------ -->
<table class="smplfyTables" id="table_target_market">
    <tr>
        <th class="bg_black">Who We Serve</th>
    </tr>
    <tr>
        <td>
        <ul>
	    <?php if ( ! empty( $markets_entry_array ) && is_array( $markets_entry_array ) ): ?>
	    <?php foreach ( $markets_entry_array as $entry ): ?>

        <li><?php echo esc_html( $entry['name'] ?? '' ); ?></li>
	<?php endforeach; ?>
        </ul>
	<?php else: ?>
        </td>
    </tr>
        <tr>
            <td>No target markets listed.</td>
        </tr>
	<?php endif; ?>
</table>


<!-- Solutions ------------------------------------------------------------------------------------------------ -->
<table class="smplfyTables" id="table_solutions">
    <tr>
        <th class="bg_black">Our Solutions</th>
    </tr>
	<?php if ( ! empty( $variables_strategy['solutions'] ) ): ?>
        <tr>
            <td><?php echo( $variables_strategy['solutions'] ); ?></td>
        </tr>
	<?php else: ?>
        <tr>
            <td>No solutions listed.</td>
        </tr>
	<?php endif; ?>
</table>

<!-- Budget ------------------------------------------------------------------------------------------------ -->
<table class="smplfyTables" id="table_budget">
    <tr>
        <th class="bg_black" colspan="5">Budget</th>
    </tr>
    <tr>
        <td class="bg_yellow">Marketing</td>
        <td class="bg_red">Sales</td>
        <td class="bg_blue">Operations</td>
        <td class="bg_green">Admin</td>
        <td class="bg_purple">Profit</td>
    </tr>
    <tr>
        <td><?php echo( $variables_strategy['budget_marketing'] ); ?>%</td>
        <td><?php echo( $variables_strategy['budget_sales'] ); ?>%</td>
        <td><?php echo( $variables_strategy['budget_operations'] ); ?>%</td>
        <td><?php echo( $variables_strategy['budget_admin'] ); ?>%</td>
        <td><?php echo( $variables_strategy['budget_profit'] ); ?>%</td>
    </tr>
</table>
<!-- Accountability ------------------------------------------------------------------------------------------------ -->
<table class="smplfyTables" id="table_accountability" style="width: 100%; border-collapse: collapse;">
	<?php
	$roles = [
		'accountable_leadership' => 'bg_yellow',
		'accountable_marketing' => 'bg_red',
		'accountable_sales' => 'bg_blue',
		'accountable_operations' => 'bg_green',
		'accountable_systems' => 'bg_purple',
	];
	$populated_roles_count = 0;
	foreach ($roles as $role => $class) {
		if (!empty(array_filter($variables_strategy[$role] ?? [])) && is_array($variables_strategy)) {
			$populated_roles_count++;
		}
	}
	?>
    <tr>
        <th class="bg_black" style="width: 100%;" <?php echo $populated_roles_count > 0 ? 'colspan="' . esc_attr($populated_roles_count) . '"' : ''; ?>>Accountability</th>
    </tr>
	<?php if ($populated_roles_count > 0): ?>
        <tr>
			<?php
			$has_content = false;
			foreach ($roles as $role => $class) {
				if (!empty(array_filter($variables_strategy[$role] ?? [])) && is_array($variables_strategy)) {
					echo '<td class="' . esc_attr($class) . '">' . esc_html(ucfirst(str_replace('accountable_', '', $role))) . '</td>';
					$has_content = true;
				}
			}
			?>
        </tr>
        <tr>
			<?php
			$has_content = false;
			foreach ($roles as $role => $class) {
				if (!empty(array_filter($variables_strategy[$role] ?? [])) && is_array($variables_strategy)) {
					$name = trim(($variables_strategy[$role]['first'] ?? '') . ' ' . ($variables_strategy[$role]['last'] ?? ''));
					echo '<td>' . esc_html($name) . '</td>';
					$has_content = true;
				}
			}
			?>
        </tr>
	<?php else: ?>
        <tr>
            <td>No roles assigned.</td>
        </tr>
        <tr>
            <td>No names assigned.</td>
        </tr>
	<?php endif; ?>
</table>


<!-- Objectives ------------------------------------------------------------------------------------------------ -->
<table class="smplfyTables" id="table_objectives">
    <tr>
        <th class="bg_black" colspan="3">Quarterly Objectives</th>
    </tr>
    <tr>
        <td class="bg_yellow">Objective</td>
        <td class="bg_red">Point Person</td>
        <td class="bg_blue">Due</td>
    </tr>
	<?php if ( ! empty( $objective_entry_array ) && is_array( $objective_entry_array ) ): ?>
		<?php foreach ( $objective_entry_array as $objective_entry ): ?>
            <tr>
                <td><?php echo esc_html( $objective_entry['objective'] ?? '' ); ?></td>
                <td><?php echo esc_html( $objective_entry['point'] ?? '' ); ?></td>
                <td><?php echo esc_html( trim( ( $objective_entry['due_date'] ?? '' ) . ' @ ' . ( $objective_entry['due_time'] ?? '' ) ) ); ?></td>
            </tr>
		<?php endforeach; ?>
	<?php else: ?>
        <tr>
            <td colspan="3">No objectives listed.</td>
        </tr>
	<?php endif; ?>
</table>
