<?php
/**
 * Created by PhpStorm.
 * User: tampv
 * Date: 6/22/2017
 * Time: 8:42 AM
 */
class Index extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data = array();
        $data['temp'] = 'site/home/index';
        $this->load->view('test/angular1', $data);
    }
}