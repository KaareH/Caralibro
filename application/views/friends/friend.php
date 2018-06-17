<div class="card mt-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <img src="<?php echo !empty($picture) ? $picture : '/resources/images/no_picture.png';?>" alt="..." class="img-thumbnail m-1">
            </div>
            <div class="col-md-10">
                <p><? echo anchor("user/$id", "$firstname $lastname")?></p>
                <p><?php echo "Friends since $timestamp"?></p>

                <?php $this->load->view('friends/remove_button', array('id' => $id))?>
            </div>
        </div>
    </div>
</div>
