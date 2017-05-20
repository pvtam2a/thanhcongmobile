<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/20/2017
 * Time: 12:52 AM
 */
class  Catalog extends MY_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('catalog_model');
    }
    /*
     * lấy ra danh sách danh mục
     */
    function index()
    {
        $list = $this->catalog_model->get_list();
        $this->data['list'] = $list;
        //lấy nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        //load view
       $this->data['temp'] = 'admin/catalog/index';
       $this->load->view('admin/main', $this->data);
    }
    /*
     * Thêm mới dữ liệu
     */
    function add()
    {
        //load thư viện validation dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu co du lieu post len thi check
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên danh mục', 'required');

            if($this->form_validation->run())
            {
                //thêm vào csdl
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');
                $data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)
                );
                if ($this->catalog_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công.');
                } else {
                    $this->session->set_flashdata('message', 'Xảy ra lỗi khi thêm dữ liệu.');
                }
                //chuyển tới trang danh sách quản trị viên
                redirect(admin_url('catalog'));
            }
        }
        //lấy ra danh sách danh mục cha
        $input = array();
        $input['where'] = array('parent_id'=>0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/catalog/add';
        $this->load->view('admin/main', $this->data);
    }
    /*
    * Cập nhật dữ liệu
    */
    function edit()
    {
        //lấy id của danh mục chỉnh sửa
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        //load thư viện validation dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu co du lieu post len thi check
        //lấy thông tin của quản trị viên
        $info = $this->catalog_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại danh mục.');
            redirect(admin_url('catalog'));
        }
        $this->data['info'] = $info;
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên danh mục', 'required');

            if($this->form_validation->run())
            {
                //thêm vào csdl
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');
                $data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)
                );
                if ($this->catalog_model->update($id,$data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công.');
                } else {
                    $this->session->set_flashdata('message', 'Xảy ra lỗi khi cập nhật dữ liệu.');
                }
                //chuyển tới trang danh sách quản trị viên
                redirect(admin_url('catalog'));
            }
        }
        //lấy ra danh sách danh mục cha
        $input = array();
        $input['where'] = array('parent_id'=>0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/catalog/edit';
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
        $info = $this->catalog_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại danh mục.');
            redirect(admin_url('catalog'));
        }
        //thực hiện xóa
        if ($this->catalog_model->delete($id)) {
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công.');
            redirect(admin_url('catalog'));
        } else {
            $this->session->set_flashdata('message', 'Xảy ra lỗi khi xóa dữ liệu.');
            redirect(admin_url('catalog'));
        }
    }
}