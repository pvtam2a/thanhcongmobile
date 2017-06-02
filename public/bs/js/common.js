var url = "http://localhost/thanhcongmobile/";
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
                url : url +"test/home/getlistadmintext",
                type : 'get',
                dataType : 'text',
                success : function (result){
                    $('#result1').html(result);
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
                        html +=  item['username'];
                        html +=  '</td>';
                        html +=  '<td>';
                        html +=  item['name'];
                        html +=  '</td>';
                        html +=  '<tr>';
                    });

                    html +=  '</table>';
                    $('#result').html(html);
                }
            });
            break;
        case 'xml':
            alert('ajax xml');
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
    })
});
