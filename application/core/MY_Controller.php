<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/5/2017
 * Time: 11:17 PM
 */
class MY_Controller extends CI_Controller
{
    // bien gui du lieu sang ben view
    public $data = array();
    function __construct()
    {
        //Ke_thua_tu_CI_Controller
        parent::__construct();
        $controller = $this->uri->segment(1);
        switch ($controller)
        {
            case 'admin':
            {
                $this->load->helper('admin');
                $this->_check_login();
                break;
            }
            default:
            {
                //xử lý các dữ liệu ở trang ngoài
            }
        }
    }
    /*
     * Kiem tra trang thai dang nhap cua admin
     */
    private function _check_login()
    {
        $controller = $this->uri->rsegment(1);
        $controller = strtolower($controller);

        $login = $this->session->userdata('login');
        //nếu chưa đăng nhập và truy cập vào controller khác login
        if (!$login && $controller != 'login') {
            redirect(admin_url('login'));
        }
        //nếu đã đăng nhập thì không cho vào trang login nữa
        if ($login && $controller == 'login') {
            redirect(admin_url('home'));
        }
    }
}