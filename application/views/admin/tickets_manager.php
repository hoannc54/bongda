
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
               
        <th width="30%"><center>Ten ve</center></th>
        <th width="50%"><center>Title</center></th>
        <th width="10%"><center>Giá</center></th>
        <th width="5%"><center>Sửa</center></th>
        <th width="5%"><center>Xoá</center></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list_tickets as $ticket) { ?>
            <tr>
                <td>
                    <?php echo $ticket['name'] ?></a>
                </td>
                <td><center><?php echo $ticket['title']?></center></td>
                <td><center><?php echo $ticket['price']?></center></td>
                
                
                <td>
                    <center>
                        <a class="btn btn-primary"
                        href="<?php echo base_url()."admin/edit_ticket/".$ticket['id'] ;?>">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </center>
                </td>
                <td>
                    <center>
                        <a class="btn btn-danger"
                            href="<?php echo base_url()."admin/delete_ticket/".$ticket['id']; ?>" onclick="return confirm('Are you sure?');">
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
