<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getSalesperson($id){
    $CI = & get_instance();
    $CI->load->model("Employee_Model");
    $meta = $CI->Employee_Model->getsalePerson($id);
    return $meta;
}
function getShopname($id){
    $CI = & get_instance();
    $CI->load->model("Salesreturn_Model");
    $meta = $CI->Salesreturn_Model->getShopname($id);
    return $meta;
}
function getProname($id){
    $CI = & get_instance();
    $CI->load->model("Salesreturn_Model");
    $meta = $CI->Salesreturn_Model->getProname($id);
    return $meta;
}
function getcategoryname($id){
    $CI = & get_instance();
    $CI->load->model("Combo_Model");
    $meta = $CI->Combo_Model->getCatename($id);
    return $meta;
}
function userData($id){
    $CI = & get_instance();
    $CI->load->model("Login_Model");
    $meta = $CI->Login_Model->getUserdetails($id);
    return $meta;
}
