<!DOCTYPE html>
<html lang="en"  ng-app="myApp">
<head>
    <title>Angular Tutorial</title>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/myApp.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/myCtrl.js"></script>
</head>
<body ng-controller="myCtrl1">
<table border="1px">
    <tr ng-repeat="x in catalogs">
        <td>{{ x.name}}</td>
        <td>{{ x.username }}</td>
        <td>{{ x.password }}</td>
    </tr>
</table>
</body>
</html>