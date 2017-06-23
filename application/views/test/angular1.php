<!DOCTYPE html>
<html lang="en">
<head>
    <!--    <meta charset="UTF-8">-->
    <title>Angular Tutorial</title>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/common_angular.js"></script>
</head>
<body>
    <div ng-app="">
        <input type="text" ng-model="name" placeholder="Nhập vào Tên">
        <br>
        <label>Xin Chào: {{name}}</label>
    </div>
</body>
</html>