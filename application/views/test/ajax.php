<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thành Công Mobile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo public_url('bs')?> /css/bootstrap.min.css">
    <script src="<?php echo public_url('bs')?> /jquery/jquery.min.js"></script>
    <script src="<?php echo public_url('bs')?> /js/bootstrap.min.js"></script>
    <script src="<?php echo public_url('bs')?> /js/common.js"></script>
</head>
<body>

<div class="container-fluid">
    <h1>My First Bootstrap Page</h1>
    <p>This part is inside a .container-fluid class.</p>
    <p>The .container-fluid class provides a full width container, spanning the entire width of the viewport.</p>
</div>
<h2>The Modal Plugin</h2>
<p>The Modal plugin is a dialog box/popup window that is displayed on top of the current page:</p>
<button style="margin:7px 15px 17px 0;" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
    Click To Open Modal
</button>
<div class="subject_box w_620" id="top_flag">
    <div class="practice w_609">
        <div class="small_question" style="border:none;">
            <div class="small_question_no" ></div>
            <div class="small_question_no" ></div>
            <div class="small_question_main" id="collection_small_question">
                <ul class="small_questions"><li></li>
                </ul>
                <ul class="small_question_answers">
                    <li>
                        <b></b>
                        <span ></span>
                        <p>
                            <i>ə</i>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="text" style="overflow-y:hidden;">
        <div ng-include="page.display_question.explanations.correct_order"></div>
        <div ng-include="page.display_question.explanations.explanation"></div>
        <div ng-include="page.display_question.explanations.body_ja"></div>
        <div ng-include="page.display_question.explanations.answer_options_ja"></div>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<h2>Ky thuat AJAX</h2>
<p id="demo"></p>
<div id="result">
    Nội dung ajax sẽ được load ở đây
</div>
<p>
    <button id="btn_1" type="button" onclick="load_ajax()" class="btn btn-success">Load Ajax</button>
</p>
<p>
    <button id="btn1" type="button" onclick="loadDoc()" class="btn btn-success">Tao Request toi Server</button>
    <button id="btn2" type="button" onclick="hideButton(3)" class="btn btn-primary">Primary</button>
    <button id="btn3" type="button" onclick="hideButton(2)" class="btn btn-info">Info</button>
    <button id="btn4" type="button" onclick="showAllButton()" class="btn btn-default">Default</button>
    <button id="btn5" type="button" onclick="close_OpenForm()" class="btn btn-warning">toggleForm</button>
</p>
<div id="div_login" style="margin:20px 0 25px 0;">
    <div class="form-group">
        <label for="usr">Name:</label>
        <input type="text" class="form-control" id="usr">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd">
    </div>
</div>
<div>
    <a href="#" class="clsmessage">showAlert</a>
</div>
<div class="alert alert-success" style="display: none">
    <strong>Success!</strong> Indicates a successful or positive action.
</div>
<button id="btn6" type="button" class="btn btn-primary active">Active Primary</button>
</body>
</html>