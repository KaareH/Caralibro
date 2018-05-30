<?php echo form_open('api/friend/request_friendship'); ?>
<input type="hidden" name="receiver_id" value="<?php echo $id?>">
<button class="btn btn-primary" type="submit">Request friendship</button>
</form>
