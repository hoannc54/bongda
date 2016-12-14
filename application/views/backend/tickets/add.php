<?php $this->load->view('backend/templates/header')?>
    <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('backend/templates/leftside')?>
    <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>assets/ckfinder/ckfinder.js"></script>
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
                <div class="col-xs-offset-3 col-xs-6">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm mới vé</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <!-- Hiển thị nếu thành công -->
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>

                        <!-- Hiển thị nếu nhập dữ liệu lỗi -->
                        <?php echo validation_errors(); ?>
                        <form enctype="multipart/form-data" action="" method="post" autocomplete="off">
                            <!-- Tiêu đề -->
                            <div class="form-group">
                                <label>Ten Ve: </label>

                                <input type="text" name="name" class="form-control" value="<?php echo set_value('name');?>" >
                            </div>
                            <div class="form-group">
                                <label>Name_URL: </label>
                                <input type="text" name="name_url" class="form-control" value="<?php echo set_value('name_url');?>" >
                            </div>
                            <div class="form-group">
                                <label>Image </label>
                                <input type="text" name="img" class="form-control" value="<?php echo set_value('img');?>" >
                            </div>
                            <div class="form-group">
                                <label>Title </label>
                                <input type="text" name="title" class="form-control" value="<?php echo set_value('title');?>" >
                            </div>

                            <div class="form-group">
                                <label>Content: </label>
                                <input type="text" name="content" class="form-control" value="<?php echo set_value('content');?>" >
                            </div>
                            <div class="form-group">
                                <label>Price: </label>
                                <input type="text" name="price" class="form-control" value="<?php echo set_value('price');?>" >
                            </div>
                            <!-- Save button -->

                            <div class="row" style="margin-top:10px" class="form-group">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-1 controls">

                                    <input type="submit" name="submit" value="Save" class="btn btn-primary" />
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                        </form>

                    </div><!-- /.box -->
                </div>
            </div>
        </section>
    </div><!-- /.content-wrapper -->
    <script type="text/javascript">
        var editor = CKEDITOR.replace('editor');
        CKFinder.setupCKEditor(editor, '<?php echo base_url() ?>assets/ckfinder');
    </script>
<?php $this->load->view('backend/templates/footer')?>