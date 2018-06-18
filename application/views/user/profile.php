<main class="container">
    <div class="row bg-dark" style="height: 20rem;background: url(<?=$profile->cover_picture?>) no-repeat center center; background-size: cover;">
        <div class="col-md-2 align-self-end">
            <div class="square-image my-3 edit-profile-picture">
                <img src="<?=$profile->picture?>" alt="..." class="img-thumbnail">
                <?php if($this->user_model->is_logged_in() && $this->user_model->get_this_user()->id == $profile->id) {?>
                <div class="middle">
                    <button class="btn btn-primary btn-update-profile-picture">Change</button>
                 </div>
                <?php }?>
            </div>
        </div>

        <script type="text/template" class="change-profile-picture-template">
            <div class="modal fade" id="changePictureModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Update profile picture</h5>
                  </div>
                  <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label>Please use one of the following formats: png, jpeg or gif.</label>
                            <input type="file" class="form-control-file" onchange="App.changeProfilePicture.model.readFile(this)">
                          </div>
                        </form>
                  </div>
                  <div class="m-3 upload-errors">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="close-button btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-upload-picture">Upload</button>
                  </div>
                </div>
              </div>
            </div>
        </script>

        <script type="text/template" class="change-profile-picture-errors-template">
            <div class="alert alert-warning" role="alert">
                <%= errors %>
            </div>
        </script>

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
