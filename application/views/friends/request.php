<div class="row border grey bg-light mt-3">
    <div class="col-md-2">
        <img src="http://www.teatro.it/old/2016-11/nobody_m.original.jpg" alt="..." class="img-thumbnail m-1">
    </div>
    <div class="col-md-10">
        <p><? echo anchor("user/$id", "$firstname $lastname")?></p>
        <p><?php echo "Request received $timestamp"?></p>

        <?php $this->load->view('friends/accept_button', array('id' => $id))?>
        <?php $this->load->view('friends/reject_button', array('id' => $id))?>
    </div>
</div>
