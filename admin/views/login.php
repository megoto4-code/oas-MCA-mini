<?php echo form_open('admin/login'); ?>
<legend>Login as Administrator</legend>
<?php echo validation_errors(); ?>
<lebel>Email address</lebel>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" class="input-block-level" />
<lebel>Password</lebel>
<input type="password" name="password" value="" class="input-block-level" />
<input type="submit" value="Login" class="btn btn-primary" />&nbsp;
<?php echo anchor('login','Reload','class="btn"') ?>
</form>