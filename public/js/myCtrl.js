/**
 * Created by pvtam2a on 6/25/2017.
 */
/*app.controller('myCtrl', function($scope) {
    $scope.firstName= "John";
    $scope.lastName= "Doe";
    $scope.myCol="red";
    $scope.STT = 2;
    $scope.quocgia = ["VN", "EN", "JP", "US", "CN", "THA"];
    $scope.sinhvien  ={
        TenSV : "",
        MaSV : "",
        DiaChi : "",
        ThongTinSV : function () {
            var SV  = $scope.sinhvien;
            if(SV.TenSV == "" || SV.MaSV == "" || SV. DiaChi == "")
                return "";
            else
                return "Tên Sinh Viên: " + SV.TenSV + " Mã Sinh Viên: " + SV.MaSV + " Địa Chỉ: " + SV.DiaChi;
        }
    };
    function sinhvienController($scope) {
        $scope.reset = function(){
            $scope.Ho = "Tran Minh";
            $scope.Ten = "Chinh";
            $scope.email = "TranMinhChinh@gmail.com";
        }
        $scope.reset();
    }
});
app.directive("w3TestDirective", function() {
    return {
        template: "I was made in a directive constructor!"
    };
});*/
var url = "http://localhost/thanhcongmobile/";
app.controller('myCtrl1', function($scope, $http) {
    $http.get(url +"test/home/getlistadminjson").then(function (response) {
        $scope.catalogs = response.data;
    });
});