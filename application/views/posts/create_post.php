<div class="card mt-3">
    <div class="card-body">
        <?php echo form_open('api/post/create', 'class="form"'); ?>

        <input type="hidden" value="<?php echo $location?>" name="location">
        <textarea class="form-control" name="body" aria-label="With textarea" placeholder="What's on your mind?" required autofocus></textarea>
        <br>
        <button class="btn btn-primary float-right" type="submit">Post</button>

        </form>
    </div>
</div>
