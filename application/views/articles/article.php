
<div class="col-md-9">

    <!-- hiển thị bài viết -->
    <?php if ($article == null) { ?>
        <div>Khong tim thay bai viet</div>
    <?php } else { ?>
        <h2><?php echo $article->title ?></h2>
        Posted by: <?php echo $article->username; ?> at <?php echo $article->post_on; ?>
        <br><br><br>
        <h4><?php echo $article->description ?></h4>
        <?php echo $article->content ?>
    <?php } ?>

    <br><br><br><br><br>
        
    <!-- bắt đầu phần comment -->
    <div class="col-md-12">
        <h4>Các bình luận:</h4>
        
        <!--truyền biến cho js-->
        <input type="hidden" id="url_for_read_comments" value="<?php echo base_url('comments/read_comments') . '/article_' . $article->article_id ?>">
        <input type="hidden" id="url_for_post_comment" value="<?php echo base_url('comments/post_comment') . '/article_' . $article->article_id ?>">

        <!--load js phục vụ cho comment-->
        <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/comments.js"></script>

        <!--Nội dung các comment-->
        <div id="list-comment"></div>

        <!--Nếu đã login, hiển thị form comment-->
        <?php if (check_login() == true) { ?>
            <form id="form" method="post" class="form-inline" role="form">
                <textarea name="comment" id="text-comment"></textarea>
            </form>
            <button id="comment-button" class="btn btn-success">Comments</button>
        <?php } ?>

        <script>
            var editor = CKEDITOR.replace('text-comment', {
                toolbarGroups: [
                        { name: 'basicstyles'},
                ]
            });
        </script>
    </div>
    <div class="col-md-6"></div>

</div>
