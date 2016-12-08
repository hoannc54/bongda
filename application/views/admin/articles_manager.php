
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
                <th width="60%"><center>Bài viết</center></th>
        <th width="15%"><center>Ngày đăng</center></th>
        <th width="15%"><center>Đăng bởi</center></th>
        <th width="5%"><center>Sửa</center></th>
        <th width="5%"><center>Xoá</center></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list_articles as $article) { ?>
            <tr>
                <td>
                    <a href="<?php echo base_url('view/article/' . $article->alias); ?>" target="_blank">
                        <?php echo $article->title ?>
                    </a>
                </td>
                <td><center><?php echo $article->post_on ?></center></td>
                <td>
                    <center><?php echo $article->username ?></center>
                </td>
                <td>
                    <center>
                        <a class="btn btn-primary"
                        href="<?php echo base_url('admin/edit_article/' . $article->alias); ?>">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </center>
                </td>
                <td>
                    <center>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('admin/delete_article/' . $article->alias); ?>" onclick="return confirm('Are you sure?');">
                        <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </center>
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
