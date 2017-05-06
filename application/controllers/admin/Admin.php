<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/7/2017
 * Time: 1:49 AM
 */
class Admin extends CI_Controller
{
    function create()
    {
        $this->load->model('admin_model');
        $data = array();
        $data['username'] = 'user1';
        $data['password'] = 'user1';
        $data['name'] = 'tampv';
        if ($this->admin_model->create($data))
        {
            echo 'Thêm thành công!';
        }
        else
        {
            echo 'Thêm thất bại';
        }
    }
}