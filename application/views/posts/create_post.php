<div class="row border bg-light mt-3">
    <div class="col-md-2 border">
        <img src="http://www.teatro.it/old/2016-11/nobody_m.original.jpg" alt="..." class="img-thumbnail m-1">
    </div>
    <div class="col-md-10 border">
        <?php echo form_open('api/post/create', 'class="form"'); ?>

        <input type="hidden" value="<?php echo $location?>" name="location">
        <textarea class="form-control" name="body" aria-label="With textarea" placeholder="What's on your mind?" required autofocus></textarea>
        <br>
        <button class="btn btn-primary btn-block" type="submit">Post</button>

        </form>
    </div>
</div>
