
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
               
        <th width="40%"><center>Tên thành viên</center></th>
        <th width="50%"><center>Email</center></th>
        <th width="5%"><center>Sửa</center></th>
        <th width="5%"><center>Xoá</center></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list_users as $user) { ?>
            <tr>
                <td>
                        <?php echo $user['username'] ;?>
                </td>
                <td><center><?php echo $user['email'];?></center></td>
                <td><center><?php echo $user['password'];?></center></td>
                
                <td>
                    <center>
                        <a class="btn btn-primary"
                        href="<?php echo base_url('admin/edit_user/' . $user['user_id']); ?>">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </center>
                </td>
                <td>
                    <center>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('admin/delete_user/' . $user['user_id']); ?>" onclick="return confirm('Are you sure?');">
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
