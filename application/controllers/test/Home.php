<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/3/2017
 * Time: 11:29 PM
 */
class Home extends MY_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
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

    function getlistadminjson()
    {
        $input = array();
        $list = $this->admin_model->get_list($input);
        die(json_encode($list));
    }
    function getlistadmintext()
    {
        $input = array();
        $list = $this->admin_model->get_list($input);
        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr>';
        echo '<td>';
        echo 'Username';
        echo '</td>';
        echo '<td>';
        echo 'Email';
        echo '</td>';
        echo '<tr>';
        if ($list) {
            foreach ($list as $row) {
                echo '<tr>';
                echo '<td>';
                echo $row['username'];
                echo '</td>';
                echo '<td>';
                echo $row['email'];
                echo '</td>';
                echo '<tr>';
            }
        }
        echo '</table>';
    }
}