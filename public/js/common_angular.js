var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.firstName= "John";
    $scope.lastName= "Doe";
    $scope.myCol="red";
    $scope.STT = 2;
    $scope.quocgia = ["VN", "EN", "JP", "US", "CN", "THA"];
});
app.directive("w3TestDirective", function() {
    return {
        template: "I was made in a directive constructor!"
    };
});