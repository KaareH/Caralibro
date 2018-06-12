<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/resources/libraries/bootstrap/css/bootstrap.min.css">

    <style>

    </style>

    <title>Test</title>
</head>
<body>
    <div class="container">
        <input type="text" class="post_id-input">
        <button class="btn btn-primary get-post">Get post</button>
        <div class="posts-list">
        </div>
    </div>

    <script type="text/template" class="posts-list-template">
    	<td><span class="post-author"><%= owner %></span></td>
    	<td><span class="post-body"><%= body %></span></td>
    	<td><span class="post-timestamp"><%= timestamp %></span></td>
    </script>

    <script src="/resources/libraries/jquery/jquery.min.js"></script>
    <script src="/resources/libraries/bootstrap/js/bootstrap.min.js"></script>
    <script src="/resources/libraries/underscore/underscore-min.js"></script>
    <script src="/resources/libraries/backbone.js/backbone-min.js"></script>
    <script src="/resources/javascript/post.js"></script>
</body>
</html>
