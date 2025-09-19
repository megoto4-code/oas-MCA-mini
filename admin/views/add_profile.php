<div class="span6 offset3">
    <legend>Create new Administrator</legend>
    <?php 
    if(isset($_SESSION['msg'])) {
        echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo $_SESSION['msg'];
        echo '</div>';
        unset($_SESSION['msg']);
    }
    echo validation_errors();
    echo form_open('admin/admin/add');
    ?>
    <p>New Admin email: <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="input-block-level" /></p>
    <p>New Admin password: <input type="password" name="password" value="" class="input-block-level" /></p>
    <p>New Admin password: <input type="password" name="rpassword" value="" class="input-block-level" /></p>
    <input type="submit" value="Create" class="btn"/>
</form>
</div>