<div class="span6 offset3">
    <legend>
        Recover your password
    </legend>
    <?php
    echo validation_errors();
    echo form_open('login/forgot');
    ?> 
    <p>Give your registered email <input type="text" name="email" value="" class="input-block-level" /></p>
    <input type="submit" value="Submit" class="btn btn-primary" />
    <?php
    if (isset($_SESSION['p_send'])) {
        if ($_SESSION['p_send'] == TRUE) {
            echo '<span class="label label-info">Password is send to your email.</span>';
        } elseif ($_SESSION['p_send'] == FALSE) {
            echo '<span class="label label-important">Password could not been send.</span>';
        }
        unset($_SESSION['p_send']);
    }
    ?>
</form>
</div>