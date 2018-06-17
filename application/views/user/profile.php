<main class="container">
    <div class="row bg-dark" style="height: 20rem;background: url(<?=$profile->cover_picture?>) no-repeat center center; background-size: cover;">
        <div class="col-md-2 align-self-end">
            <div class="square-image my-3">
                <img src="<?=$profile->picture?>" alt="..." class="img-thumbnail">
            </div>
        </div>
        <div class="col-md-auto align-self-end">
            <h1 class="display-4 text-white border-xl" style="text-shadow: 0 0 0.3rem #111"><?="$profile->firstname $profile->lastname"?></h1>
        </div>
        <div class="col-md-auto align-self-end pull-right ml-auto">
            <?php foreach ($profile->buttons as $button) {?>
                <div class="float-right my-3 ml-3">
                    <?=$button?>
                </div>
            <?php }?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Biography</h4>
                </div>
                <div class="card-body">
                    <p><?=$profile->biography?></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php
            if($this->user_model->is_logged_in()) {
                $this->load->view('posts/create_post.php', array('location' => $profile->id));
            };
            ?>
            <div class="posts-list">
            </div>
            <?php $this->load->view('posts/post');?>
        </div>
    </div>
</main>
