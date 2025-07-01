<?php ?>
<H1>STRATEGY for <?php echo $variables_strategy['organization_name'] ?> </H1>
<div><span class="bold">Date Created: </span> <?php echo $variables_strategy['date'] ?></div>
<!-- Purpose ------------------------------------------------------------------------------------------------ -->
<div><span class="bold">Purpose: </span> <?php echo $variables_strategy['purpose'] ?></div>
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
    <?php
    foreach ($problems_entry_array as $entry) {
        echo '<tr>';
        echo '<td>' . $entry['name'] . '</td>';
        echo '<td>' . $entry['description'] . '</td>';
        echo '</tr>';
    }
    ?>
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
    <?php
    foreach ($solutions_entry_array as $entry) {
        echo '<tr>';
        echo '<td>' . $entry['name'] . '</td>';
        echo '<td>' . $entry['description'] . '</td>';
        echo '</tr>';
    }
    ?>
</table>
<!-- Target Market ------------------------------------------------------------------------------------------------ -->
<table class="smplfyTables" id="table_target_market">
    <tr>
        <th class="bg_black" colspan="4">Who We Solve These Problems For</th>
    </tr>
    <?php
    foreach ($markets_entry_array as $entry) {
        echo '<tr>';
        echo '<td colspan="4" class="bg_yellow">' . $entry['name'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td class="bg_red w25">Demographics</td>';
        echo '<td class="bg_blue w20">Behavior</td>';
        echo '<td class="bg_green w20">Values</td>';
        echo '<td class="bg_purple">Market Size & Scope</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>' . $entry['demographic'] . '</td>';
        echo '<td>' . $entry['reach'] . '</td>';
        echo '<td>' . $entry['values'] . '</td>';
        echo '<td>' . $entry['research'] . '</td>';
        echo '</tr>';
    }
    ?>
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
            <td><?php echo $variables_strategy['accountable_leadership']['first'] . ' ' . $variables_strategy['accountable_leadership']['last']; ?></td>
            <td><?php echo $variables_strategy['accountable_marketing']['first'] . ' ' . $variables_strategy['accountable_marketing']['last']; ?></td>
            <td><?php echo $variables_strategy['accountable_sales']['first'] . ' ' . $variables_strategy['accountable_sales']['last']; ?></td>
            <td><?php echo $variables_strategy['accountable_operations']['first'] . ' ' . $variables_strategy['accountable_operations']['last']; ?></td>
            <td><?php echo $variables_strategy['accountable_systens']['first'] . ' ' . $variables_strategy['accountable_systens']['last']; ?></td>
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
        <?php
        foreach ($objective_entry_array as $objective_entry) {
            echo '<tr>';
            echo '<td>' . $objective_entry['objective'] . '</td>';
            echo '<td>' . $objective_entry['point'] . '</td>';
            echo '<td>' . $objective_entry['due_date'] . ' @ ' . $objective_entry['due_time'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>