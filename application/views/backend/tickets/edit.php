<?php $this->load->view('backend/templates/header')?>
    <!-- Left side column. contains the logo and sidebar -->
<?php if(check_admin()):?>
    <?php $this->load->view('backend/templates/leftside')?>
<?php endif;?>
<?php if(check_TicketManager()):?>
    <?php $this->load->view('backend/templates/leftside2')?>
<?php endif;?>
<?php if(check_ArticleManager()):?>
    <?php $this->load->view('backend/templates/leftside3')?>
<?php endif;?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lí vé
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-offset-1 col-xs-10">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chỉnh sửa thông tin vé</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <!-- Hiển thị nếu nhập dữ liệu lỗi -->
                        <?php echo validation_errors(); ?>
                        <form enctype="multipart/form-data" action="" method="post" autocomplete="off">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Tên vé: </label>

                                    <input type="text" name="name" class="form-control" value="<?php if(isset($ticket['name'])) echo $ticket['name']; ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Name_URL: </label>
                                    <input type="text" name="name_url" class="form-control" value="<?php if(isset($ticket['name_url'])) echo $ticket['name_url'] ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Image: </label>
                                    <input type="text" name="img" class="form-control" value="<?php if(isset($ticket['img'])) echo $ticket['img']?>" >
                                </div>

                                <div class="form-group">
                                    <label>Title: </label>
                                    <input type="text" name="title" class="form-control" value="<?php if(isset($ticket['title'])) echo $ticket['title'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Content: </label>
                                    <input type="text" name="contents" class="form-control" value="<?php if(isset($ticket['contents'])) echo $ticket['contents'];?>" >
                                </div>

                                <!-- Save button -->


                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <a href="<?php echo base_url('admin/tickets_manager')?>" class="btn btn-warning">
                                    Quay lại
                                </a>
                                <button type="submit" class="btn btn-primary pull-right">Cập nhật</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
    </div><!-- /.content-wrapper -->
<?php $this->load->view('backend/templates/footer')?>