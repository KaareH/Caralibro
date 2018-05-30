<?php echo form_open('api/friend/reject_friendship'); ?>
<input type="hidden" name="sender_id" value="<?php echo $id?>">
<button class="btn btn-warning" type="submit">Reject request</button>
</form>
