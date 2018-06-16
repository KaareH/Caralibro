    <footer class="footer">
      <div class="container">
        <span class="text-muted">Caralibro</span>
      </div>
    </footer>
    <script src="/resources/libraries/jquery/jquery.min.js"></script>
    <script src="/resources/libraries/bootstrap/js/bootstrap.min.js"></script>
    <script src="/resources/libraries/underscore/underscore-min.js"></script>
    <script src="/resources/libraries/backbone.js/backbone-min.js"></script>
    <script src="/resources/libraries/backbone.js/backbone-relational.js"></script>


    <script type="text/template" class="user-view-template">
        <p>TEST: <%= firstname %></p>
    </script>


    <script src="/resources/js/app.js"></script>
    <script src="/resources/js/user.js"></script>
    <script src="/resources/js/post.js"></script>
    <script>
        App.posts = new App.PostCollection(<?php echo json_encode($this->feed_model->get_feed(1));?>, { data: $.param({ feed: true}) });
        App.postsView = new App.PostsView(App.posts);
        App.postsView.render();
    </script>
  </body>
</html>
