/**
 * Created by MyPC on 5/25/2017.
 */
function showAllButton() {
    $('button').show(500);
}
function hideButton(id) {
    if(!id)
        alert('error!');
    else
    {
        switch (id) {
            case 2:
                $('#btn2').hide(500);
                break;
            case 3:
                $('#btn3').hide(500);
                break;
        }
    }
}

function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("demo").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "demo_get.asp", true);
    xhttp.send();
}
function close_OpenForm() {
       //var display = $('#div_login').css('display');
       //if(display == 'block')
       //    $('#div_login').hide(1000);
       //else  $('#div_login').show();
    $('#div_login').toggle(500);
}
function load_ajax() {
    $.ajax({
        url : "../test/result.php",
        type : "post",
        dataType:"text",
        data : {
        },
        success : function (result){
            $('#result').html(result);
        }
    });
}
function load_ajax_oldversion(){
    // Tạo một biến lưu trữ đối tượng XML HTTP. Đối tượng này
    // tùy thuộc vào trình duyệt browser ta sử dụng nên phải kiểm
    // tra như bước bên dưới
    var xmlhttp;

    // Nếu trình duyệt là  IE7+, Firefox, Chrome, Opera, Safari
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    // Nếu trình duyệt là IE6, IE5
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // Khởi tạo một hàm gửi ajax
    xmlhttp.onreadystatechange = function()
    {
        // Nếu đối tượng XML HTTP trả về với hai thông số bên dưới thì mọi chuyện
        // coi như thành công
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            // Sau khi thành công tiến hành thay đổi nội dung của thẻ div, nội dung
            // ở đây chính là
            document.getElementById("result").innerHTML = xmlhttp.responseText;
        }
    };

    // Khai báo với phương thức GET, và url chính là file result.php
    xmlhttp.open("GET", "result.php", true);

    // Cuối cùng là Gửi ajax, sau khi gọi hàm send thì function vừa tạo ở
    // trên (onreadystatechange) sẽ được chạy
    xmlhttp.send();
}
$(document).ready(function () {
    var element = $('.subject_box p i');
    $.each(element, function(index, val) {
        if(val.innerText=='ə')
            $(element[index]).css( "font-family", "initial" );
    });
    $('a.clsmessage').click(function () {
        $('div.alert-success').show(500);
    })
});
