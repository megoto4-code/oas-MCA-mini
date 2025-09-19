<div class="span12 text-center">
    <h3>Your admission fee is <?php echo $fee; ?> /- </h3>
    <?php
    echo form_open('admission_payment');
    echo validation_errors('<p class="text-error">', '</p>');
    ?>
    <legend>Fill your draft details</legend>
    <div class="span8 offset2"> 
        <label>Draft number</label>
        <input type="text" name="draft_no" value="<?php echo set_value('draft_no'); ?>" class="input-block-level" />
        <label>Draft date</label>
        <?php days('span2'); ?> 
        <?php months('span3'); ?> 
        <?php years(date("Y"), date("Y"), 'span3'); ?>
        <label>Bank name</label>
        <textarea name="bank" class="input-block-level">
            <?php echo set_value('bank'); ?>
        </textarea>
        <input type="submit" value="Submit" class="btn btn-primary" class="input-block-level" />
    </div>
</form>

</div>