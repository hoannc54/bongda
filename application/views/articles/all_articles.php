
<div class="col-md-9">
    <div class="jumbotron">
        <h2>Chào mừng các bạn đã đến với bảng tin cập nhật</h2>
        <p>Trang web được xây dựng với mục đích chính là đưa đến cái nhìn tổng quan và cập nhật nhât cho tất cả những người hâm mộ môn thể thao vua trên toàn thế giới.</p>
        <center><img src="<?php echo base_url('assets/images/logo3.jpg') ?>" width="600" height="200"></center>
    </div>

    <!-- hiển thị các bài viết -->
    <?php
    $mount_articles = sizeof($list_articles);
    for ($i = 0; $i < ($mount_articles + 2) / 3; $i++) { ?>
        <div class="row">
            <?php for ($j = 0; $j < 3; $j++) {
                if (isset($list_articles[$i * 3 + $j])) { ?>
                    <div class="col-md-4">
                        <div class="main_inner">
                            <div class="row">
                                <h3><?php echo $list_articles[$i * 3 + $j]->title; ?></h3>
                            </div>
                            <div class="row">
                                <img src="<?php echo $list_articles[$i * 3 + $j]->image ?>" class="img-thumbnail">
                            </div>
                            <div class="row">
                                <?php echo $list_articles[$i * 3 + $j]->description; ?>
                                <br>
                                <a href="<?php echo base_url('view/article/' . $list_articles[$i * 3 + $j]->alias); ?>" class="btn btn-info">Xem chi tiết</a>
                            </div>
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
