<div class="card mt-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="square-image">
                    <img src="<?php echo !empty($picture) ? $picture : '/resources/images/no_picture.png';?>" alt="..." class="img-thumbnail">
                </div>
            </div>
            <div class="col-md-10">
                <p><? echo anchor("user/$id", "$firstname $lastname")?></p>

                <p><?php echo "Request received $timestamp"?></p>

                <div class="row">
                    <div class="col-md-auto">
                <?php $this->load->view('friends/accept_button', array('id' => $id))?>
            </div>
            <div class="col-md-auto">
                <?php $this->load->view('friends/reject_button', array('id' => $id))?>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
