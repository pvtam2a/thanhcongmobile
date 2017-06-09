<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 6/9/2017
 * Time: 11:14 PM
 */
class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_Model');
    }
    /*
     * hiển thị danh sách sản phẩm
     */
    function index()
    {
        //lấy tổng tất cả số lượng sản phẩm của website
        $total_rows = $this->Product_Model->get_total();
        $this->data['total_rows'] = $total_rows;
        //load thư viện phân trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows; //Tổng số sản phẩm trên website
        $config['base_url'] = admin_url('product/index');
        $config['per_page'] = 2; //Số lượng sản phẩm hiển thị trên trang
        $config['uri_segment'] = 4; //phân đoạn thị thị số trang trên URL
        $config['next_link'] = "Trang Sau";
        $config['prev_link'] = "Trang Trước";
        $config['first_link'] = "Trang Đầu";
        $config['last_link'] = "Trang Cuối";
        //Khởi tạo cấu hình phân trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        // Lấy danh sách sản phẩm

        $list = $this->Product_Model->get_list($input);
        $this->data['list'] = $list;

        //lấy danh sách danh mục sản phẩm
        $this->load->model('Catalog_Model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->Catalog_Model->get_list($input);
        foreach ($catalogs as $rows) {
            $input['where'] = array('parent_id' => $rows->id);
            $subs = $this->Catalog_Model->get_list($input);
            $rows->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;

        //lấy nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        //load view
        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
    }
}