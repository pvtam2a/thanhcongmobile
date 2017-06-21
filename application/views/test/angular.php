<!DOCTYPE html>
<html lang="en" ng-app="myapp">
<head>
    <!--    <meta charset="UTF-8">-->
    <title>Angular Tutorial</title>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/common_angular.js"></script>
</head>
<body>
    <div>
        <p>Input something in the input box:</p>
        <p>Name : <input type="password" ng-model="name" placeholder="Enter name here"></p>
        <h1>Hello {{name}}</h1>
        <div ng-controller="controller1">
            <h2>Xin chào {{data.title}} đến với website {{data.website}}!</h2>
        </div>
        <div ng-controller="controller2">
            <h2>Xin chào {{data.title}} đến với website {{data.website}}!</h2>
        </div>
        <script>
            angular.module("myapp", []).controller("controller1", function ($scope) {
                $scope.data = {
                    title: 'các bạn',
                    website: 'http://mobilethanhcong.com',
                    message: ''
                };
            }).controller("controller2", function ($scope) {
                $scope.data = {
                    title: 'Phạm Văn Tâm',
                    website: 'http://thegioididong.com',
                    message: ''
                };
            });
        </script>
    </div>
    <div>
        <form action="/action_page.php">
            <input type="text" name="fname" placeholder="First name"><br>
            <input type="text" name="lname" placeholder="Last name"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>