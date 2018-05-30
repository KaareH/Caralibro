<?php echo form_open('api/friend/remove_friendship'); ?>
<input type="hidden" name="friend_id" value="<?php echo $id?>">
<button class="btn btn-danger" type="submit">Remove friend</button>
</form>
