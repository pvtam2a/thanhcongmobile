<?php
/**
 * Created by PhpStorm.
 * User: tampv
 * Date: 6/20/2017
 * Time: 8:49 AM
 */
class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data = array();
        $data['temp'] = 'site/home/index';
        $this->load->view('test/angular', $data);
    }
}