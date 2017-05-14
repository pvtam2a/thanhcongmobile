<!--load file head-->
<?php  $this->load->view('admin/admin/head', $this->data)?>
<div class="line"></div>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper">
    <div class="widget">

        <div class="title">
            <h6>Cập nhật thông tin quản trị viên</h6>
        </div>
        <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="formRow">
                    <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="name" id="param_name" _autocheck="true" value="<?php echo $info->name?>" type="text" /></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('name')?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft" for="param_username">Username:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="username" id="param_username" _autocheck="true" value="<?php echo $info->username ?>" type="text" /></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('username')?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <p>
                        <a href="" title="" class="smallButton" style="margin: 5px;"><img src="<?php echo public_url('admin') ?>/images/icons/color/star.png" alt=""></a>
                        <strong>Chú ý: </strong>Nếu cập nhật mật khẩu thì mới nhập giá trị
                    </p>
                    <label class="formLeft" for="param_username">Password:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo">
                            <input name="password" id="param_password" _autocheck="true" value="" type="password" />
                        </span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('password')?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft" for="param_username">Nhập lại mật khẩu:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="re_password" id="param_re_password" _autocheck="true" value="" type="password" /></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('re_password')?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formSubmit">
                    <input type="submit" value="Cập Nhật" class="redB" />
                    <!--<input type="reset" value="Hủy bỏ" class="basic" />-->
                </div>
            </fieldset>
        </form>
    </div>
</div>