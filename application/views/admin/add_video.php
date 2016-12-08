
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/ckfinder/ckfinder.js"></script>

<div class="col-md-9">

    <!-- Hiển thị nếu thành công -->
    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    }
    ?>

    <!-- Hiển thị nếu nhập dữ liệu lỗi -->
<?php echo validation_errors(); ?>

    <!-- form nhập dữ liệu -->
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

<script type="text/javascript">
    var editor = CKEDITOR.replace('editor');
    CKFinder.setupCKEditor(editor, '<?php echo base_url() ?>assets/ckfinder');
</script>
