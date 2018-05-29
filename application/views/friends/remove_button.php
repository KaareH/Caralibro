<?php echo form_open('api/friend/remove_friendship'); ?>
<input type="hidden" name="friend_id" value="<?php echo $id?>">
<button class="btn btn-lg btn-primary btn-block" type="submit">Remove friend</button>
</form>
