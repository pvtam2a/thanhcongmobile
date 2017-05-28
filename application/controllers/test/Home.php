<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/3/2017
 * Time: 11:29 PM
 */
class Home extends CI_Controller
{
    function index()
    {
        $data = array();
        $data['temp'] = 'site/home/index';
        $this->load->view('test/ajax', $data);
    }

    function ajax()
    {
        $data = array();
        $this->load->view('test/ajax_practice', $data);
    }
}