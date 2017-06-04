var url = "http://localhost:88/thanhcongmobile/";
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
function load_ajax(options) {
    switch (options) {
        case 'text':
            $.ajax({
                url : url +"test/home/getlistcatalogtext",
                type : 'get',
                dataType : 'text',
                success : function (result){
                    $('#result').html(result);
                }
            });
            break;
        case 'json':
            $.ajax({
                url : url +"test/home/getlistadminjson",
                type : "get",
                dataType:"json",
                data : {
                },
                success : function (result){
                    var html = '';
                    html += '<table border="1" cellspacing="0" cellpadding="10">';
                    html += '<tr>';
                    html += '<td>';
                    html += 'Username';
                    html += '</td>';
                    html += '<td>';
                    html += 'Name';
                    html += '</td>';
                    html += '<tr>';

                    // Kết quả là một object json
                    // Nên ta sẽ loop result
                    $.each (result, function (key, item){
                        html +=  '<tr>';
                        html +=  '<td>';
                        html +=  item.username;
                        html +=  '</td>';
                        html +=  '<td>';
                        html +=  item.name;
                        html +=  '</td>';
                        html +=  '<tr>';
                    });

                    html +=  '</table>';
                    $('#result').html(html);
                }
            });
            break;
        case 'xml':
             $.ajax({
                url : url +"test/home/getnewslistxml",
                type : "GET",
                dataType : "xml",
                success : function (result)
                {
                    // HTML lúc đầu
                    var html = '';
                    html += '<table border="1" cellspacing="0" cellpadding="10">';
                    html += '<tr>';
                    html += '<td>';
                    html += 'ID';
                    html += '</td>';
                    html += '<td>';
                    html += 'Title';
                    html += '</td>';
                    html += '<td>';
                    html += 'Intro';
                    html += '</td>';
                    html += '<td>';
                    html += 'Content';
                    html += '</td>';
                    html += '<td>';
                    html += 'image_link';
                    html += '</td>';
                    html += '<tr>';

                    $(result).find('items').each (function (key, val){
                        html +=  '<tr>';
                        html +=  '<td>';
                        html +=  $(val).find('id').text();
                        html +=  '</td>';
                        html +=  '<td>';
                        html +=  $(val).find('title').text();
                        html +=  '</td>';
                        html +=  '<td>';
                        html +=  $(val).find('intro').text();
                        html +=  '</td>';
                        html +=  '<td>';
                       /* html +=  $(val).find('content').html().toString();*/
                        html +=  'NULL';
                        html +=  '</td>';
                        html +=  '<td>';
                        html +=  $(val).find('image_link').text();
                        html +=  '</td>';
                        html +=  '<tr>';
                    });

                    html +=  '</table>';

                    $('#result').html(html);
                }
            });
            break;
    }
}
$(document).ready(function () {
    var element = $('.subject_box p i');
    $.each(element, function(index, val) {
        if(val.innerText=='ə')
            $(element[index]).css( "font-family", "initial" );
    });
    $('a.clsmessage').click(function () {
        $('div.alert-success').show(500);
    });
    $('#submitLogin').click(function ()
    {
        // Xóa trắng thẻ div show lỗi
        $('#showerror').html('');

        var username = $('#param_username').val();
        var password = $('#param_password').val();

        // Kiểm tra dữ liệu có null hay không
        if ($.trim(username) == ''){
            alert('Bạn chưa nhập tên đăng nhập');
            return false;
        }

        if ($.trim(password) == ''){
            alert('Bạn chưa nhập password');
            return false;
        }
        $.ajax({
            url : url +"admin/login/check_login_ajax",
            type : 'post',
            dataType : 'json',
            data : {
                username : username,
                password : password
            },
            success : function (result)
            {
                // Kiểm tra xem thông tin gửi lên có bị lỗi hay không
                // Đây là kết quả trả về từ file Login.php
                if (!result.hasOwnProperty('error') || result['error'] != 'success')
                {
                    $('#showerror').html('Có vẻ như bạn đang hack website của tôi');
                    return false;
                }
                var url = '';
                // Lấy thông tin url
                if ($.trim(result['url']) != '' ){
                    url = result['url'];
                }
                if (url != ''){
                    window.location.href = url;
                }
                else {
                    // Không lấy được url
                    $('#showerror').append('Xảy ra lỗi khi đăng nhập!');
                }
            }
        });

        return false;
    });
});
