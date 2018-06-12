<?php echo validation_errors(); ?>

<?php echo form_open('login'); ?>
<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

<input type="text" name="email" class="form-control" placeholder="Email address" required autofocus value="<?php echo set_value('email'); ?>">

<input type="password" name="password" class="form-control mt-3" placeholder="Password" required value="<?php echo set_value('password'); ?>">
<br>
 <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

</form>

<p><?php echo anchor('register', 'Or signup')?></p>
