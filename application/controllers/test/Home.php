<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/3/2017
 * Time: 11:29 PM
 */
class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');
        $this->load->model('Catalog_Model');
        $this->load->model('News_Model');
    }
    function index()
    {
        $data = array();
        $data['temp'] = 'site/home/index';
        $this->load->view('test/ajax', $data);
    }

    function upload()
    {
        $this->load->view('test/upload');
    }
    function ajax()
    {
        $data = array();
        $this->load->view('test/ajax_practice', $data);
    }

    function getlistadminjson()
    {
        $input = array();
        $list = $this->Admin_Model->get_list($input);
        echo json_encode($list);
    }
    function getlistcatalogtext()
    {
        $input = array();
        $list = $this->Catalog_Model->get_list($input);
        //pre($list);
        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr>';
        echo '<td>';
        echo 'Name';
        echo '</td>';
        echo '<td>';
        echo 'Parent_ID';
        echo '</td>';
        echo '<tr>';
        if ($list) {
            foreach ($list as $row) {
                echo '<tr>';
                echo '<td>';
                echo $row->name;
                echo '</td>';
                echo '<td>';
                echo $row->parent_id;
                echo '</td>';
                echo '<tr>';
            }
        }
        echo '</table>';
    }

    function getnewslistxml()
    {
        $input = array();
        $list = $this->News_Model->get_list($input);
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<root>';
        if ($list) {
            foreach ($list as $row) {
                echo '<items>';
                    echo '<id>'.$row->id.'</id>';
                    echo '<title>'.$row->title.'</title>';
                    echo '<intro>'.$row->intro.'</intro>';
                    /*echo '<content>'.$row->content.'</content>';*/
                    echo '<image_link>'.$row->image_link.'</image_link>';
                echo '</items>';
            }
        }
        echo '</root>';
    }
    function getlistnewsjson()
    {
        $input = array();
        $list = $this->News_Model->get_list($input);
        echo json_encode($list);
    }
}