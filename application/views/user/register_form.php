<?php echo validation_errors(); ?>

<?php echo form_open('register'); ?>
<h1 class="h3 mb-3 font-weight-normal">Create account</h1>

<input type="text" name="firstname" placeholder="Firstname" value="<?php echo set_value('firstname'); ?>" class="form-control">

<input type="text" name="lastname" placeholder="Lastname" value="<?php echo set_value('lastname'); ?>" class="form-control">

<input type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" class="form-control">

<input type="password" name="passconf" placeholder="Password confirmation" value="<?php echo set_value('passconf'); ?>" class="form-control">

<input type="text" name="email" placeholder="Email address" value="<?php echo set_value('email'); ?>" class="form-control">

<br>
<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
</form>

<p><?php echo anchor('login', 'Or login')?></p>
