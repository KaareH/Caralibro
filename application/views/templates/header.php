<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <style>
    /* Sticky footer styles
    -------------------------------------------------- */
    html {
        position: relative;
        min-height: 100%;
    }
    body {
        margin-bottom: 80px; /* Margin bottom by footer height */
    }
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px; /* Set the fixed height of the footer here */
        line-height: 60px; /* Vertically center the text there */
        background-color: #f5f5f5;
    }
    </style>

    <title><?php echo $title?></title>
</head>

<body>
    <nav class="navbar navbar-fixed-top navbar-expand-md navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand col-md-2" href="/">Caralibro</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <form class="form-inline mt-2 mt-md-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        <ul class="navbar-nav ml-auto">
            <?php if($this->user_model->is_logged_in()) {
                $this_user = $this->user_model->get_this_user();
                ?>
          <li class="nav-item">
            <a class="nav-link" href="/user/<?php echo $this_user->id;?>">Your profile</a>
          </li>
          <?php $request_count = count($this->friend_model->get_request_list($this_user->id));
          if($request_count > 0) {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="/friends">Friends<span class="badge badge-pill badge-danger"><?=$request_count?></span></a>
          </li>
      <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="/friends">Friends</a>
          </li>
      <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
      <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link disabled" href="/login">Login</a>
          </li>
      <?php } ?>
        </ul>
      </div>
  </div>
    </nav>
