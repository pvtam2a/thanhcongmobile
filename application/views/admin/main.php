<html>
    <head>
        <?php $this->load->view('admin/head') ?>
    </head>
    <body>
        <!-- Left side content -->
        <div id="left_content">
            <?php $this->load->view('admin/left') ?>
        </div>

        <!-- Right side -->
        <div id="rightSide">
            <?php $this->load->view('admin/header') ?>

            <!--content-->
            <?php $this->load->view($temp) ?>
            <!--end content-->
            <?php $this->load->view('admin/footer') ?>
        </div>
        <div class="clear"></div>
    </body>
</html>