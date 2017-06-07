<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/6/2017
 * Time: 4:27 PM
 */
class Home extends MY_Controller
{
    function index()
    {
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
}