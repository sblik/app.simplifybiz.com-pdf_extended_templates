<?php

\SmplfyCore\SMPLFY_Log::info( '/view/do_items.php' );

// Declare global variable
global $variables_do_items, $threats_entry_array, $opportunities_entry_array, $do_items_entry_array;

?>

<h1>DO ITEMS for <?php echo esc_html( $variables_do_items['organization_name'] ?? '' ); ?></h1>

<!-- Objective -->

<table class="smplfyTables" id="table_objective">
    <tr>
        <th class="bg_black">Objective</th>
    </tr>
    <tr>
        <td><?php echo( $variables_do_items['objective'] ); ?></td>
    </tr>
</table>

<!-- Action Steps -->
<table class="smplfyTables" id="table_action_step">
    <tr>
        <th class="bg_black">Action Step</th>
    </tr>
    <tr>
        <td><?php echo( $variables_do_items['action_step'] ); ?></td>
    </tr>
</table>

<!-- Threats -->
<?php if ( ! empty( $variables_do_items['threats'] ) && is_array( $variables_do_items ) ): ?>
    <table class="smplfyTables" id="table_threats">
        <tr>
            <th class="bg_black">Threats</th>
        </tr>
        <!-- Insert Repeater -->
        <tr>
            <td></td>
        </tr>
    </table>
<?php endif; ?>