<div class="span6">
    <legend>Administrator accounts</legend>
    <?php echo anchor('admin/admin/add','Add another administrator','class="btn btn-block"'); ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Serial</th>
                <th>email</th>
                <th>Joined on</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($admins as $admin) {
                ?>
                <tr>
                    <td><?php echo $admin->id; ?></td>
                    <td><?php echo $admin->email; ?></td>
                    <td><?php echo $admin->joined_on; ?></td>
                </tr>
    <?php $i++;
} ?>
        </tbody>
    </table>
    <p>Total <span class="badge badge-info"><?php echo $i; ?></span> administrator account(s).</p>
</div>
<div class="span6">
    <legend>Edit your profile details</legend>
    <?php
    echo validation_errors();
    echo form_open('admin/admin/profile_settings');
    ?>
    <p>Current email address: <input type="text" name="c_email" value="<?php echo set_value('c_email'); ?>" class="input-block-level" /></p>
    <p>Current password: <input type="password" name="c_password" value="<?php echo set_value('c_password'); ?>" class="input-block-level" /></p>
    <p>New email address: <input type="text" name="n_email" value="<?php echo set_value('n_email'); ?>" class="input-block-level" /></p>
    <p>New password: <input type="text" name="n_password" value="<?php echo set_value('n_password'); ?>" class="input-block-level" /></p>
    <p>Retype new password: <input type="text" name="rn_password" value="<?php echo set_value('rn_password'); ?>" class="input-block-level" /></p>
    <input type="submit" value="Change" class="btn btn-primary" />
    <input type="reset" value="Reset" class="btn" />
</form>
</div>