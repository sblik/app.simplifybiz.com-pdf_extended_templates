<?php

\SmplfyCore\SMPLFY_Log::info( '/view/marketing.php' );

// Declare global variable
global $variables_marketing;

\SmplfyCore\SMPLFY_Log::info( '$variables_marketing' );
\SmplfyCore\SMPLFY_Log::info( $variables_marketing );
?>

    <h1>Marketing Plan for <?php echo $variables_strategy['organization_name'] ?? 'Organization'; ?></h1>

    <!-- Markets -->
<?php if ( ! empty( $variables_marketing ) && is_array( $variables_marketing ) ): ?>
    <!--Marketing Objectives-->
	<?php if ( ! empty( $variables_marketing['objectives'] ) ): ?>
        <h2 class="heading_dark_background">Objective/s</h2>
        <p><?php echo $variables_marketing['objectives']; ?></p>
	<?php endif; ?>

    <!--Channels-->
	<?php if ( ! empty( $variables_marketing['channels'] ) ): ?>
        <h2 class="heading_dark_background">Channels/s</h2>
        <p><?php echo $variables_marketing['channels']; ?></p>
	<?php endif; ?>
    <!--Budget-->
	<?php if ( ! empty( $variables_marketing['budget_once_off_amount'] ) ): ?>
        <h2 class="heading_dark_background">Budget/s</h2>
        <p>
            Once off: <?php echo $variables_marketing['budget_once_off_amount']; ?><br>
            Recurring: <?php echo $variables_marketing['budget_recurring_amount']; ?>
            / <?php echo $variables_marketing['budget_recurring_frequency']; ?>
        </p>
	<?php endif; ?>
    <!--Brand Messaging-->
	<?php if ( ! empty( $variables_marketing['brand_messaging_core_message'] ) ): ?>
        <h2 class="heading_dark_background">Brand Messaging/s</h2>
        <h3 class="heading_light_background">Core Message</h3>
        <p><?php echo $variables_marketing['brand_messaging_core_message']; ?></p>
		<?php if ( ! empty( $variables_marketing['brand_messaging_tone'] ) ): ?>
            <h3 class="heading_light_background">Tone</h3>
            <p><?php echo $variables_marketing['brand_messaging_tone']; ?></p>
		<?php endif; ?>
	<?php endif; ?>
    <!--Content Plan-->
	<?php if ( ! empty( $variables_marketing['content_plan_types'] ) ): ?>
        <h2 class="heading_dark_background">Content Plan</h2>
        <h3 class="heading_light_background">Types</h3>
        <p><?php echo $variables_marketing['content_plan_types']; ?></p>
		<?php if ( ! empty( $variables_marketing['content_plan_tools'] ) ): ?>
            <h3 class="heading_light_background">Tools</h3>
            <p><?php echo $variables_marketing['content_plan_tools']; ?></p>
		<?php endif; ?>
	<?php endif; ?>
    <!--Success Metrics-->
	<?php if ( ! empty( $variables_marketing['success_metrics'] ) ): ?>
        <h2 class="heading_dark_background">Success Metrics/s</h2>
        <p><?php echo $variables_marketing['success_metrics']; ?></p>
	<?php endif; ?>
    <!--Resources-->
	<?php if ( ! empty( $variables_marketing['resources_time'] ) ): ?>
        <h2 class="heading_dark_background">Resources</h2>
        <h3 class="heading_light_background">Owners Time</h3>
        <p><?php echo $variables_marketing['resources_time']; ?></p>
		<?php if ( ! empty( $variables_marketing['resources_skill'] ) ): ?>
            <h3 class="heading_light_background">Owners Skills</h3>
            <p><?php echo $variables_marketing['resources_skill']; ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $variables_marketing['resources_outsource'] ) ): ?>
            <h3 class="heading_light_background">Outsource</h3>
            <p><?php echo $variables_marketing['resources_outsource']; ?></p>
		<?php endif; ?>
	<?php endif; ?>
    <!--Action Steps-->
	<?php if ( ! empty( $variables_marketing['action_steps'] ) ): ?>
        <h2 class="heading_dark_background">Action Step/s</h2>
        <p><?php echo $variables_marketing['action_steps']; ?></p>
	<?php endif; ?>
<?php endif; ?>