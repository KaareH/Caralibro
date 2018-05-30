<main class="container">
    <div class="row bg-dark" style="height: 20rem;background: url(<?=$profile->cover_picture?>) no-repeat center center; background-size: cover;">
        <div class="col-md-2 align-self-end">
            <img src="<?=$profile->picture?>" alt="..." class="img-thumbnail m-3">
        </div>
        <div class="col-md-9 align-self-end">
            <h1 class="display-4 text-white border-xl"><?="$profile->firstname $profile->lastname"?></h1>
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
