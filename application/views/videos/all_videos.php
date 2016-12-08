
<div class="col-md-9">

    <!-- hiển thị các bài viết -->
    <?php
    $mount_videos = sizeof($list_videos);
    for ($i = 0; $i < ($mount_videos + 2) / 3; $i++) { ?>
        <div class="row">
            <?php for ($j = 0; $j < 3; $j++) {
                if (isset($list_videos[$i * 3 + $j])) { ?>
                    <div class="col-md-4">
                        <div class="row">
                            <h3><?php echo $list_videos[$i * 3 + $j]->title; ?></h3>
                        </div>
                        <div class="row">
                            <img src="<?php echo base_url($list_videos[$i * 3 + $j]->image); ?>" class="img-thumbnail">
                        </div>
                        <div class="row">
                            <?php echo $list_videos[$i * 3 + $j]->description; ?>
                            <br>
                            <a href="<?php echo base_url('view/video/' . $list_videos[$i * 3 + $j]->alias); ?>" class="btn btn-info">Xem chi tiết</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-4"></div>
                <?php }
            } ?>
        </div>
    <?php } ?>

    <!-- phân trang -->
    <div class="row">
        <div class="pull-right">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>

</div>
