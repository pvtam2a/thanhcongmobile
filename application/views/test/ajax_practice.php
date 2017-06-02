<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ajax</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo public_url('bs')?> /css/bootstrap.min.css">
    <script src="<?php echo public_url('bs')?> /jquery/jquery.min.js"></script>
    <script src="<?php echo public_url('bs')?> /js/bootstrap.min.js"></script>
    <script src="<?php echo public_url('bs')?> /js/common.js"></script>
</head>
<body>
    <div id="result">
        Nội dung ajax sẽ được load ở đây
    </div>
    <p>
        <button id="btn1" type="button" onclick="load_ajax()" class="btn btn-success">Load Ajax</button>
    </p>
</body>
</html>