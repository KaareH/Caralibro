<div class="card mt-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-2">
                <img src="http://www.teatro.it/old/2016-11/nobody_m.original.jpg" alt="..." class="img-thumbnail">
            </div>
            <div class="col-md-10">
                <h5 class="card-title"><? echo anchor("user/$owner->id", "$owner->firstname $owner->lastname")?></h5>
                <p class="card-meta">Posted: <?php echo $timestamp?></p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text"><?php echo $body?></p>
    </div>
</div>
