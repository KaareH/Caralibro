<?php echo validation_errors(); ?>

<?php echo form_open('register'); ?>

<h5>Firstname</h5>
<input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" size="50" />

<h5>Lastname</h5>
<input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" size="50" />

<h5>Password</h5>
<input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>
