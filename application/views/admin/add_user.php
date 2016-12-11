
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
    
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/ckfinder/ckfinder.js"></script>

<div class="col-md-9">

    <!-- Hiển thị nếu nhập dữ liệu lỗi -->
    <?php echo validation_errors(); ?>
    <!-- form nhập dữ liệu -->
    <form enctype="multipart/form-data" action="" method="post" autocomplete="off">
        <!-- Tiêu đề -->
        <div class="form-group">
            <label>UserName: </label>

            <input type="text" name="username" class="form-control" value="<?php echo set_value('username');?>" >
        </div>
        <div class="form-group">
            <label>Email: </label>
            <input type="text" name="email" class="form-control" value="<?php echo set_value('email');?>" >
        </div>
        <div class="form-group">
            <label>Password: </label>
            <input type="text" name="password" class="form-control" value="<?php echo set_value('password');?>" >
        </div>
        
        <div class="form-group">
            <label>Phan loai: </label>
            <input type="text" name="user_level" class="form-control" value="<?php echo set_value('user_level');?>" >
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

</div>

<script type="text/javascript">
    var editor = CKEDITOR.replace('editor');
    CKFinder.setupCKEditor(editor, '<?php echo base_url() ?>assets/ckfinder');
</script>

