
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
            <label>Tiêu đề: </label>
            <input type="text" name="title" class="form-control" value="<?php echo htmlentities(set_value('title')); ?>" >
        </div>

        <!-- Phân loại -->
        <div class="form-group">
            <label>Phân loại</label>
            <select name="category" class="form-control">
                <?php
                foreach ($dropdownlist as $key => $value) {
                    if ($key == set_value('category')) {
                        echo '<option value="' . $key . '" selected="selected">' . $value . '</option>';
                    } else {
                        echo '<option value="' . $key . '">' . $value . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <!-- Mô tả -->
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" class="form-control"><?php echo set_value('description'); ?></textarea>
        </div>

        <!-- Nội dung -->
        <div class="form-group">
            <label>Nội dung</label>
            <textarea id="editor" name="content" class="form-control"><?php echo set_value('content'); ?></textarea>
        </div>

        <!-- Save button -->
        <div class="row" style="margin-top:10px" class="form-group">
            <div class="col-sm-10"></div>
            <div class="col-sm-1 controls">
                <input type="submit" name="submit" value="Post" class="btn btn-primary" />
            </div>
            <div class="col-sm-1"></div>
        </div>
    </form>

</div>

<script type="text/javascript">
    var editor = CKEDITOR.replace('editor');
    CKFinder.setupCKEditor(editor, '<?php echo base_url() ?>assets/ckfinder');
</script>
