<?php
global $variables_strategy, $problems_entry_array, $solutions_entry_array, $markets_entry_array, $objective_entry_array;
?>

<h1>STRATEGY for <?php echo esc_html($variables_strategy['organization_name'] ?? ''); ?></h1>
<div><span class="bold">Date Created: </span> <?php echo esc_html($variables_strategy['date'] ?? ''); ?></div>

<!-- Purpose ------------------------------------------------------------------------------------------------ -->
<div><span class="bold">Purpose: </span> <?php echo esc_html($variables_strategy['purpose'] ?? ''); ?></div>
<div class="spacer"></div>

<!-- Problems ------------------------------------------------------------------------------------------------ -->
<table class="smplfyTables" id="table_problems">
    <tr>
        <th class="bg_black" colspan="2">Problems We Solve</th>
    </tr>
    <tr>
        <td class="bg_yellow">Problem</td>
        <td class="bg_red">Description</td>
    </tr>
	<?php if (!empty($problems_entry_array) && is_array($problems_entry_array)): ?>
		<?php foreach ($problems_entry_array as $entry): ?>
            <tr>
                <td><?php echo esc_html($entry['name'] ?? ''); ?></td>
                <td><?php echo esc_html($entry['description'] ?? ''); ?></td>
            </tr>
		<?php endforeach; ?>
	<?php else: ?>
        <tr><td colspan="2">No problems listed.</td></tr>
	<?php endif; ?>
</table>

<!-- Solutions ------------------------------------------------------------------------------------------------ -->
<table class="smplfyTables" id="table_solutions">
    <tr>
        <th class="bg_black" colspan="2">How We Solve These Problems</th>
    </tr>
    <tr>
        <td class="bg_yellow">Solution</td>
        <td class="bg_red">Description</td>
    </tr>
	<?php if (!empty($solutions_entry_array) && is_array($solutions_entry_array)): ?>
		<?php foreach ($solutions_entry_array as $entry): ?>
            <tr>
                <td><?php echo esc_html($entry['name'] ?? ''); ?></td>
                <td><?php echo esc_html($entry['description'] ?? ''); ?></td>
            </tr>
		<?php endforeach; ?>
	<?php else: ?>
        <tr><td colspan="2">No solutions listed.</td></tr>
	<?php endif; ?>
</table>

<!-- Target Market ------------------------------------------------------------------------------------------------ -->
<table class="smplfyTables" id="table_target_market">
    <tr>
        <th class="bg_black" colspan="4">Who We Solve These Problems For</th>
    </tr>
	<?php if (!empty($markets_entry_array) && is_array($markets_entry_array)): ?>
		<?php foreach ($markets_entry_array as $entry): ?>
            <tr>
                <td colspan="4" class="bg_yellow"><?php echo esc_html($entry['name'] ?? ''); ?></td>
            </tr>
            <tr>
                <td class="bg_red w25">Demographics</td>
                <td class="bg_blue w20">Behavior</td>
                <td class="bg_green w20">Values</td>
                <td class="bg_purple">Market Size & Scope</td>
            </tr>
            <tr>
                <td><?php echo esc_html($entry['demographic'] ?? ''); ?></td>
                <td><?php echo esc_html($entry['reach'] ?? ''); ?></td>
                <td><?php echo esc_html($entry['values'] ?? ''); ?></td>
                <td><?php echo esc_html($entry['research'] ?? ''); ?></td>
            </tr>
		<?php endforeach; ?>
	<?php else: ?>
        <tr><td colspan="4">No target markets listed.</td></tr>
	<?php endif; ?>
</table>

<pagebreak>

    <!-- Accountability ------------------------------------------------------------------------------------------------ -->
    <table class="smplfyTables" id="table_accountability">
        <tr>
            <th class="bg_black" colspan="5">Accountability</th>
        </tr>
        <tr>
            <td class="bg_yellow">Leadership</td>
            <td class="bg_red">Marketing</td>
            <td class="bg_blue">Sales</td>
            <td class="bg_green">Operations</td>
            <td class="bg_purple">Systems</td>
        </tr>
        <tr>
			<?php
			$roles = [
				'accountable_leadership',
				'accountable_marketing',
				'accountable_sales',
				'accountable_operations',
				'accountable_systems',
			];
			foreach ($roles as $role) {
				$person = $variables_strategy[$role] ?? '';
				$name = is_array($person)
					? trim(($person['first'] ?? '') . ' ' . ($person['last'] ?? ''))
					: $person;
				echo '<td>' . esc_html($name) . '</td>';
			}
			?>
        </tr>
    </table>

    <!-- Objectives ------------------------------------------------------------------------------------------------ -->
    <table class="smplfyTables" id="table_objectives">
        <tr>
            <th class="bg_black" colspan="3">Quarterly Objectives</th>
        </tr>
        <tr>
            <td class="bg_yellow">Objective</td>
            <td class="bg_red">Point</td>
            <td class="bg_blue">Due</td>
        </tr>
		<?php if (!empty($objective_entry_array) && is_array($objective_entry_array)): ?>
			<?php foreach ($objective_entry_array as $objective_entry): ?>
                <tr>
                    <td><?php echo esc_html($objective_entry['objective'] ?? ''); ?></td>
                    <td><?php echo esc_html($objective_entry['point'] ?? ''); ?></td>
                    <td><?php echo esc_html(trim(($objective_entry['due_date'] ?? '') . ' @ ' . ($objective_entry['due_time'] ?? ''))); ?></td>
                </tr>
			<?php endforeach; ?>
		<?php else: ?>
            <tr><td colspan="3">No objectives listed.</td></tr>
		<?php endif; ?>
    </table>
