<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/5/2017
 * Time: 11:17 PM
 */
class MY_controller extends CI_Controller
{
    function __construct()
    {
        //Ke_thua_tu_CI_Controller
        parent::__construct();
        $controller = $this->uri->segment(1);
        switch ($controller)
        {
            case 'admin':
            {
                $this->_check_login();
                //xử lý các dữ liệu khi truy cập vào trang admin
                echo 'bạn đang truy cập vào hệ thống quản lý';
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
        echo 'abc';
    }
}