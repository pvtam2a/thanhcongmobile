<!--load file head-->
<?php  $this->load->view('admin/admin/head', $this->data)?>
<div class="line"></div>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper">
    <div class="widget">

        <div class="title">
            <h6>Thêm mới quản trị viên</h6>
        </div>
        <form class="form" id="form" action="product/add.html" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="formRow">
                    <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" /></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>