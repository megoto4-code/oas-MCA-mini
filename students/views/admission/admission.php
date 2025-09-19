<?php echo form_open('admission'); ?>
<div class="span12"><div class="well well-small">
        <legend class="text-center">
            Welcome <strong><em><?php echo mailto($user_email); ?></em></strong>. 
            Fill the following details. <small>(All fields are mandatory)</small>
        </legend>
    </div>
    <div class="row"><?php echo validation_errors(); ?></div>
</div>
<div class="span4">
    <legend>1. Your Study details &gt;&gt;</legend>
    <label>Programme</label>
    <select name="programme" class="input-block-level">
        <option></option>
        <?php foreach ($programme as $item) { ?>
        <option value="<?php echo $item->code; ?>" <?php echo set_select('programme',$item->code); ?>><?php echo $item->code; ?></option>
        <?php } ?>
    </select>
    <label>Relevant qualification</label>
    <input type="text" name="qualification" value="<?php echo set_value('qualification'); ?>" class="input-block-level" />
    <label>Subjects</label>
    <textarea name="subjects" rows="10" class="input-block-level"><?php echo set_value('subjects') ?></textarea>
    <label>Passing year</label>
    <input type="text" name="passing_year" value="<?php echo set_value('passing_year'); ?>" class="input-block-level" />
    <label>Percentage</label>
    <input type="text" name="percentage" value="<?php echo set_value('percentage'); ?>" class="input-block-level" />
    <label>Board name</label>
    <input type="text" name="board" value="<?php echo set_value('board'); ?>" class="input-block-level" />
</div>
<div class="span4">
    <legend>2. Your Contact details &gt;&gt;</legend>
    <label>Phone</label>
    <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" class="input-block-level" />
    <label>Address</label>
    <textarea name="address" rows="10" class="input-block-level"><?php echo set_value('address') ?></textarea>
    <label>City</label>
    <input type="text" name="city" value="<?php echo set_value('city'); ?>" class="input-block-level" />
    <label>District</label>
    <input type="text" name="district" value="<?php echo set_value('district'); ?>" class="input-block-level" />
    <label>State</label>
    <input type="text" name="state" value="<?php echo set_value('state'); ?>" class="input-block-level" />
    <label>Pin code</label>
    <input type="text" name="pin" value="<?php echo set_value('pin'); ?>" class="input-block-level" />
</div>
<div class="span4">
    <legend>3. Your personal details &gt;&gt;</legend>
    <label>Name</label>
    <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="input-block-level" />
    <label>Date of birth</label>
    <div class="row">
        <div class="span2"><?php years(1980, 2012, 'span2'); ?></div>
        <div class="span1"><?php months('span1'); ?></div>
        <div class="span1"><?php days('span1'); ?></div></div>  
    <label>Gender</label>
    <?php gender('input-block-level'); ?>
    <label>Category</label>
    <?php category('input-block-level'); ?>
    <label>Religion</label>
    <?php religion('input-block-level'); ?>
    <label>Guardian's name</label>
    <input type="text" name="guardian" value="<?php echo set_value('guardian'); ?>" class="input-block-level" />
</div>
<div class="span5"></div>
<div class="span2">
    <?php echo anchor('admission', 'Reset and Reload', 'class="btn btn-block"'); ?> 
    <!-- Button to trigger modal -->
    <a href="#submit_confirmation" role="button" class="btn btn-primary btn-block" data-toggle="modal">Submit</a>
</div><div class="span5"></div>
<!-- Modal -->
<div id="submit_confirmation" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure that the information you given or entered is correct? 
            If you are not sure then you can close this window and make the necessary changes.
        </p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <input type="submit" value="No, I am sure and submit" class="btn btn-primary" />
    </div>
</div>
</form>