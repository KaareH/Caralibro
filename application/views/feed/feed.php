<main class="container">
    <div class="col-md-8 mx-auto">
        <?php $this->load->view('posts/create_post.php');?>
        <div class="posts-list">
        </div>
    </div>
</main>

<?php $this->load->view('posts/post');?>
<script src="/resources/js/post.js"></script>
<script>
    var posts = new Posts([], { data: $.param({ feed: true}) });
    var postsView = new PostsView(posts);
</script>
