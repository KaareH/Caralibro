<main class="container">
    <div class="row shadow-sm bg-white" style="height: 20rem;background: url(http://littleguyintheeye.com/wp-content/uploads/2014/08/nature-3.jpg) no-repeat center center fixed;">
        <div class="col-md-2 align-self-end">
            <img src="http://www.teatro.it/old/2016-11/nobody_m.original.jpg" alt="..." class="img-thumbnail m-3">
        </div>
        <div class="col-md-9 align-self-end">
            <h1 class="display-4 text-white border-xl"><?php echo "$profile->firstname $profile->lastname"?></h1>
        </div>
    </div>
    <div class="row">
    <div class="col-md-4">
        <div class="card mt-3">
            <div class="card-header">
                <h4>Biography</h4>
            </div>
            <div class="card-body">
                <p><?php echo $profile->biography?></p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
