<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/7/2017
 * Time: 3:14 PM
 */
//tạo ra các link trong admin
function admin_url($url = '')
{
    return base_url('admin/' . $url);
}