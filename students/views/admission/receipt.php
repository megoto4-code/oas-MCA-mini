<div class="span12">
    <div class="well well-small">
        <legend>Print your receipt</legend>
    </div>
    <h3 class="text-center">
        <?php
        $atts = array('width'      => '970');
        echo anchor_popup('admission_receipt/generate/' . $control_id, 'Print Receipt', $atts);
        ?>
    </h3>
    <?php echo date('Y').'0001'; ?>
</div>