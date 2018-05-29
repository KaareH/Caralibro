<div class="row border bg-light mt-3">
    <div class="col-md-2 border">
        <img src="http://www.teatro.it/old/2016-11/nobody_m.original.jpg" alt="..." class="img-thumbnail m-1">
    </div>
    <div class="col-md-10 border">
        <p><? echo anchor("user/$owner->id", "$owner->firstname $owner->lastname")?></p>
        <p><?php echo $body?></p>
        <p class="meta"><?php echo $timestamp?></p>
    </div>
</div>
