<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 5/3/2017
 * Time: 11:16 PM
 */
function public_url($url='')
{
    return base_url('public/' . $url);
}

function pre($list, $exit = true)
{
    echo '<pre>';
    print_r($list);
    if($exit)
    {
        die();
    }
}