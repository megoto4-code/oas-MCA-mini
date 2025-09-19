<div class="span7">
    <legend>Notice</legend>
    <p>
        <?php /* Displays the admisson notices given
         * by the administrator for the students and 
         * site visitos.
         */
        echo $admission_notices; 
        ?>
    </p>
    <?php echo anchor('login/register', 'Create an account', 'class="btn btn-large btn-block"'); ?>
</div>
<div class="span5">
    <?php echo form_open('login'); ?>
    <fieldset>
        <legend>Login</legend>
        <?php echo validation_errors(); ?>
        <label>Email</label>
        <input type="text" class="input-block-level" name="email" placeholder="Please enter your email" value="<?php echo set_value('email') ?>" />
        <label>Password</label>
        <input type="password" class="input-block-level" name="password" placeholder="Please enter your password" />
        <input type="submit" class="btn btn-primary" value="Login" />
        <?php echo anchor('login/forgot', 'Forgot password', 'class="btn"'); ?>        
    </fieldset>
</form>
<?php
/* If any one creates an account, this condition
 * will be executed.
 */
if (isset($_SESSION['account_creation'])) {
    echo '<p class="label label-info">' . $_SESSION['account_creation'] . '</p>';
    unset($_SESSION['account_creation']);
}
?>
</div>