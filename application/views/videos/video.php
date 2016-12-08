
<div class="col-md-9">

    <!-- hiển thị bài viết -->
    <?php if ($video == null) { ?>
        <div>Khong tim thay bai viet</div>
    <?php } else { ?>
        <h2><?php echo $video->title ?></h2>
        Posted by: <?php echo $video->username; ?> at <?php echo $video->post_on; ?>
        <h4><?php echo $video->description ?></h4>
        <div class="row">
            <div class="embed-responsive embed-responsive-4by3">
                <video controls preload="auto">
                    <source src="<?php echo base_url($video->link) ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    <?php } ?>
        
    <!-- bắt đầu phần comment -->
    <!--truyền biến cho js-->
    <input type="hidden" id="url_for_read_comments" value="<?php echo base_url('comments/read_comments') . '/video_' . $video->video_id ?>">
    <input type="hidden" id="url_for_post_comment" value="<?php echo base_url('comments/post_comment') . '/video_' . $video->video_id ?>">

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
