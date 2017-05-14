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

        //lấy nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
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
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công.');
                } else {
                    $this->session->set_flashdata('message', 'Xảy ra lỗi khi thêm dữ liệu.');
                }
                //chuyển tới trang danh sách quản trị viên
                redirect(admin_url('admin'));
            }
        }
        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->data);
    }
    /*
     * Hàm chỉnh sửa thông tin quản trị viên
     */
    function edit()
    {
        //lấy id của quản trị viên cần chỉnh sửa
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lấy thông tin của quản trị viên
        $info = $this->admin_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên.');
            redirect(admin_url('admin'));
        }
        $this->data['info'] = $info;
        if ($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Họ Và Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Tên Đăng Nhập', 'required|callback_check_username');

            $password = $this->input->post('password');
            if ($password) {
                $this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[6]');
                $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'required|matches[password]');
            }
            if ($this->form_validation->run()) {
                //cập nhật vào csdl
                $name = $this->input->post('name');
                $username = $this->input->post('username');
                $data = array(
                    'name' => $name,
                    'username' => $username
                );
                //nếu thay đổi mật khẩu thì mới cập nhật
                if ($password) {
                    $data['password'] = md5($password);
                }
                if ($this->admin_model->update($id,$data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công.');
                } else {
                    $this->session->set_flashdata('message', 'Xảy ra lỗi khi cập nhật dữ liệu.');
                }
                //chuyển tới trang danh sách quản trị viên
                redirect(admin_url('admin'));
            }

        }

        $this->data['temp'] = 'admin/admin/edit';
        $this->load->view('admin/main', $this->data);
    }
    /*
     * Hàm để xóa dữ liệu
     */
    function delete()
    {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        //lấy ra thông tin của quản trị viên
        $info = $this->admin_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên.');
            redirect(admin_url('admin'));
        }
        //thực hiện xóa
        if ($this->admin_model->delete($id)) {
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công.');
            redirect(admin_url('admin'));
        } else {
            $this->session->set_flashdata('message', 'Xảy ra lỗi khi xóa dữ liệu.');
            redirect(admin_url('admin'));
        }
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
    /*
     * thực hiện logout
     */
    function logout()
    {
        if ($this->session->userdata('login')) {
            $this->session->unset_userdata('login');
        }
        redirect(admin_url('login'));
    }
}