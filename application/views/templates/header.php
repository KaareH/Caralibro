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
        margin-bottom: 60px; /* Margin bottom by footer height */
    }
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px; /* Set the fixed height of the footer here */
        line-height: 60px; /* Vertically center the text there */
        background-color: #f5f5f5;
    }


    /* Custom page CSS
    -------------------------------------------------- */
    /* Not required for template or sticky footer method. */

    .container {
        width: auto;
        max-width: 680px;
        padding: 0 15px;
    }

    </style>

    <title><?php echo $title?></title>
</head>

<body>

    <nav class="navbar navbar-fixed-top navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="/">Caralibro</a>
        <div class="container">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <form class="form-inline mt-2 mt-md-0 mr-auto">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        <ul class="navbar-nav ml-auto">
            <?php if($this->user_model->is_logged_in()) {?>
          <li class="nav-item">
            <a class="nav-link" href="/user/<?php echo $this->user_model->get_this_user()->id;?>">Your profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/friends">Friends</a>
          </li>
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
    <main class="container">
