<?php echo form_open('api/friend/accept_friendship'); ?>
<input type="hidden" name="sender_id" value="<?php echo $id?>">
<button class="btn btn-lg btn-primary btn-block" type="submit">Accept request</button>
</form>
