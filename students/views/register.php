<div class="span3">
    <legend>Forgot password?</legend>
    <p>If you have forgotten your password then you can recover it with your registered email address.</p>
    <?php echo anchor('login/forgot','Recover my password','class="btn btn-large btn-block"'); ?>
</div>
<div class="span6">
    <?php echo form_open('login/register'); ?>
    <fieldset>
        <legend>Create an account</legend>
        <?php echo validation_errors(); ?>
        <label>Email</label>
        <input type="text" class="input-block-level" name="email" placeholder="Give your valid email" value="<?php echo set_value('email') ?>" />
        <label>Password</label>
        <input type="password" class="input-block-level" name="password" placeholder="Choose your password" />
        <label>Re-enter Password</label>
        <input type="password" class="input-block-level" name="rpassword" placeholder="Retype your choosen password" />
        <input type="submit" class="btn btn-primary" value="Create" />
    </fieldset>
</form>
</div>
<div class="span3">
    <legend>Already registered?</legend>
    <p>If you already have an account or you have created before, then you can log in.</p>
    <?php echo anchor('login','Take me to the login','class="btn btn-large btn-block"'); ?>
</div>