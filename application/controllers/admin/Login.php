<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/5/2017
 * Time: 11:22 PM
 */
class Login extends MY_controller
{
    function index()
    {
        $this->load->view('admin/login/index');
    }
}