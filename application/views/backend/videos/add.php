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
                Quản lí Videos
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-offset-3 col-xs-6">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm mới Video</h3>
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
            <label>Tên video</label>
            <input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" >
        </div>

        <!-- Mô tả -->
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" class="form-control"><?php echo set_value('description'); ?></textarea>
        </div>

        <!-- Nội dung -->

        <div class="form-group">
            <label>Video</label>
            <input type="file" accept="video/*" name="video" class="form-control" />
            <!--
            <input type="hidden" name="MAX_FILE_SIZE" value="" />
            -->
        </div>

        <!-- Post button -->
        <div style="margin-top:10px" class="form-group">
            <div class="col-sm-12 controls">
                <input type="submit" name="submit" value="Post" class="btn btn-primary" />
            </div>
        </div>
    </form>

</div>

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