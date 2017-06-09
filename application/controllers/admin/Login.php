<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/5/2017
 * Time: 11:22 PM
 */
class Login extends MY_Controller
{
    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run()) {
                $this->session->set_userdata('login', true);

                redirect(admin_url('home'));
            }
        }
        $this->load->view('admin/login/index');
    }
    /*
     * Kiểm tra username và password có chính xác hay  không
     */
    function check_login()
    {
        $username = $this->input->post('username');
        $password= $this->input->post('password');
        $password = md5($password);
        $this->load->model('Admin_Model');
        $where = array('username' => $username, 'password' => $password);
        if ($this->Admin_Model->check_exists($where)) {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
        return false;
    }
    function check_login_ajax()
    {
        $username = isset($_POST['username']) ? $_POST['username'] : false;
        $password= isset($_POST['password']) ? $_POST['password'] : false;
        // Nếu cả hai thông tin username và email đều không có thì dừng, thông báo lỗi
        if (!$username && !$password){
            die(json_encode('{error:"bad_request"}'));
        }
        // Khai báo biến lưu lỗi
        $error = array(
            'error' => 'success',
            'url' => ''
        );
        $password = md5($password);
        $this->load->model('Admin_Model');
        $where = array('username' => $username, 'password' => $password);
        if ($this->Admin_Model->check_exists($where)) {
            $this->session->set_userdata('login', true);
            $error['url'] = admin_url('home');
        }
        else{
            die(json_encode('{error:"bad_request"}'));
        }
        // Trả kết quả về cho client
        die (json_encode($error));
    }
}