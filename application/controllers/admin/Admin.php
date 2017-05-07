<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/7/2017
 * Time: 1:49 AM
 */
class Admin extends MY_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    /*
     * lay danh sach admin
     */
    function index()
    {
        $input = array();
        $list = $this->admin_model->get_list($input);
        $this->data['list'] = $list;
        $total = $this->admin_model->get_total($input);
        $this->data['total'] = $total;
        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->data);
    }

    function add()
    {
        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->data);
    }
}