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

    <script src="/resources/js/app.js"></script>
    <script src="/resources/js/user.js"></script>
    <script src="/resources/js/post.js"></script>

    <?php
    if(isset($scripts)) {
        foreach ($scripts as $script) {
            echo $script;
        }
    }
    else {
        echo '<!--No additional scripts included.-->';
    }
    ?>
  </body>
</html>
