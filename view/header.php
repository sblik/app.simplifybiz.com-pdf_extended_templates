<?php
global $variables_strategy;
?>
<!-- HEADER ------------------------------------------------------------------------------------------------ -->
<htmlpageheader name="SmplfyHeader">
    <table class="header">
        <tr>
            <td>
				<?php echo esc_html($variables_strategy['organization_name'] ?? ''); ?> Business
                Strategy <?php echo esc_html($variables_strategy['date'] ?? ''); ?>
            </td>
        </tr>
    </table>
</htmlpageheader>
