<div class="row border grey bg-light mt-3">
    <div class="col-md-2">
        <img src="http://www.teatro.it/old/2016-11/nobody_m.original.jpg" alt="..." class="img-thumbnail m-1">
    </div>
    <div class="col-md-10">
        <p><? echo anchor("user/$id", "$firstname $lastname")?></p>
        <p><?php echo "Request received $timestamp"?></p>

        <?php echo form_open('api/friend/accept_friendship'); ?>
        <input type="hidden" name="sender_id" value="<?php echo $id?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Accept request</button>
        </form>
        <?php echo form_open('api/friend/reject_friendship'); ?>
        <input type="hidden" name="sender_id" value="<?php echo $id?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reject request</button>
        </form>
    </div>
</div>
