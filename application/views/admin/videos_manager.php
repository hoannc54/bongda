
<div class="col-md-9" style="padding-top:20px;">

    <!-- Hiển thị nếu thành công -->
    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    }
    ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th><center>Clip</center></th>
                <th><center>Ngày đăng</center></th>
                <th><center>Đăng bởi</center></th>
                <th><center>Xoá</center></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_videos as $video) { ?>
                <tr>
                    <td>
                        <a href="<?php echo base_url('view/video').'/'.$video->alias; ?>" target="_blank">
                            <?php echo $video->title; ?>
                        </a>
                    </td>
                    <td><center><?php echo $video->post_on ?></center></td>
            <td><center><?php echo $video->username ?></center></td>
            <td>
            <center><a class="btn btn-danger"
                       href="<?php echo base_url('admin/delete_article/') . '/' . $video->alias ?>" onclick="return confirm('Are you sure?');">
                    <span class="glyphicon glyphicon-trash"></span>
                </a></center>
            </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <!-- phân trang -->
    <div class="row">
        <div class="pull-right">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
    
</div>
