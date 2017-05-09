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
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu co du lieu post len thi check
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Họ Và Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Tên Đăng Nhập', 'required|callback_check_username');
            $this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'required|matches[password]');
            if($this->form_validation->run())
            {
                //thêm vào csdl
                $name = $this->input->post('name');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $data = array(
                    'name' => $name,
                    'username' => $username,
                    'password' => md5($password)
                );
                if ($this->admin_model->create($data)) {
                    echo 'Thêm thành công';
                } else {
                    echo 'Không thêm thành công';
                }
            }
        }
        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->data);
    }

    function check_username()
    {
        //kiểm tra username đã tồn tại chưa
        $username = $this->input->post('username');
        $where = array('username' => $username);
        //kiểm tra username đã tồn tại hay chưa
        if ($this->admin_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
            return false;
        }
        return true;
    }
}